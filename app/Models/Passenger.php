<?php

namespace Carpooler\Models;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model {
	protected $table = "passengers";

	// Relationships
	public function departDriver(){
		return $this->belongsTo(Driver::class, "depart_driver_id");
	}

	public function returnDriver(){
		return $this->belongsTo(Driver::class, "return_driver_id");
	}

	// Access Shortcuts
	public function getAllDriversAttribute(){
		$drivers = collect([]);
		if($this->departDriver){
			$drivers->push($this->departDriver);
		}

		if($this->returnDriver && $this->depart_driver_id != $this->return_driver_id){
			$drivers->push($this->departDriver);
		}

		return $drivers;
	}

	public function getAllAcceptedDriversAttribute(){
		$drivers = collect([]);
		if($this->departDriver && ($this->depart_driver_status == "accepted" || $this->depart_driver_status == "accepted_pickup")){
			$drivers->push($this->departDriver);
		}

		if($this->returnDriver && $this->depart_driver_id != $this->return_driver_id && ($this->return_driver_status == "accepted" || $this->return_driver_status == "accepted_dropoff")){
			$drivers->push($this->departDriver);
		}

		return $drivers;
	}

	public function getAcceptedDepartDriverAttribute(){
		if($this->departDriver && ($this->depart_driver_status == "accepted" || $this->depart_driver_status == "accepted_pickup")){
			return $this->departDriver;
		}

		return null;
	}

	public function getAcceptedReturnDriverAttribute(){
		if($this->returnDriver && ($this->return_driver_status == "accepted" || $this->return_driver_status == "accepted_dropoff")){
			return $this->departDriver;
		}

		return null;
	}
}