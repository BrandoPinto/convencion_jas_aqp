<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ward
 * 
 * @property int $idWard
 * @property string $name
 * @property string $city
 * @property int $type
 * @property int $idStake
 *
 * @package App\Models
 */
class Ward extends Model
{
	protected $table = 'ward';
	protected $primaryKey = 'idWard';
	public $timestamps = false;

	protected $casts = [
		'type' => 'int',
		'idStake' => 'int'
	];

	protected $fillable = [
		'name',
		'city',
		'type',
		'idStake'
	];
}
