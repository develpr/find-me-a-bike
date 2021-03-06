<?php  namespace Biker\Domain\Divvy;


use Biker\Contracts\Station;
use Biker\Device;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EloquentStation
 * @package Biker\Domain\Divvy
 *
 * @var int availableBikes
 * @var int availableDocks
 * @var int totalDocks
 */
class EloquentStation extends Model implements Station {

	protected $table = "divvy_stations";

	public function availableBikes(){
		return intval($this->available_bikes);
	}

	public function availableDocks(){
		return intval($this->available_docks);
	}

	public function totalDocks(){
		return intval($this->total_docks);
	}

	public function getSpokenName()
	{
		return $this->station_name;
	}

	public function scopeActive($query){
		return $query->where('test_station', false);
	}

	public function device(){
		return $this->hasMany(Device::class);
	}

	public function getFullSpokenStatus(){
		return "The " . $this->getSpokenName() . " station has " . $this->availableBikes() . " bikes available and " . $this->availableDocks() . " open docks.";
	}

} 