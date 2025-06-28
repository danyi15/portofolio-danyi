<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Biodata extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'full_name',
        'title',
        'short_description',
        'photo',
        'email',
        'phone',
        'location',
        'resume_link',

    ];

}
