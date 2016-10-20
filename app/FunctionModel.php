<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\FunctionModel
 *
 * @property integer $id
 * @property integer $group_id
 * @property string $end_point
 * @property string $request_method
 * @property string $description
 * @property string $sample_data
 * @property integer $created
 * @property boolean $status
 * @method static \Illuminate\Database\Query\Builder|\App\FunctionModel whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FunctionModel whereGroupId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FunctionModel whereEndPoint($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FunctionModel whereRequestMethod($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FunctionModel whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FunctionModel whereSampleData($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FunctionModel whereCreated($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FunctionModel whereStatus($value)
 * @mixin \Eloquent
 */
class FunctionModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'function';
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
