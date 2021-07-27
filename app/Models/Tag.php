<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['title'];



    public function sliders(){

        return $this->belongsToMany(Slider::class,
            'slider_tag',
            'tag_id',
            'slider_id',
            'id',
            'id'
        );
    }
}
