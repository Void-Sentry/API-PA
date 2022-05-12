<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notice extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = ['title', 'description', 'body' ,'status_id', 'user_id', 'image_id'];

    protected $dates = ['deleted_at'];

    public function Status()
    {
        return $this->hasOne(Status::class, 'status_id');
    }

    public function User()
    {
        return $this->hasMany(User::class, 'user_id');
    }

    public function Image()
    {
        return $this->hasMany(Image::class, 'image_id');
    }
}