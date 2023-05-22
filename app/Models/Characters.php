<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Characters
 * @package App\Models
 * @version May 20, 2023, 5:57 am UTC
 *
 * @property string $name
 * @property string $status
 * @property string $species
 * @property string $type
 * @property string $gender
 * @property string $origin_name
 * @property string $origin_url
 * @property string $location_name
 * @property string $location_url
 * @property string $image
 */
class Characters extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'characters';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'status',
        'species',
        'type',
        'gender',
        'origin_name',
        'origin_url',
        'location_name',
        'location_url',
        'image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'status' => 'string',
        'species' => 'string',
        'type' => 'string',
        'gender' => 'string',
        'origin_name' => 'string',
        'origin_url' => 'string',
        'location_name' => 'string',
        'location_url' => 'string',
        'image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:100',
        'status' => 'required|string|max:100',
        'species' => 'required|string|max:100',
        'type' => 'required|string|max:100',
        'gender' => 'required|string|max:100',
        'origin_name' => 'required|string|max:100',
        'origin_url' => 'required|string|max:100',
        'location_name' => 'required|string|max:100',
        'location_url' => 'required|string|max:100',
        'image' => 'required|string|max:100',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    protected $append = [
        'episodeNumber',
    ];

    public function getEpisodeNumberAttribute() {
        return Episodecharacters::where('character_id', $this->id)->count();
    }

    public function episodecharacter() {
        return $this->hasMany(Episodecharacters::class, 'character_id');
    }

}
