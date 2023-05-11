<?php

namespace App\Orchid\Screens;

use App\Models\Client;
use App\Orchid\Layouts\Charts\DynamicsClients;
use App\Orchid\Layouts\Charts\FeedbackClients;
use Orchid\Support\Color;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Screen;

class AnalytiksAndReportsScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'Feedback' => Client::whereNotNull('assessment')->countForGroup('assessment')->toChart(),
            'dynamics' => [
                Client::whereNotNull('assessment')
                    ->countByDays(null, null, 'updated_at')
                    ->toChart('Опрошеные Клиенты'),
                Client::countByDays()
                    ->toChart('Новые Клиенты'),
            ]

        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Аналитика и отчеты';
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
            Layout::columns([
                FeedbackClients::class,
                DynamicsClients::class,

            ]),

            Layout::tabs([
                'Загрузка новых телефонов' => [
                    Layout::rows([
                        Input::make('file')
                            ->type('file')
                            ->required()
                            ->help('Необходимо загрузить файл csv с телефонами')
                            ->title('Файл стелефонами в формате csv'),
                        Button::make('Загрузить')
                            ->confirm('Вы уверены?')
                            ->type(Color::PRIMARY())
                            ->method('importClientPhone')
                    ]),
                ],
                'Отчеты по клиентам' => [
                    Layout::rows([
                        Button::make('Cкачать')
                            ->method('exportClients')
                    ]),


                ]
            ])


        ];
    }
}
