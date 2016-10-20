<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\GroupFunctionModel
 *
 * @property integer $id
 * @property integer $project_id
 * @property string $name
 * @property string $description
 * @property integer $created
 * @method static \Illuminate\Database\Query\Builder|\App\GroupFunctionModel whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\GroupFunctionModel whereProjectId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\GroupFunctionModel whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\GroupFunctionModel whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\GroupFunctionModel whereCreated($value)
 * @mixin \Eloquent
 */
class GroupFunctionModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'group_function';
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
