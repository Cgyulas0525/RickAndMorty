<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Episodes
 * @package App\Models
 * @version May 20, 2023, 5:57 am UTC
 *
 * @property integer $serie_id
 * @property integer $name
 * @property string $air_date
 * @property string $episode
 */
class Episodes extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'episodes';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'serie_id',
        'name',
        'air_date',
        'episode'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'serie_id' => 'integer',
        'name' => 'string',
        'air_date' => 'date',
        'episode' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'serie_id' => 'required|integer',
        'name' => 'required|string|max:100',
        'air_date' => 'required',
        'episode' => 'required|string|max:10',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    protected $append = [
        'characterNumber',
    ];

    public function getCharacterNumberAttribute() {
        return Episodecharacters::where('episode_id', $this->id)->count();
    }

    public function series() {
        return $this->hasMany(Series::class, 'id');
    }

    public function episodecharacter() {
        return $this->hasMany(Episodecharacters::class);
    }


}
