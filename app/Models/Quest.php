<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Quest extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category',
        'required',
    ];
    public function completedByUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_quests')->withTimestamps();
    }
    public function slides(): HasMany
    {
        return $this->hasMany(QuestSlide::class);
    }
}
