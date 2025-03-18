<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VetResource\Pages;
use App\Models\Vet;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class VetResource extends Resource
{
    protected static ?string $model = Vet::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-circle';
    protected static ?string $navigationLabel = 'Veterinarians';
    protected static ?string $modelLabel = 'Veterinarian';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Personal Information')
                    ->schema([
                        TextInput::make('nama')->label('Nama')->required()->maxLength(255),
                        TextInput::make('email')->email()->required()->maxLength(255),
                        TextInput::make('no_telp')->label('Nomor Telpon')->tel()->required()->maxLength(15),
                        Select::make('jenis_kelamin')
                            ->label('Gender')
                            ->options([
                                'laki-laki' => 'Laki-Laki',
                                'perempuan' => 'Perempuan',
                            ])
                            ->required(),
                        DatePicker::make('tgl_lahir')->label('Tanggal Lahir')->required(),
                        Textarea::make('alamat')->label('Alamat')->required(),
                    ])->columns(2),

                Forms\Components\Section::make('Professional Information')
                    ->schema([
                        TextInput::make('STR')->label('STR Number')->required()->maxLength(50),
                        TextInput::make('SIP')->label('SIP Number')->required()->maxLength(50),
                        Select::make('hewan')
                            ->multiple()
                            ->label('Spesialisasi')
                            ->options([
                                'kucing' => 'Kucing',
                                'anjing' => 'Anjing',
                                'kelinci' => 'Kelinci',
                                'burung' => 'Burung',
                                'reptil' => 'Reptil',
                            ])
                            ->searchable()
                            ->required(),
                        Textarea::make('deskripsi')->label('Deskripsi')->minLength(2)->maxLength(1024)->required(),
                    ]),

                Forms\Components\Section::make('Profile Picture')
                    ->schema([
                        FileUpload::make('foto')->label('Profile Picture')->image()->maxSize(2048)->required(),
                    ]),

                Forms\Components\Section::make('Schedule')
                    ->schema([
                        Forms\Components\Repeater::make('vetDates')
                            ->label('Jadwal Praktik')
                            ->relationship('vetDates')
                            ->schema([
                                DatePicker::make('tanggal')->native(false)->required(),
                                Forms\Components\Repeater::make('vetTimes')
                                    ->label('Jam Praktik')
                                    ->relationship('vetTimes')
                                    ->schema([
                                        TimePicker::make('jam')->required(),
                                    ]),
                            ])
                            ->columns(2),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto')->label('Profile Picture')->circular(),
                TextColumn::make('nama')->label('Full Name')->searchable()->sortable(),
                TextColumn::make('email')->searchable()->sortable(),
                TextColumn::make('STR')->label('STR Number')->searchable()->sortable(),
                TextColumn::make('SIP')->label('SIP Number')->searchable()->sortable(),
                TextColumn::make('jenis_kelamin')->label('Gender')->searchable()->sortable(),

                // Menampilkan jadwal dokter di tabel
                TextColumn::make('vetDates.tanggal')
                    ->label('Jadwal Praktik'),

                TextColumn::make('vetDates.vetTimes.jam')
                    ->label('Jam Praktik')
                    ->formatStateUsing(function ($record) {
                        return $record->vetDates->flatMap->vetTimes->pluck('jam')->join(', ');
                    }),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('jenis_kelamin')
                    ->label('Gender')
                    ->options([
                        'laki-laki' => 'Male',
                        'perempuan' => 'Female',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVets::route('/'),
            'create' => Pages\CreateVet::route('/create'),
            'edit' => Pages\EditVet::route('/{record}/edit'),
        ];
    }
}
