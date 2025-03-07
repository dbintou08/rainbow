<?php

namespace App\Filament\Resources\MovieResource\Pages;

use App\Filament\Resources\MovieResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMovie extends EditRecord
{
    //Spécifie la ressource associée à cette page.
    protected static string $resource = MovieResource::class;

    //Retourne les actions à afficher dans l'en-tête de la page
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
