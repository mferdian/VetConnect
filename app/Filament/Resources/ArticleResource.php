<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Filament\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
use App\Models\User;
use App\Models\Vet;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('vet_id')
                    ->label('Author')
                    ->options(Vet::all()->pluck('nama', 'id'))
                    ->searchable()
                    ->required(),
                TextInput::make('judul')
                    ->label('Judul Artikel')
                    ->required()
                    ->maxLength(255),
                Textarea::make('isi')
                    ->label('Isi Artikel')
                    ->required()
                    ->rows(6),
                Repeater::make('gambar')
                    ->schema([
                        FileUpload::make('image')
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '16:9',
                                '4:3',
                                '1:1',
                            ])
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('vet.nama')
                    ->label('Nama Vet')
                    ->sortable()
                    ->searchable(),
                ImageColumn::make('gambar')
                    ->label('Thumbnail')
                    ->circular()
                    ->size(40)
                    ->state(function (Article $record): ?string {

                        if (is_array($record->gambar) && count($record->gambar) > 0) {
                            if (isset($record->gambar[0]['image'])) {
                                return $record->gambar[0]['image'];
                            }
        
                            return $record->gambar[0];
                        }
                        return null;
                    }),
                TextColumn::make('judul')
                    ->label('Judul')
                    ->sortable()
                    ->searchable()
                    ->limit(50)
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
