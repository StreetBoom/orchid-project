<?php

namespace App\Orchid\Screens;

use App\Models\Post;
use App\Models\Tag;
use App\Orchid\Layouts\Post\PostAnimalTable;
use App\Orchid\Layouts\Post\PostCosmosTable;
use App\Orchid\Layouts\Post\PostItTable;
use App\Orchid\Layouts\Post\PostSportTable;
use App\Orchid\Layouts\Post\PostTable;
use App\Orchid\Layouts\Post\PostUsaTable;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;


class PostsScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'posts' => Post::filters()->paginate(5),
            'sport' => Tag::find(1)->posts() -> paginate(5),
            'animal' => Tag::find(2)->posts() -> paginate(5),
            'cosmos' => Tag::find(3)->posts() -> paginate(5),
            'usa' => Tag::find(4)->posts() -> paginate(5),
            'it' => Tag::find(5)->posts() -> paginate(5),



        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Посты';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [

            Layout::tabs([


                'Все посты' => PostTable::class,
                'Посты про спорт'      => PostSportTable::class,
                'Посты про животных'      => PostAnimalTable::class,
                'Посты про космос'      => PostCosmosTable::class,
                'Посты про забугор'      => PostUsaTable::class,
                'Посты про IT'      => PostItTable::class,

            ])->activeTab('Все посты'),







        ];
    }
}
