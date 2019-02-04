<?php

namespace Carpooler\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model {

	use SoftDeletes;

	protected $table = "vehicles";
}