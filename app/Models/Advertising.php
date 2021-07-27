<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertising extends Model
{
    use HasFactory;

    protected $fillable = [

        'title','text','photo','slug'
    ];



    public function getImageLinkAttribute()
    {
        return $this->photo ? url('/') . '/images/' . $this->photo : url('/') . '';
    }


}
