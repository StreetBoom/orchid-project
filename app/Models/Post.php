<?php

namespace App\Models;

use Database\Factories\PostFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Metrics\Chartable;
use Orchid\Screen\AsSource;

class Post extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;
    use Attachable;
    use Chartable;

    protected $guarded = false;

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected $allowedFilters = [
        'title',
        'tag_id',
        'created_at',
        'updated_at'
    ];

      protected $allowedSorts = [
        'title',
        'tag_id',
        'created_at',
        'updated_at'
    ];

}
