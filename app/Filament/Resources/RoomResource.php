<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoomResource\Pages;
use App\Filament\Resources\RoomResource\RelationManagers;
use App\Models\Room;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RoomResource extends Resource
{
  protected static ?string $model = Room::class;

  protected static ?string $navigationIcon = 'heroicon-o-building-office';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Forms\Components\TextInput::make('number')
          ->required()
          ->maxLength(255),
        Forms\Components\TextInput::make('capacity')
          ->required()
          ->numeric(),
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        Tables\Columns\TextColumn::make('number'),
        Tables\Columns\TextColumn::make('capacity'),
      ])
      ->filters([
        //
      ]);
  }

  // public static function getNavigationLabel(): string
  // {
  //   return 'Nouvelle salle';
  // }

  public static function getLabel(): string
  {
    return 'Salles';
  }

  public static function getPages(): array
  {
    return [
      'index' => Pages\ListRooms::route('/'),
      'create' => Pages\CreateRoom::route('/create'),
      'edit' => Pages\EditRoom::route('/{record}/edit'),
    ];
  }
}
