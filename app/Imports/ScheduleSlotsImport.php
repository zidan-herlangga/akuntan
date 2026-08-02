<?php

declare(strict_types=1);

namespace App\Imports;

use App\Enums\SlotStatus;
use App\Models\Consultant;
use App\Models\ScheduleSlot;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Row;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use RuntimeException;
use Throwable;

class ScheduleSlotsImport implements OnEachRow, WithHeadingRow
{
    public int $imported = 0;

    public int $skipped = 0;

    public int $duplicates = 0;

    /** @var list<string> */
    public array $errors = [];

    /** @var array<string, int|null> */
    private array $consultantCache = [];

    public function onRow(Row $row): void
    {
        try {
            $values = $row->toArray();

            $consultantId = $this->resolveConsultant($values);
            if ($consultantId === null) {
                throw new RuntimeException('Konsultan tidak ditemukan.');
            }

            $startsAt = $this->parseDateTime(
                $this->firstValue($values, ['starts_at', 'start_at', 'waktu_mulai'])
            );
            if ($startsAt === null) {
                throw new RuntimeException('Waktu mulai tidak valid.');
            }

            $endsAt = $this->parseDateTime(
                $this->firstValue($values, ['ends_at', 'end_at', 'waktu_selesai'])
            );
            if ($endsAt === null || ! $endsAt->greaterThan($startsAt)) {
                throw new RuntimeException('Waktu selesai tidak valid (harus setelah waktu mulai).');
            }

            $slot = ScheduleSlot::firstOrNew([
                'consultant_id' => $consultantId,
                'starts_at' => $startsAt,
            ]);

            if ($slot->exists) {
                $this->duplicates++;
                $this->skipped++;

                return;
            }

            $slot->ends_at = $endsAt;
            $slot->status = $this->resolveStatus(
                $this->firstValue($values, ['status', 'state'])
            );
            $slot->save();

            $this->imported++;
        } catch (Throwable $exception) {
            $this->skipped++;
            $this->errors[] = 'Baris ' . $row->getIndex() . ': ' . $exception->getMessage();
        }
    }

    /**
     * @param  array<string, mixed>  $values
     */
    private function resolveConsultant(array $values): ?int
    {
        $raw = $this->firstValue($values, [
            'consultant',
            'consultant_id',
            'consultant_name',
            'konsultan',
            'nama_konsultan',
        ]);

        if ($raw === null) {
            return null;
        }

        $value = trim((string) $raw);
        if ($value === '') {
            return null;
        }

        if (array_key_exists($value, $this->consultantCache)) {
            return $this->consultantCache[$value];
        }

        $query = Consultant::query();

        if (ctype_digit($value)) {
            $query->where('id', (int) $value);
        } elseif (filter_var($value, FILTER_VALIDATE_EMAIL) !== false) {
            $query->where('email', $value);
        } else {
            $query->where('name', $value);
        }

        $id = $query->first()?->id;

        $this->consultantCache[$value] = $id;

        return $id;
    }

    private function resolveStatus(mixed $value): SlotStatus
    {
        $normalized = strtolower(trim((string) $value));

        if (in_array($normalized, ['booked', 'terbooking', 'terpesan', 'dipesan'], true)) {
            return SlotStatus::Booked;
        }

        if (in_array($normalized, ['blocked', 'diblokir', 'tidak_tersedia', 'unavailable'], true)) {
            return SlotStatus::Blocked;
        }

        return SlotStatus::Available;
    }

    /**
     * @param  array<string, mixed>  $values
     */
    private function firstValue(array $values, array $keys): mixed
    {
        foreach ($keys as $key) {
            if (array_key_exists($key, $values) && filled($values[$key])) {
                return $values[$key];
            }
        }

        return null;
    }

    private function parseDateTime(mixed $value): ?Carbon
    {
        if ($value === null || $value === '') {
            return null;
        }

        if (is_numeric($value)) {
            try {
                return Carbon::instance(Date::excelToDateTimeObject((float) $value));
            } catch (Throwable) {
                return null;
            }
        }

        $string = trim((string) $value);
        $formats = [
            'Y-m-d H:i:s',
            'Y-m-d H:i',
            'Y-m-d',
            'd/m/Y H:i:s',
            'd/m/Y H:i',
            'd/m/Y',
            'd-m-Y H:i:s',
            'd-m-Y H:i',
            'd-m-Y',
            'm/d/Y H:i:s',
            'm/d/Y H:i',
        ];

        foreach ($formats as $format) {
            try {
                $parsed = Carbon::createFromFormat($format, $string);

                if ($parsed instanceof Carbon) {
                    return $parsed;
                }
            } catch (Throwable) {
                // coba format berikutnya
            }
        }

        try {
            return Carbon::parse($string);
        } catch (Throwable) {
            return null;
        }
    }
}
