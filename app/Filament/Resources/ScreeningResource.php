<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ScreeningResource\Pages;
use App\Filament\Resources\ScreeningResource\RelationManagers;
use App\Models\Room;
use App\Models\Screening;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ScreeningResource extends Resource
{
  protected static ?string $model = Screening::class;

  protected static ?string $navigationIcon = 'heroicon-o-clock';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Forms\Components\Select::make('movie_id')
          ->relationship('movie', 'title')
          ->required(),
        Forms\Components\Select::make('room_id')
          ->relationship('room', 'number')
          ->required()
          ->reactive() // Permet de détecter les changements
                        ->afterStateUpdated(fn ($state, callable $set) =>
                            $set('available_seats', Room::find($state)?->capacity ?? null)
                        ),
        Forms\Components\DateTimePicker::make('datetime')
          ->required(),
        Forms\Components\TextInput::make('available_seats')
          ->required()
          ->readOnly()
          ->numeric(),
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        Tables\Columns\TextColumn::make('movie.title'),
        Tables\Columns\TextColumn::make('room.number'),
        Tables\Columns\TextColumn::make('datetime'),
        Tables\Columns\TextColumn::make('available_seats'),
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

  // public static function getNavigationLabel(): string
  // {
  //   return 'Nouvelle séance';
  // }

  public static function getLabel(): string
  {
    return 'Séances';
  }

  public static function getPages(): array
  {
    return [
      'index' => Pages\ListScreenings::route('/'),
      'create' => Pages\CreateScreening::route('/create'),
      'edit' => Pages\EditScreening::route('/{record}/edit'),
    ];
  }


    public static function getRelations(): array
    {
        return [
            //
        ];
    }
}
