<?php

namespace App\Orchid\Layouts\Post;

use App\Models\Post;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class PostTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'posts';

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

            TD::make('image', 'image')->width('250px'),
            TD::make('title', 'Название поста')->width('250px'),
            TD::make('text', 'Содержание поста')->width('250px'),
            TD::make('tag_id', 'Тема')->width('100px')->render(function (Post $post){
                if ($post->tag_id === 1) {
                    return 'Спорт';
                }
                if ($post->tag_id === 2) {
                    return 'Животные';
                }if ($post->tag_id === 3) {
                    return 'Космос';
                }if ($post->tag_id === 4) {
                    return 'Забугорье';
                }else
                    return 'It';
            })->popover('1-Cпорт 2-Животные 3-Космос 4-Забугорье 5-IT')->filter()->sort(),

            TD::make('created_at', 'Дата создания')->defaultHidden()->width('250px')->sort(),
            TD::make('updated_at', 'Дата обновления')->defaultHidden()->width('250px'),
        ];
    }
}
