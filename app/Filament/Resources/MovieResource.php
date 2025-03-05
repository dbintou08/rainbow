<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MovieResource\Pages;
use App\Models\Movie;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables;

class MovieResource extends Resource
{
  protected static ?string $model = Movie::class;

  protected static ?string $navigationIcon = 'heroicon-o-film';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Forms\Components\TextInput::make('title')
          ->required()
          ->maxLength(255),
        Forms\Components\Select::make('category_id')
          ->relationship('category', 'name')
          ->required(),
        Forms\Components\TextInput::make('duration')
          ->required()
          ->numeric(),
        Forms\Components\Textarea::make('description')
          ->maxLength(65535),
        Forms\Components\TextInput::make('image_url')
          ->maxLength(255),
      Forms\Components\Repeater::make('screenings')
        ->relationship()
        ->schema([
          Forms\Components\Select::make('room_id')
            ->relationship('room', 'number')
            ->required(),
          Forms\Components\DateTimePicker::make('datetime')
            ->required(),
          Forms\Components\TextInput::make('available_seats')
            ->required()
            ->numeric(),
        ])
        // ->orderable('datetime')
        ->defaultItems(1),
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        Tables\Columns\TextColumn::make('title'),
        Tables\Columns\TextColumn::make('category.name'),
        Tables\Columns\TextColumn::make('duration'),
        Tables\Columns\TextColumn::make('description'),
        Tables\Columns\TextColumn::make('image_url'),
      ])
      ->filters([
        //
      ]);
  }

  public static function getPages(): array
  {
    return [
      'index' => Pages\ListMovies::route('/'),
      'create' => Pages\CreateMovie::route('/create'),
      'edit' => Pages\EditMovie::route('/{record}/edit'),
    ];
  }
}
