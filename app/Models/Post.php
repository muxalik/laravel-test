<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
    ];

    public function calculateReadTime(): int
    {
        $USER_WORD_READ_COUNT_PER_MINUTE = 265;

        return ceil(
            str($this->content)->wordCount() / $USER_WORD_READ_COUNT_PER_MINUTE * 60,
        );
    }
}
