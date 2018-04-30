<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teleport extends Model
{
    protected $fillable = [
        'status',
        'city_search',
        'query_result',
    ];

}
