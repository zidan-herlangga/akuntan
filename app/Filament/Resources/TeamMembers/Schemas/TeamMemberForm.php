<?php

declare(strict_types=1);

namespace App\Filament\Resources\TeamMembers\Schemas;

use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class TeamMemberForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Anggota')
                    ->description('Data pribadi, jabatan, dan kualifikasi')
                    ->icon('heroicon-o-user-group')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('name')
                                    ->label('Nama')
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
                                    ->helperText('Kosongkan untuk generate otomatis dari nama')
                                    ->unique(ignoreRecord: true),
                                TextInput::make('position')
                                    ->label('Jabatan')
                                    ->required()
                                    ->maxLength(150),
                                TextInput::make('sort_order')
                                    ->label('Urutan Tampil')
                                    ->numeric()
                                    ->default(0)
                                    ->required(),
                            ]),
                        Textarea::make('bio')
                            ->label('Biografi')
                            ->rows(4)
                            ->columnSpanFull(),
                        TagsInput::make('certifications')
                            ->label('Sertifikasi')
                            ->columnSpanFull(),
                    ]),

                Section::make('Status')
                    ->description('Tampilkan anggota di halaman website')
                    ->icon('heroicon-o-adjustments-horizontal')
                    ->collapsible()
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true),
                    ]),

                Section::make('Foto')
                    ->icon('heroicon-o-photo')
                    ->collapsible()
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('avatar')
                            ->label('Foto Profil')
                            ->collection('avatar')
                            ->image()
                            ->imageEditor()
                            ->directory('team-avatars')
                            ->avatar(),
                    ]),
            ]);
    }
}