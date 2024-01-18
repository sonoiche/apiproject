<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = "articles";
    protected $guarded = [];
    protected $appends = ['created_date_human','display_feature_photo'];

    public function getCreatedDateHumanAttribute()
    {
        $created_at = $this->attributes['created_at'];
        if($created_at) {
            return Carbon::parse($created_at)->diffForHumans();
        }

        return '';
    }

    public function getDisplayFeaturePhotoAttribute()
    {
        $feature_photo = $this->attributes['feature_photo'];
        if($feature_photo) {
            return config('app.url').'/storage/'.$feature_photo;
        }

        return '';
    }
}
