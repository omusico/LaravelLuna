<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class lu_lotteries_result extends Model {

    protected $table ='lu_lotteries_results';

    protected $fillable =['proName','typeName','codes','created','tjData','source'];

	//

}
