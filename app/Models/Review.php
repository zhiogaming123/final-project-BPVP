<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'reviewable_id',
        'reviewable_type',
        'reviewer_name',
        'email',
        'description',
        'comment',
        'rating',
        'image',
        'is_approved',
    ];

    public function reviewable()
    {
        return $this->morphTo();
    }
}