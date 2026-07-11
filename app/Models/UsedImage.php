<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsedImage extends Model
{
    protected $fillable = ['site_id', 'provider', 'photo_id'];
}
