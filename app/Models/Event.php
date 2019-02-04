<?php

namespace Carpooler\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model {

	use SoftDeletes;

	protected $table = "events";

	public function drivers(){
		return $this->hasMany(Driver::class);
	}

	public function passengers(){
		return $this->hasMany(Passenger::class);
	}

	// Passengers that have a Driver associated. Filterable by driver_depart_status and driver_return_status
	public function assignedPassengers(){
		return $this->hasManyThrough(Passenger::class, Driver::class);
	}

	public function createdByUser(){
		return $this->belongsTo(User::class, "created_by");
	}

	public function updatedByUser(){
		return $this->belongsTo(User::class, "updated_by");
	}

	public function deletedByUser(){
		return $this->belongsTo(User::class, "deleted_by");
	}
}