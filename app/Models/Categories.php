<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\Sluggable\HasTranslatableSlug;
use Spatie\Sluggable\SlugOptions;

/* use Cviebrock\EloquentSluggable\Sluggable; */
class Categories extends Model
{
    use HasFactory;
/*     use Sluggable; */
    protected $table = 'categories';

    protected $fillable = [
        'title',
        'slug',
    ];
    use HasTranslations, HasTranslatableSlug;

    public $translatable = ['title','slug'];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
}
