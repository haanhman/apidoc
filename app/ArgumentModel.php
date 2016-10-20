<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ArgumentModel
 *
 * @property integer $id
 * @property integer $function_id
 * @property string $name
 * @property string $data_type
 * @property boolean $is_requered
 * @property string $description
 * @property integer $weight
 * @property integer $created
 * @method static \Illuminate\Database\Query\Builder|\App\ArgumentModel whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ArgumentModel whereFunctionId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ArgumentModel whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ArgumentModel whereDataType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ArgumentModel whereIsRequered($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ArgumentModel whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ArgumentModel whereWeight($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ArgumentModel whereCreated($value)
 * @mixin \Eloquent
 * @property boolean $is_header
 * @method static \Illuminate\Database\Query\Builder|\App\ArgumentModel whereIsHeader($value)
 * @property boolean $is_required
 * @method static \Illuminate\Database\Query\Builder|\App\ArgumentModel whereIsRequired($value)
 */
class ArgumentModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'argument';
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
