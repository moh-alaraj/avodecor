<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','text','icon','slug'
    ];


    public function getImageLinkAttribute()
    {
        return $this->icon ? url('/') . '/images/' . $this->icon : url('/') . '';
    }
}
