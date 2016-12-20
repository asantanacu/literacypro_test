<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Band extends Model
{
    use Sortable;

    public $sortable = ['id',
                        'name',
                        'start_date',
                        'website',
                        'still_active'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'start_date', 'website', 'still_active'
    ];

    /**
     * Get the albums for the band.
     */
    public function albums()
    {
        return $this->hasMany('App\Album');
    } 

    /**
     * Get the user that owns the band.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
