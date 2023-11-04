<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Competitor
 * 
 * @property int $idCompetitor
 * @property int $dni
 * @property string $name
 * @property string $last_name
 * @property int $phone
 * @property string|null $email
 * @property Carbon $date_birth
 * @property string|null $allergies
 * @property string|null $disabillity
 * @property string $shirt_size
 * @property string|null $comments
 * @property int $member
 * @property string $gender
 * @property string $terms
 * @property int $idWard
 *
 * @package App\Models
 */
class Competitor extends Model
{
	protected $table = 'competitor';
	protected $primaryKey = 'idCompetitor';
	public $timestamps = false;

	protected $casts = [
		'dni' => 'int',
		'phone' => 'int',
		'date_birth' => 'datetime',
		'member' => 'int',
		'idWard' => 'int'
	];

	protected $fillable = [
		'dni',
		'name',
		'last_name',
		'phone',
		'email',
		'date_birth',
		'allergies',
		'disabillity',
		'shirt_size',
		'comments',
		'member',
		'gender',
		'terms',
		'idWard'
	];
}
