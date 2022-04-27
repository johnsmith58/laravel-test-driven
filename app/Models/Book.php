<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function path()
    {
        return '/books/' . $this->id;
    }

    // public function setAuthorIdAttribute($author)
    // {
    //     $this->attributes['author_id'] = Author::firstOrCreate([
    //         'name' => $author
    //     ])->id;
    // }

    public function orderDate() : Attribute
    {
        return new Attribute(
            get: fn ($value) => Carbon::now(),
            set: fn ($value) => Carbon::now()
        );
    }
}
