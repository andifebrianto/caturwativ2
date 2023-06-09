<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['thumbnails'];

    public function thumbnails()
    {
        return $this->belongsTo(GalleryThumbnail::class, 'thumbnail_id');
    }
}
