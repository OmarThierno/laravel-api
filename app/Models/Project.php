<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'description', 'slug', 'type_id', 'user_id'];

    public function type() {
        return $this->belongsTo(Type::class);
    }

    public function technologys() {
        return $this->belongsToMany(Technology::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function setNameAttribute($name) {
        $this->attributes['slug'] = Str::slug($name);
        $this->attributes['name'] = $name;
    }

    public function scopeRecent($query) {
        return $query->where('created_at', '>=', Carbon::now()->subDay(7));
    }
}
