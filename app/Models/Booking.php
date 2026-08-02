<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\BookingStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Booking extends Model
{
    /** @use HasFactory<BookingFactory> */
    use HasFactory, LogsActivity;

    protected $fillable = [
        'booking_number',
        'consultant_id',
        'service_id',
        'client_name',
        'client_email',
        'client_phone',
        'company_name',
        'company_npwp',
        'financial_issue_description',
        'meeting_link',
        'status',
        'source',
        'ip_address',
        'notes',
        'starts_at',
        'ends_at',
    ];

    protected function casts(): array
    {
        return [
            'company_npwp' => 'encrypted',
            'financial_issue_description' => 'encrypted',
            'status' => BookingStatus::class,
            'starts_at' => 'datetime',
            'ends_at' => 'datetime',
        ];
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly([
                'status',
                'meeting_link',
                'notes',
                'consultant_id',
                'service_id',
            ])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }

    /**
     * @return BelongsTo<Consultant, $this>
     */
    public function consultant(): BelongsTo
    {
        return $this->belongsTo(Consultant::class);
    }

    /**
     * @return BelongsTo<Service, $this>
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * @return HasOne<ScheduleSlot, $this>
     */
    public function scheduleSlot(): HasOne
    {
        return $this->hasOne(ScheduleSlot::class);
    }
}
