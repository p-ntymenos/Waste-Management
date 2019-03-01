<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonadesModel extends Model
{
    //
    
    public $timestamps = false;
    
    protected $table = 'ga_proc_units';

    /**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
    protected $fillable = ['kafsis_code', 'name', 'proc_type', 'Cat1' , 'Cat2', 'Cat3', 'Laspi', 'Fytika'];


}
