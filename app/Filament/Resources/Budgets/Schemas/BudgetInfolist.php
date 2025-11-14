<?php

namespace App\Filament\Resources\Budgets\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class BudgetInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('user_id')
                    ->numeric(),
                TextEntry::make('category_id')
                    ->numeric(),
                TextEntry::make('amount_assigned')
                    ->numeric(),
                TextEntry::make('amount_spent')
                    ->numeric(),
                TextEntry::make('month'),
                TextEntry::make('year'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
