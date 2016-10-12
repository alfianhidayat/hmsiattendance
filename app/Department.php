<?php namespace App;
use Illuminate\Database\Eloquent\Model;
class Department extends Model {
    protected $table = 'tb_department';
    protected $fillable = [
        'dept_id',
        'name',
        'total_staff',
        'coord_id',
    ];

    public function cord(){
      return $this->hasOne('App\Staff', 'coord_id');
    }

}
