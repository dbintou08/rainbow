<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReservationResource\Pages;
use App\Models\Reservation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class ReservationResource extends Resource
{
  protected static ?string $model = Reservation::class;

  protected static ?string $navigationIcon = 'heroicon-o-ticket'; // Icône dans la sidebar
  protected static ?string $navigationLabel = 'Réservations'; // Label dans la sidebar
  protected static ?string $navigationGroup = 'Gestion des réservations'; // Groupe dans la sidebar

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        // Formulaire de création/édition
        Forms\Components\Select::make('user_id')
          ->label('Utilisateur')
          ->relationship('user', 'name') // Relation avec le modèle User
          ->required(),
        Forms\Components\Select::make('screening_id')
          ->label('Séance')
          ->relationship('screening', 'datetime') // Relation avec le modèle Screening
          ->required(),
        Forms\Components\TextInput::make('number_of_tickets')
          ->label('Nombre de tickets')
          ->numeric()
          ->required(),
        Forms\Components\TextInput::make('total_amount')
          ->label('Montant total')
          ->numeric()
          ->required(),
        Forms\Components\Select::make('status')
          ->label('Statut')
          ->options([
            'pending' => 'En attente',
            'confirmed' => 'Confirmée',
            'cancelled' => 'Annulée',
          ])
          ->required(),
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        // Colonnes du tableau
        TextColumn::make('id')->sortable()->label('ID'),
        TextColumn::make('user.name')->label('Utilisateur')->sortable(),
        TextColumn::make('screening.datetime')->label('Séance')->dateTime('d/m/Y H:i')->sortable(),
        TextColumn::make('number_of_tickets')->label('Nombre de tickets')->sortable(),
        TextColumn::make('total_amount')->label('Montant total')->money('eur')->sortable(),
        TextColumn::make('status')->label('Statut'),
        TextColumn::make('payment.status')->label('Statut du paiement')
      ])
      ->filters([
        // Filtres optionnels
        Tables\Filters\SelectFilter::make('status')
          ->options([
            'pending' => 'En attente',
            'confirmed' => 'Confirmée',
            'cancelled' => 'Annulée',
          ]),
      ]);
  }

  public static function getPages(): array
  {
    return [
      'index' => Pages\ListReservations::route('/'),
      'create' => Pages\CreateReservation::route('/create'),
      'edit' => Pages\EditReservation::route('/{record}/edit'),
    ];
  }
}
