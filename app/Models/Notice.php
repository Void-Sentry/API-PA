<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notice extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = ['title', 'description', 'status_id', 'user_id'];

    protected $dates = ['deleted_at'];

    public function Status()
    {
        return $this->hasOne(Status::class, 'status_id');
    }

    public function User()
    {
        return $this->hasMany(Status::class, 'user_id');
    }
}