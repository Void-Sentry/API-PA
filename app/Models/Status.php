<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = ['name', 'image_id'];

    protected $dates = ['deleted_at'];

    public function Image()
    {
        return $this->hasOne(Image::class, 'image_id');
    }
}
