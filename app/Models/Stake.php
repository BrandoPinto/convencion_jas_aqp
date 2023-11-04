<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Stake
 * 
 * @property int $idStake
 * @property string $name
 * @property string $city
 * @property int $type
 *
 * @package App\Models
 */
class Stake extends Model
{
	protected $table = 'stake';
	protected $primaryKey = 'idStake';
	public $timestamps = false;

	protected $casts = [
		'type' => 'int'
	];

	protected $fillable = [
		'name',
		'city',
		'type'
	];
}
