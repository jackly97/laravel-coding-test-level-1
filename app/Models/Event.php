<?php

namespace App\Models;

use App\Traits\EventUuids;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sluggable;
    use EventUuids;

    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'slug',
        'start_at',
        'end_at',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }
}
