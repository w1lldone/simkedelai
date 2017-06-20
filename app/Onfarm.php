<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Onfarm extends Model
{
    protected $guarded = ['id'];
    protected $dates = ['updated_at', 'planted_at'];

    /*
	* RELATIONS SECTION
    */
    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function seed(){
        return $this->hasOne('App\Seed');
    }

    public function activity(){
        return $this->hasMany('App\Activity');
    }

    /*
	* CUSTOM METHOD SECTION
    */
    public static function  addOnfarm($request)
    {
    	$request->user_id = $request->has('input_user') ? $request->input_user : $request->auth_user;
    	return static::create([
    		'name' => $request->name,
    		'user_id' => $request->user_id,
    		'description' => $request->description,
		]);
    }

    public function addActivity()
    {
        return $this->activity()->create([
            'name' => request('name'),
            'description' => request('description'),
            'date' => request()->has('date') ? request('date') : request('planted_at'),
        ]);
    }
}
