<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buying extends Model
{


	protected $fillable = [
		'customer_name', 'email', 'product_id',
	];

}
