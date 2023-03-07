<?php

namespace App\Filament\Widgets;

use App\Models\Item;
use Closure;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class ItemsWidget extends BaseWidget
{
    protected int|string|array $columnSpan = 'full';

    protected function getTableQuery(): Builder
    {
        return Item::query()->latest();
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('name')
                ->sortable()
                ->searchable(),
            TextColumn::make('amount')
//                ->action(fn ($record) => !$record->isFirstInOrder() ? $record->moveOrderUp() : null)
                ->sortable(),
            TextColumn::make('category.name')
                ->sortable()
                ->searchable(),
            TextColumn::make('device.name')
                ->sortable()
                ->searchable(),
        ];
    }
}
