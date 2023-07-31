<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Game extends Model
{
    use HasFactory;


    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function scopeSearch(Builder $query,string $text):Builder
    {
        return $query->where('title', 'LIKE', '%' . $text . '%')
            ->orWhere('description', 'LIKE', '%' . $text . '%');
    }

    public function scopeHot(Builder $query):Builder
    {
        return $query->withCount('reviews')
            ->orderBy('reviews_count','desc');
    }
    public function scopeTop(Builder $query):Builder
    {
        return $query->withCount('reviews')
            ->withAvg('reviews','rating')->
            orderBy('reviews_avg_rating','desc')
            ->limit(10);
    }
    public function scopeLowPc(Builder $query):Builder
    {
        return $query->orderBy('ram')->limit(10);
    }
    public function scopeLowSpace(Builder $query):Builder
    {
        return $query->orderBy('storage')->limit(10);
    }

    public function scopeLowEndPC(Builder $query):Builder
    {
        return $query->where('storage','<=',30)->
        where('ram','<=',4)->orderBy('ram')->
        orderBy('storage')->limit(20);
    }
}
