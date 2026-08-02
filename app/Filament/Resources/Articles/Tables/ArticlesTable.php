<?php

declare(strict_types=1);

namespace App\Filament\Resources\Articles\Tables;

use App\Models\Article;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class ArticlesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Judul Artikel')
                    ->limit(50)
                    ->wrap()
                    ->searchable()
                    ->sortable(),
                TextColumn::make('category')
                    ->label('Kategori')
                    ->limit(50)
                    ->wrap()
                    ->searchable()
                    ->sortable(),
                ToggleColumn::make('is_published')
                    ->label('Terbitkan')
                    ->sortable(),
                TextColumn::make('published_at')
                    ->label('Tanggal Terbit')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->options(fn (): array => Article::query()
                        ->distinct()
                        ->pluck('category')
                        ->filter()
                        ->mapWithKeys(fn (string $category): array => [$category => $category])
                        ->all()),
                TernaryFilter::make('is_published'),
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
            ->emptyStateHeading('Belum ada artikel')
            ->emptyStateDescription('Tulis artikel baru untuk konten blog website.');
    }
}
