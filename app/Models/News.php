<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class News extends Model implements HasMedia
{
    use HasFactory, HasUuids, InteractsWithMedia;
    public $incrementing = false;
    protected $primaryKey = "uuid";
    protected $keyType = "string";
    protected $fillable = [
        "headline",
        "image",
        "content",
        "user_uuid",
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
