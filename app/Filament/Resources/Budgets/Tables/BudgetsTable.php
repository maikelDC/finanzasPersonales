<?php

namespace App\Filament\Resources\Budgets\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BudgetsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                  TextColumn::make('id')
                    ->label('#')
                    ->sortable()
                    ->rowIndex(),
                TextColumn::make('user.name')
                    ->label(__('User'))
                    ->sortable(),
                TextColumn::make('category.name')
                    ->label(__('category'))
                    ->sortable(),
                TextColumn::make('amount_assigned')
                    ->label(__('Amount Assigned'))
                    ->numeric()
                    ->sortable(),
                 TextColumn::make('available')
                    ->label('Disponible')
                    ->numeric()
                    ->color(fn($record) => $record->available >= 0 ? 'success' : 'danger')
                    ->sortable(),
                TextColumn::make('amount_spent')
                    ->label(__('Amount Spent'))
                    ->numeric()
                    ->color('danger')
                    ->sortable(),
                TextColumn::make('month')
                    ->label(__('Month'))
                    ->searchable(),
                TextColumn::make('year')
                    ->label(__('Year'))
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                  ViewAction::make(),
                
                EditAction::make()
                ->button()
                ->color('success'),

                DeleteAction::make()
                ->button()
                ->color('danger')
                 ->successNotification
                    (Notification::make()
                ->title('Presupuesto eliminado exitosamente')
                ->body('El presupuesto ha sido eliminado.')
                ->success()
                     ),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
