<?php

namespace App\Filament\Resources\Transactions\Pages;

use App\Filament\Resources\Transactions\TransactionResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateTransaction extends CreateRecord
{
    protected static string $resource = TransactionResource::class;

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
            ->title('Transacción creada exitosamente')
            ->body('La transacción ha sido creada.')
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
