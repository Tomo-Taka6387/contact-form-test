<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'last_name',
        'first_name',
        'email',
        'tel1',
        'tel2',
        'tel3',
        'gender',
        'address',
        'building',
        'detail',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
