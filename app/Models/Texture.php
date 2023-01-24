<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Texture extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function generateSlug($name){
        return Str::slug($name, '-');
    }

    public function products():HasMany{
        return $this->hasMany(Product::class);
    }
}
