<?php

namespace App\Filament\Resources\Categories\Pages;

use App\Filament\Resources\Categories\CategoryResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateCategory extends CreateRecord
{
    protected static string $resource = CategoryResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return null;
    }

    protected function afterCreate(): void
    {
        Notification::make()
            ->title('Categoría creada exitosamente')
            ->body('La categoría ha sido creada.')
            ->success()
            ->send();
    }

    protected function getFormActions(): array
    {
        return [
          
            $this->getCreateFormAction()
              ->label('Registrar'),
          
             // $this->getCreateAnotherFormAction()
              //->label('Registrar y crear otra'), 
          
              $this->getCancelFormAction()
              ->label('Cancelar')
              ->color('danger'), 
        ];


    }
}
