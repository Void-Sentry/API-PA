<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image
{
    use HasFactory;

    protected $fillable = ['name', 'originalName', 'path'];

    protected $dates = ['created_at'];
}