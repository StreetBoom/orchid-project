<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Orchid\Attachment\Attachable;
use Orchid\Attachment\Models\Attachment;
use Orchid\Filters\Filterable;
use Orchid\Metrics\Chartable;
use Orchid\Screen\AsSource;

class Client extends Model
{
    use Chartable;
    use HasFactory;
    use AsSource;
    use Filterable;
    use Attachable;
    use Chartable;

    protected $guarded = [];

    protected $allowedSorts = [
        'status'
    ];

    protected $allowedFilters = [
        'phone'
    ];
//
//    public const STATUS = [
//        'interviewed' => 'Опрошен',
//        'not_interviewed' => 'Не опрошен'
//    ];
//
//
//
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function invoice()
    {
        return $this->hasOne(Attachment::class, 'id', 'invoice_id');
    }
}
