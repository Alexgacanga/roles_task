<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    protected $fillable = [
        'name',
        'description',
        'content',
        'user_id'
    ];
    protected $guarded = [
        'id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
