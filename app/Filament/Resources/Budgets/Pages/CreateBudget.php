<?php

namespace App\Filament\Resources\Budgets\Pages;

use App\Filament\Resources\Budgets\BudgetResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBudget extends CreateRecord
{
    protected static string $resource = BudgetResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotification(): ?\Filament\Notifications\Notification
    {
        return null;
    }

    protected function afterCreate(): void
    {
        \Filament\Notifications\Notification::make()
            ->title('Presupuesto creado exitosamente')
            ->body('El presupuesto ha sido creado.')
            ->success()
            ->send();
    }
}
