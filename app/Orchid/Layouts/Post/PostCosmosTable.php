<?php

namespace App\Orchid\Layouts\Post;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class PostCosmosTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'cosmos';

    protected function striped(): bool
    {
        return true;
    }

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [

            TD::make('title', 'Название поста')->width('250px'),
            TD::make('text', 'Содержание поста')->width('250px'),

            TD::make('created_at', 'Дата создания')->width('250px')->sort(),
            TD::make('updated_at', 'Дата обновления')->width('250px'),
        ];
    }
}
