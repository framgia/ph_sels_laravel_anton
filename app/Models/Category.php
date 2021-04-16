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
        return Lesson::where('category_id',$this->id)->where('user_id',Auth::user()->id);
    }

    public function isTakenByUser()
    {
        return $this->lessons()->count() > 0;
    }
}
