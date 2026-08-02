<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Imports\ScheduleSlotsImport;
use App\Models\Consultant;
use App\Models\ScheduleSlot;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Tests\TestCase;

class ScheduleSlotImportTest extends TestCase
{
    use RefreshDatabase;

    public function test_import_creates_slots_and_skips_invalid_rows(): void
    {
        $consultant = Consultant::factory()->create(['name' => 'Budi Santoso']);

        $path = $this->writeCsv(implode("\n", [
            'consultant,starts_at,ends_at,status',
            'Budi Santoso,2026-08-03 09:00:00,2026-08-03 10:00:00,available',
            'Budi Santoso,2026-08-04 09:00:00,2026-08-04 10:00:00,booked',
            'Orang Tak Dikenal,2026-08-05 09:00:00,2026-08-05 10:00:00,available',
            'Budi Santoso,2026-08-06 09:00:00,2026-08-06 08:00:00,available',
            'Budi Santoso,2026-08-03 09:00:00,2026-08-03 11:00:00,blocked',
        ]));

        $import = new ScheduleSlotsImport();
        Excel::import($import, $path);

        $this->assertSame(2, $import->imported);
        $this->assertSame(3, $import->skipped);
        $this->assertSame(1, $import->duplicates);
        $this->assertDatabaseCount('schedule_slots', 2);
        $this->assertDatabaseHas('schedule_slots', [
            'consultant_id' => $consultant->id,
            'starts_at' => '2026-08-03 09:00:00',
            'status' => 'available',
        ]);
        $this->assertDatabaseHas('schedule_slots', [
            'consultant_id' => $consultant->id,
            'starts_at' => '2026-08-04 09:00:00',
            'status' => 'booked',
        ]);
    }

    public function test_import_accepts_columns_in_alternate_languages_and_unknown_status_defaults(): void
    {
        $consultant = Consultant::factory()->create(['email' => 'budi@mci.co.id']);

        $path = $this->writeCsv(implode("\n", [
            'konsultan,waktu_mulai,waktu_selesai,status',
            'budi@mci.co.id,03/08/2026 09:00,03/08/2026 10:00,terbooking',
            'budi@mci.co.id,04/08/2026 09:00,04/08/2026 10:00,xyz',
        ]));

        $import = new ScheduleSlotsImport();
        Excel::import($import, $path);

        $this->assertSame(2, $import->imported);
        $this->assertSame(0, $import->skipped);
        $this->assertDatabaseHas('schedule_slots', [
            'consultant_id' => $consultant->id,
            'status' => 'booked',
        ]);
        $this->assertDatabaseHas('schedule_slots', [
            'consultant_id' => $consultant->id,
            'starts_at' => '2026-08-04 09:00:00',
            'status' => 'available',
        ]);
    }

    private function writeCsv(string $contents): string
    {
        $path = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'slot-import-' . Str::random(8) . '.csv';
        file_put_contents($path, $contents);

        return $path;
    }
}
