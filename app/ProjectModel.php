<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ProjectModel
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property boolean $status
 * @property integer $created
 * @method static \Illuminate\Database\Query\Builder|\App\ProjectModel whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ProjectModel whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ProjectModel whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ProjectModel whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ProjectModel whereCreated($value)
 * @mixin \Eloquent
 * @property string $prefix
 * @method static \Illuminate\Database\Query\Builder|\App\ProjectModel wherePrefix($value)
 */
class ProjectModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'project';
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
