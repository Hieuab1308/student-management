<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone'];

    public function scores()
    {
        return $this->hasMany(Score::class);
    }
    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'like', "%$search%")
                     ->orWhere('id', $search);
    }
}
