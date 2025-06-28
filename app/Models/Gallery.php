<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
     use HasFactory, SoftDeletes;

    protected $fillable = [
        'gallery_category_id',
        'title',
        'image_path',
        'video_path',
        'video_url',
        'description',
        'cover_image',
        'thumbnail',
    ];

    public function galleryCategory(): BelongsTo {
        return $this->belongsTo(GalleryCategory::class, 'gallery_category_id');
    }

}
