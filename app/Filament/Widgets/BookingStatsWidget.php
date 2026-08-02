<?php

declare(strict_types=1);

namespace App\Filament\Widgets;

use App\Enums\BookingStatus;
use App\Filament\Resources\Bookings\BookingResource;
use App\Models\Booking;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class BookingStatsWidget extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $todayStart = now()->startOfDay();
        $yesterdayStart = $todayStart->copy()->subDay();

        $statusCounts = Booking::query()
            ->selectRaw('status, count(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status');

        $countFor = fn (BookingStatus $status): int => (int) ($statusCounts[$status->value] ?? 0);

        $todayBookings = Booking::query()
            ->whereBetween('starts_at', [$todayStart, $todayStart->copy()->endOfDay()])
            ->count();

        $yesterdayBookings = Booking::query()
            ->whereBetween('starts_at', [$yesterdayStart, $yesterdayStart->copy()->endOfDay()])
            ->count();

        $diffPercent = $yesterdayBookings > 0
            ? (int) round((($todayBookings - $yesterdayBookings) / $yesterdayBookings) * 100)
            : null;

        $sparklineFor = function (BookingStatus $status): array {
            return Booking::query()
                ->where('status', $status)
                ->where('starts_at', '>=', now()->subDays(6)->startOfDay())
                ->selectRaw('date(starts_at) as day, count(*) as total')
                ->groupBy('day')
                ->orderBy('day')
                ->pluck('total')
                ->all();
        };

        return [
            Stat::make('Reservasi Hari Ini', $todayBookings)
                ->description($diffPercent === null
                    ? 'Belum ada data kemarin'
                    : ($diffPercent >= 0
                        ? "Naik {$diffPercent}% dari kemarin"
                        : 'Turun '.abs($diffPercent).'% dari kemarin'))
                ->descriptionIcon($diffPercent === null
                    ? 'heroicon-m-minus-circle'
                    : ($diffPercent >= 0 ? 'heroicon-m-trending-up' : 'heroicon-m-trending-down'))
                ->descriptionColor($diffPercent === null ? 'gray' : ($diffPercent >= 0 ? 'success' : 'danger'))
                ->icon('heroicon-m-calendar-days')
                ->color('primary')
                ->url(BookingResource::getUrl('index')),

            Stat::make('Pending', $countFor(BookingStatus::Pending))
                ->description('Menunggu konfirmasi')
                ->descriptionIcon('heroicon-m-clock')
                ->descriptionColor('warning')
                ->icon('heroicon-m-clock')
                ->color('warning')
                ->chart($sparklineFor(BookingStatus::Pending))
                ->url(BookingResource::getUrl('index')),

            Stat::make('Terkonfirmasi', $countFor(BookingStatus::Confirmed))
                ->description('Jadwal sudah dikonfirmasi')
                ->descriptionIcon('heroicon-m-check-circle')
                ->descriptionColor('primary')
                ->icon('heroicon-m-check-circle')
                ->color('primary')
                ->chart($sparklineFor(BookingStatus::Confirmed))
                ->url(BookingResource::getUrl('index')),

            Stat::make('Selesai', $countFor(BookingStatus::Completed))
                ->description('Reservasi sudah selesai')
                ->descriptionIcon('heroicon-m-check-badge')
                ->descriptionColor('success')
                ->icon('heroicon-m-check-badge')
                ->color('success')
                ->chart($sparklineFor(BookingStatus::Completed))
                ->url(BookingResource::getUrl('index')),

            Stat::make('Dibatalkan', $countFor(BookingStatus::Cancelled))
                ->description('Reservasi dibatalkan')
                ->descriptionIcon('heroicon-m-x-circle')
                ->descriptionColor('danger')
                ->icon('heroicon-m-x-circle')
                ->color('danger')
                ->chart($sparklineFor(BookingStatus::Cancelled))
                ->url(BookingResource::getUrl('index')),
        ];
    }
}
