<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [

        'title','icon','slug','text',
    ];


    public function subserve(){

        return $this->hasMany(Subservices::class);


    }
    public function getImageLinkAttribute()
    {
        return $this->icon ? url('/') . '/images/' . $this->icon : url('/') . '';
    }


}
