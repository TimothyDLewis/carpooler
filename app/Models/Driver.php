<?php

namespace Carpooler\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model {
	protected $table = "drivers";

	// Relationships
	public function departPassengers(){
		return $this->hasMany(Passenger::class, "depart_driver_id");
	}

	public function returnPassengers(){
		return $this->hasMany(Passenger::class, "return_driver_id");
	}

	// Access Shortcuts
	public function getAllPassengersAttribute(){
		return $this->departPassengers->merge($this->returnPassengers);
	}

	public function getAllAcceptedPassengersAttribute(){
		return $this->acceptedDepartPassengers->merge($this->acceptedReturnPassengers);
	}

	public function getAcceptedDepartPassengersAttribute(){
		return $this->departPassengers->filter(function($passenger){
			return $passenger->depart_driver_status == "accepted" || $passenger->depart_driver_status == "accepted_pickup";
		});
	}

	public function getAcceptedReturnPassengersAttribute(){
		return $this->returnPassengers->filter(function($passenger){
			return $passenger->return_driver_status == "accepted" || $passenger->return_driver_status == "accepted_dropoff";
		});
	}
}