<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $classe_id
 * @property integer $module_id
 * @property string $type
 * @property float $duration
 * @property string $session
 * @property string $created_at
 * @property string $updated_at
 * @property Class $class
 * @property Module $module
 * @property Mark[] $marks
 */
class Exams extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['classe_id', 'module_id', 'type', 'duration', 'session', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function classe()
    {
        return $this->belongsTo(Classe:class, 'classe_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function marks()
    {
        return $this->hasMany(Mark::class, 'classe_id');
    }
}
