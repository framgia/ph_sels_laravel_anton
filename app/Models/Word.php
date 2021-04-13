<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    use HasFactory;
    protected $fillable = [
        'word',
        'correct_choice_id',
    ];

    public function wordChoices()
    {
        return $this->belongsToMany(Choice::class, 'word_choices', 'word_id', 'choice_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
