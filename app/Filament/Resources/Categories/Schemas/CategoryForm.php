<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make("Complete los campos")
                ->description ("Información de la categoría")
                ->columns(2)
                ->schema([
                TextInput::make('name')
                    ->label(__('Name'))
                    ->placeholder('Ej: Comida, Transporte')
                    ->required(),
                Select::make('type')
                    ->label(__('Type'))
                    ->options(['ingreso' => 'Ingreso', 'egreso' => 'Egreso'])
                    ->required(),
                ])
                
            ])->columns(1);
    }
}
