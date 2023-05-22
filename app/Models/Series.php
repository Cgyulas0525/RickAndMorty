<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Series
 * @package App\Models
 * @version May 20, 2023, 5:57 am UTC
 *
 * @property string $name
 * @property string $description
 */
class Series extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'series';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:10',
        'description' => 'nullable|string|max:500',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    protected $append = [
        'episodeNumber',
        'begin',
        'end'
    ];

    public function getEpisodeNumberAttribute() {
        return Episodes::where('serie_id', $this->id)->count();
    }

    public function episodes() {
        return $this->belongsTo(Episodes::class, 'serie_id');
    }

    public function getBeginAttribute() {
        return Episodes::where('serie_id', $this->id)->get()->min('air_date');
    }

    public function getEndAttribute() {
        return Episodes::where('serie_id', $this->id)->get()->max('air_date');
    }


}
