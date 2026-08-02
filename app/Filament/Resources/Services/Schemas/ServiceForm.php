<?php

declare(strict_types=1);

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Layanan')
                    ->description('Judul, slug, ikon, dan konten layanan')
                    ->icon('heroicon-o-briefcase')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('title')
                                    ->label('Judul Layanan')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function (string $state, callable $set, ?string $old, callable $get) {
                                        if (blank($get('slug')) || $get('slug') === Str::slug($old)) {
                                            $set('slug', Str::slug($state));
                                        }
                                    }),
                                TextInput::make('slug')
                                    ->label('Slug')
                                    ->required()
                                    ->maxLength(255)
                                    ->helperText('Kosongkan untuk generate otomatis dari judul')
                                    ->unique(ignoreRecord: true),
                                TextInput::make('icon')
                                    ->label('Ikon')
                                    ->maxLength(50)
                                    ->helperText('Nama ikon, misal: heroicon-o-briefcase'),
                                TextInput::make('sort_order')
                                    ->label('Urutan Tampil')
                                    ->numeric()
                                    ->default(0)
                                    ->required(),
                            ]),
                        Textarea::make('summary')
                            ->label('Ringkasan')
                            ->rows(2)
                            ->maxLength(255)
                            ->columnSpanFull(),
                        RichEditor::make('content')
                            ->label('Konten')
                            ->columnSpanFull(),
                        Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true),
                    ]),

                Section::make('Sampul')
                    ->icon('heroicon-o-photo')
                    ->collapsible()
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('cover')
                            ->label('Gambar Sampul')
                            ->collection('cover')
                            ->image()
                            ->imageEditor()
                            ->directory('service-covers'),
                    ]),
            ]);
    }
}