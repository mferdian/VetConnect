<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Filament\Resources\BookingResource\RelationManagers;
use App\Models\Booking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Forms\Components\Select::make('vet_id')
                    ->relationship('vet', 'nama')
                    ->required(),
                Forms\Components\Select::make('vet_date_id')
                    ->relationship('vetDate', 'tanggal')
                    ->required(),
                Forms\Components\Select::make('vet_time_id')
                    ->relationship('vetTime', 'jam')
                    ->required(),
                Forms\Components\Textarea::make('keluhan')
                    ->required(),
                Forms\Components\TextInput::make('total_harga')
                    ->numeric()
                    ->prefix('Rp ')
                    ->required(),
                Forms\Components\Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'completed' => 'Completed',
                        'canceled' => 'Canceled',
                    ])->required(),
                Forms\Components\Select::make('status_bayar')
                    ->options([
                        'berhasil' => 'Berhasil',
                        'gagal' => 'Gagal',
                        'pending' => 'Pending',
                    ])->required(),
                Forms\Components\Select::make('metode_pembayaran')
                    ->options([
                        'transfer_bank' => 'Cash',
                        'e-wallet' => 'e-wallet',
                        'cash' => 'Cash',
                        'lainnya' => 'Lainnya',
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->label('User'),
                Tables\Columns\TextColumn::make('vet.nama')->label('Dokter'),
                Tables\Columns\TextColumn::make('vetDate.tanggal')->label('Tanggal'),
                Tables\Columns\TextColumn::make('vetTime.jam')->label('Jam'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('status_bayar'),
            ])
            ->filters([
                //
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }
}
