<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = ['title','photo'];




    public function tags(){

        return $this->belongsToMany(Tag::class,
            'slider_tag',
            'slider_id',
            'tag_id',
            'id',
            'id'
        );
    }

    public function getImageLinkAttribute()
    {
            return $this->photo	 ? url('/') . '/images/' . $this->photo : url('/') . '';
    }
}
