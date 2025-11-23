<?php

namespace App\Filament\Resources\Transactions\Tables;

use App\Models\User;
use Dom\Text;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class TransactionsTable
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
                    ->searchable()
                    ->sortable(),
                TextColumn::make('category.name')
                    ->label(__('category'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('category.type')
                    ->label(__('Category Type'))
                    ->sortable(),
                TextColumn::make('amount')
                    ->label('Monto')
                    ->sortable(),
                TextColumn::make('description')
                    ->label(__('Description'))
                    ->html()
                    ->searchable()
                    ->sortable()
                    ->limit(50)
                    ->wrap(),
                ImageColumn::make('image_path')
                    ->label(__('Image'))
                    ->sortable(),
                TextColumn::make('transaction_date')
                    ->label(__('Transaction Date'))
                    ->date()
                    ->sortable(),
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
                //  SelectFilter::make('category.type')
                // ->label(__('Type'))
                // ->options([
                //     'ingreso' => 'ingreso',
                //     'egreso' => 'egreso',
                // ])
                // ->placeholder('Filtrar por tipo')
                // ->label(__('Type')),
            ])
            ->recordActions([
                
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
