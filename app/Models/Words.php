<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Words extends Model
{
    use HasFactory;
    protected $fillable = [
        'word',
        'correct_choice_id',
    ];

    public function wordChoices()
    {
        return $this->belongsToMany(Choices::class, 'word_choices', 'word_id', 'choice_id');
    }
}
