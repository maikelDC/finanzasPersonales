<?php

namespace App\Filament\Resources\Transactions\Schemas;

use App\Models\Category;
use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make("Complete los campos")
                ->description ("Información de la transacción")
                ->columns(2)
                ->schema([
                Select::make('user_id')
                    ->required()
                    ->options(User::all()->pluck('name', 'id'))
                    ->label(__('User')),
                Select::make('category_id')
                    ->required()
                    ->options(Category::all()->pluck('name', 'id'))
                    ->label(__('category')),
                TextInput::make('amount')
                    ->label('Monto')
                    ->required()
                    ->numeric(),
                RichEditor::make('description')
                    ->label(__('Description'))
                    ->required()
                    ->columnSpanFull()
                    ->columns(2),
                FileUpload::make('image_path')
                    ->label(__('Image'))
                    ->image(),
                DatePicker::make('transaction_date')
                    ->label(__('Transaction Date'))
                    ->required(),
            ])

            ])->columns(1);
    }
}
