<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Movie
 *
 * @property $id
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @property Hero[] $heroes
 * @property Villain[] $villains
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Movie extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function heroes()
    {
        return $this->hasMany(\App\Models\Hero::class, 'id', 'movie_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function villains()
    {
        return $this->hasMany(\App\Models\Villain::class, 'id', 'movie_id');
    }
    
}
