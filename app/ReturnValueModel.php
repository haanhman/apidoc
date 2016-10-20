<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ReturnValueModel
 *
 * @property integer $id
 * @property integer $function_id
 * @property string $name
 * @property string $data_type
 * @property string $description
 * @property integer $weight
 * @property integer $created
 * @method static \Illuminate\Database\Query\Builder|\App\ReturnValueModel whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ReturnValueModel whereFunctionId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ReturnValueModel whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ReturnValueModel whereDataType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ReturnValueModel whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ReturnValueModel whereWeight($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ReturnValueModel whereCreated($value)
 * @mixin \Eloquent
 */
class ReturnValueModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'return_value';
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
