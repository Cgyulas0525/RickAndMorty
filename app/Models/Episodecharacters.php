<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Episodecharacters
 * @package App\Models
 * @version May 20, 2023, 5:56 am UTC
 *
 * @property integer $episode_id
 * @property integer $character_id
 */
class Episodecharacters extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'episodecharacters';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'episode_id',
        'character_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'episode_id' => 'integer',
        'character_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'episode_id' => 'required|integer',
        'character_id' => 'required|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function episode() {
        $this->belongsTo(Episodes::class);
    }

    public function character() {
        $this->belongsTo(Characters::class);
    }


}
