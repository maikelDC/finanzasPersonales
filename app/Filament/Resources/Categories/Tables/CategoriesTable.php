<?php

namespace App\Filament\Resources\Categories\Tables;

use Dom\Text;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class CategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('#')
                    ->sortable()
                    ->rowIndex(),
                TextColumn::make('name')
                    ->label(__('Name'))
                    ->sortable()
                    ->searchable(),
                TextColumn::make('type')
                    ->label(__('Type'))
                    ->sortable()
                    ->searchable()
                    ->badge()
                      ->colors([
                        'success' => 'ingreso',
                        'danger' => 'egreso',
                    ]),
                TextColumn::make('created_at')
                    ->label(__('Created At'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label(__('Updated At'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
              SelectFilter::make('type')
                ->label(__('Type'))
                ->options([
                    'ingreso' => 'ingreso',
                    'egreso' => 'egreso',
                ])
                ->placeholder('Filtrar por tipo')
                ->label(__('Type')),

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
                ->title('Categoría eliminada exitosamente')
                ->body('La categoría ha sido eliminada.')
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
