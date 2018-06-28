<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Rack extends Model
{

    /**
     * The attributes to add timestamps.
     *
     * @var array
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'archive', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    /**
     * Model Relations
     *
     */
    public function books(){
        return $this->hasMany('App\Book');
    }
}
