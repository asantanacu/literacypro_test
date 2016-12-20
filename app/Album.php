<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Album extends Model
{
    use Sortable;

    public $sortable = ['id',
                        'name',
                        'recorded_date',
                        'number_of_tracks',
                        'label',
                        'producer',
                        'genre'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'recorded_date', 'number_of_tracks', 'label', 'producer', 'genre'
    ];

    /**
     * Get the band that owns the album.
     */
    public function band()
    {
        return $this->belongsTo('App\Band');
    }  

          /**
     * @param \Illuminate\Database\Query\Builder $query
     * @param array|null $defaultSortParameters
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeFilterBand($query, $band_id = null)
    {
        if ($band_id)
            $query->where('band_id', $band_id);
        return $query;
    }
}
