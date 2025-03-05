<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class CategoryResource extends Resource
{
  protected static ?string $model = Category::class;

  protected static ?string $navigationIcon = 'heroicon-o-tag';

  public static function form(Forms\Form $form): Forms\Form
  {
    return $form
      ->schema([
        TextInput::make('name')
          ->required()
          ->maxLength(255),

        Textarea::make('description')
          ->nullable(),
      ]);
  }

  public static function table(Tables\Table $table): Tables\Table
  {
    return $table
      ->columns([
        TextColumn::make('id')->sortable(),
        TextColumn::make('name')->searchable()->sortable(),
        TextColumn::make('description')->limit(50),
        TextColumn::make('created_at')->dateTime('d/m/Y H:i'),
      ])
      ->filters([]);
  }

  public static function getRelations(): array
  {
    return [];
  }

  public static function getPages(): array
  {
    return [
      'index' => Pages\ListCategories::route('/'),
      'create' => Pages\CreateCategory::route('/create'),
      'edit' => Pages\EditCategory::route('/{record}/edit'),
    ];
  }
}
