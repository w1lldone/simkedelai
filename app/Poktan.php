<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poktan extends Model
{
    protected $guarded = ['id'];

    /*
	* RELATIONS SECTION
    */
	public function user()
	{
		return $this->hasMany('App\User');
	}

	public function leader(){
		return $this->belongsTo('App\User', 'leader_user_id', 'id');
	}

	public function supplier(){
		return $this->hasMany('App\Supplier');
	}

	public function onfarm(){
		return $this->hasManyThrough('App\Onfarm', 'App\User');
	}

	public function transaction(){
		return $this->hasMany('App\Transaction');
	}

	public function postharvest(){
		return $this->hasMany('App\Postharvest');
	}

	/*CUSTOM METHOD SECTION*/

	public static function addPoktan($request)
	{
		return static::create([
			'name' => $request->name,
			'address' => $request->address,
			'leader_user_id' => $request->leader_user_id,
		]);
	}

	/*CUSTOM ATTRIBUTE SECTION*/
	
	public function getActiveStockAttribute(){
		return $this->onfarm()->whereHas('harvest', function ($query)
		{
			$query->where('ending_stock', '<>', 0)->where('on_sale', 1);
		})->get()->load('harvest')->pluck('harvest')->sum('ending_stock');
	}
		
}
