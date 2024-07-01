<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Styleinterior extends Model
{
    protected $guarded = [
        'id',
    ];

    public $timestamps = false;


    public function style()
    {
        return $this->belongsTo(Style::class);
    }


    public function homes()
    {
        return $this->hasMany(Home::class);
    }
}
