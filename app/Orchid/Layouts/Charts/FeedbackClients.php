<?php

namespace App\Orchid\Layouts\Charts;

use Orchid\Screen\Layouts\Chart;

class FeedbackClients extends Chart
{

    protected $title = 'Отзывы клиентов';
    /**
     * Available options:
     * 'bar', 'line',
     * 'pie', 'percentage'.
     *
     * @var string
     */
    protected $type = 'pie';

    protected $target = 'Feedback';
    /**
     * Determines whether to display the export button.
     *
     * @var bool
     */
    protected $export = true;
}
