<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrlShortener extends Model
{
	 protected $fillable = ['original_url', 'short_code', 'click_count','user_id'];
	 public function user()
    {
        return $this->belongsTo(User::class);
    }
    use HasFactory;
}
