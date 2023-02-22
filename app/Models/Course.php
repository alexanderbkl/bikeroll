<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function sponsors()
    {
        return $this->belongsToMany(Sponsor::class, 'sponsors_courses');
    }

    public function getRouteKeyName()
    {
        return 'url';
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'courses_users');
    }
}