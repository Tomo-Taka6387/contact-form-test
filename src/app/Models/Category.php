<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['content'];

    public function contacts() //念の為記述
    {
        return $this->hasMany(Contact::class);
    }
}
