<?php namespace App;
use Illuminate\Database\Eloquent\Model;
class Presences extends Model {
    protected $table = 'tb_presences';
    protected $fillable = [
        'staff_id',
        'total_alfa',
        'total_izin',
        'total_hadir',
        'total_denda',
        'explanation'
    ];

    public function staff(){
      return $this->hasOne('App\Staff', 'staff_id');
    }

}
