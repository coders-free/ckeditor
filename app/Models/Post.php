<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    //Mutadores y accesores
    protected function image():Attribute
    {
        return new Attribute(
            /* get: fn() => $this->image_url ? Storage::url($this->image_url) : "https://s.udemycdn.com/course/750x422/placeholder.jpg" */
            get: fn() => $this->image_url ?? "https://s.udemycdn.com/course/750x422/placeholder.jpg"
        );
    }
}
