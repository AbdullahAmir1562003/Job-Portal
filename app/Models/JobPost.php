<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'company',
        'location',
        'job_type',
        'salary',
        'description',
    ];

    /**
     * Get the user (employer) that owns the job post.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}