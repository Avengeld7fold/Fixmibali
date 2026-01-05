<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryRepairImageStat extends Model
{
    protected $table = 'gallery_repair_image_stats';

    protected $primaryKey = 'filename';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'filename',
        'views',
    ];
}
