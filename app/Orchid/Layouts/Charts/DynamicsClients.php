<?php

namespace App\Orchid\Layouts\Charts;

use Orchid\Screen\Layouts\Chart;

class DynamicsClients extends Chart
{
    protected $title = 'Динамика опрошеных клиентов';
    /**
     * Available options:
     * 'bar', 'line',
     * 'pie', 'percentage'.
     *
     * @var string
     */
    protected $type = 'line';


    protected $target = 'dynamics';

    /**
     * Determines whether to display the export button.
     *
     * @var bool
     */
    protected $export = true;
}
