<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Hero
 *
 * @property $id
 * @property $name
 * @property $power
 * @property $movie_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Movie $movie
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Hero extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'power', 'movie_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function movie()
    {
        return $this->belongsTo(\App\Models\Movie::class, 'movie_id', 'id');
    }
    
}
