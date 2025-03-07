<?php

namespace App\Filament\Resources\MovieResource\Pages;

use App\Filament\Resources\MovieResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMovie extends CreateRecord
{
    //Spécifie la ressource associée à cette page.
    // Cela indique à Filament quelle ressource utiliser pour la création d'un film.
    protected static string $resource = MovieResource::class;
}
