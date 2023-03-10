<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pin extends Model
{
    use HasFactory;

    protected $table = 'pins';

    protected $fillable = [
        'title',
        'description',
        'image_url',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function active()
    {
        return self::where('status', 'active')->orderByDesc('id')->get();
    }

}