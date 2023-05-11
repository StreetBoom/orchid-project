<?php

namespace App\Orchid\Layouts;

use App\Models\Service;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Rows;

class CreateOrUpdateClient extends Rows
{
    /**
     * Used to create the title of a group of form elements.
     *
     * @var string|null
     */
    protected $title;

    /**
     * Get the fields elements to be displayed.
     *
     * @return Field[]
     */
    protected function fields(): iterable
    {
        $isClientExist = is_null($this->query->getContent('client')) === false;
        return [
            Input::make('client.id')->type('hidden'),
            Input::make('client.phone')->required()->title('Телефон')->mask('8(999) 999-9999')->disabled($isClientExist),
            Group::make
            ([
                Input::make('client.name')->required()->title('Имя')->placeholder('Имя клиента'),
                Input::make('client.last_name')->required()->title('Фамилия')->placeholder('Фамилия клиента'),
            ]),
            Input::make('client.email')->required()->type('email')->title('Email'),
            DateTimer::make('client.birthday')->required()->format('Y-m-d')->title('Дата рождения'),
            Relation::make('client.service_id')->fromModel(Service::class, 'name')->required()->title('Сервис')
                ->help('Один из видов оказания услуг'),
            Select::make('client.assessment')->required()->options([
                'Отлично' => 'Отлично',
                'Хорошо' => 'Хорошо',
                'Удволетворительно' => 'Удволетворительно',
                'Отвратительно' => 'Отвратительно',
            ])->help('Реакция на оказанную услугу')->empty('Не известно', 'Не известно')
        ];
    }
}
