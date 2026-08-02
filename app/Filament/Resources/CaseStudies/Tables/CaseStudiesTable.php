<?php

declare(strict_types=1);

namespace App\Filament\Resources\CaseStudies\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class CaseStudiesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('client_name')
                    ->label('Nama Klien')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('industry')
                    ->label('Industri')
                    ->sortable()
                    ->searchable(),
                ToggleColumn::make('is_active')
                    ->label('Aktif'),
                IconColumn::make('nda_compliant')
                    ->boolean()
                    ->label('NDA'),
                TextColumn::make('updated_at')
                    ->label('Tanggal Diperbarui')
                    ->since(),
            ])
            ->filters([
                TernaryFilter::make('is_active')
                    ->label('Status Aktif'),
                TernaryFilter::make('nda_compliant')
                    ->label('NDA Compliant'),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->striped()
            ->deferLoading()
            ->defaultPaginationPageOption(25)
            ->paginated([25, 50, 100])
            ->emptyStateIcon('heroicon-o-inbox')
            ->emptyStateHeading('Belum ada studi kasus')
            ->emptyStateDescription('Tambahkan studi kasus untuk konten portofolio.');
    }
}
