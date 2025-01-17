<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    protected $guarded = [
        'id',
    ];

    public $timestamps = false;


    public function styleinteriors()
    {
        return $this->hasMany(Styleinterior::class)
            ->orderBy('name');
    }


    public function homes()
    {
        return $this->hasMany(Home::class);
    }
}
