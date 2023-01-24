<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function generateSlug($name){
        return Str::slug($name, '-');
    }

    public function brand():BelongsTo{
        return $this->belongsTo(Brand::class);
    }

    public function tag():BelongsToMany{
        return $this->belongsToMany(Tag::class);
    }

    public function category():BelongsTo{
        return $this->belongsTo(Category::class);
    }

    public function texture():BelongsTo{
        return $this->belongsTo(Texture::class);
    }
}
