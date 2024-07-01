<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    protected $guarded = [
        'id',
    ];

    public $timestamps = false;


    public function homes()
    {
        return $this->hasMany(Home::class);
    }
}
