<?php

namespace App\Filament\Resources\Budgets\Schemas;

use Dom\Text;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

use function Laravel\Prompts\select;

class BudgetForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make("Complete los campos")
                ->description ("Información del presupuesto")
                ->columns(2)
                ->schema([
                Select::make('user_id')
                    ->label(__('User'))
                    ->required()
                    ->relationship('user', 'name'),
                Select::make('category_id')
                    ->label(__('Category'))
                    ->required()
                    ->relationship('category', 'name'),
                TextInput::make('amount_assigned')
                    ->label(__('Amount Assigned'))
                    ->required()
                    ->numeric(),
                TextInput::make('amount_spent')
                    ->label(__('Amount Spent'))
                    ->required()
                    ->numeric()
                    ->default(0.00)
                    ->readOnly(),
                TextInput::make('month')
                    ->label(__('Month'))
                    ->required(),
                TextInput::make('year')
                    ->label(__('Year'))
                    ->required(),
                ])
            ])->columns(1);
    }
}
