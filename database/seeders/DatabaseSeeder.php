<?php

namespace Database\Seeders;

use App\Enums\SlotStatus;
use App\Models\Consultant;
use App\Models\ScheduleSlot;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleAndPermissionSeeder::class,
            CmsContentSeeder::class,
        ]);

        User::updateOrCreate(
            ['email' => 'admin@kapmci.co.id'],
            [
                'name' => 'Administrator ',
                'password' => Hash::make('password'),
                'mfa_enabled' => false,
            ]
        )->assignRole('super_admin');

        $consultants = Consultant::factory()->count(3)->create();

        $slotHours = [9, 10, 11, 13, 14, 15];

        foreach ($consultants as $consultant) {
            for ($day = 1; $day <= 5; $day++) {
                $date = Carbon::today()->addDays($day);

                if ($date->isWeekend()) {
                    continue;
                }

                foreach ($slotHours as $hour) {
                    $startsAt = $date->copy()->setTime($hour, 0);

                    ScheduleSlot::firstOrCreate(
                        [
                            'consultant_id' => $consultant->id,
                            'starts_at' => $startsAt,
                        ],
                        [
                            'ends_at' => $startsAt->copy()->addMinutes(45),
                            'status' => SlotStatus::Available,
                        ]
                    );
                }
            }
        }
    }
}
