<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected function slug(): Attribute
    {
        return new Attribute(
            get: fn () => str_replace(' ','-',strtolower($this->name))
        );
    }
}
