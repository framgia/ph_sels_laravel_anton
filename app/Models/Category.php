<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
    ];

    public function words()
    {
        return $this->hasMany(Word::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class)->where('user_id',Auth::user()->id)->get();
    }

    public function isTakenByUser()
    {
        return $this->lessons()->count() > 0;
    }

    public function lesson()
    {
        return $this->hasMany(Lesson::class);
    }
}
