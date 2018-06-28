<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Book extends Model
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
        'id', 'rack_id', 'title', 'author', 'published_year', 'archive', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    /**
     * Models relation functions.
     *
     */
    public function rack(){
        return $this->belongsTo('App\Rack');
    }

    public static function getBooksWithRack($filters=[]){
        $query = Book::where('archive', 0);
        foreach ($filters as $col => $val) {
            if(!empty($val)){
                $query = $query->where($col, 'LIKE', '%'.$val.'%');
            }
        }
        $query = $query->with('rack');
        return $query->paginate(10);
    }
}
