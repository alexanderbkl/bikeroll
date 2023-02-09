<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'sponsors_courses');
    }

    public function getRouteKeyName()
    {
        return 'cif';
    }
}
