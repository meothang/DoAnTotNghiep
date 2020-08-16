<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Order extends Model
{
	protected $table = 'orders';
	protected $guarded =[''];
	const STATIC_DONE = 1;
	const STATIC_DEFAULT = 0;
	const STATIC_CANCEL = 1;
	public function user(){
		return $this->belongsTo('App\Models\User','user_id', 'id');
	}
}
