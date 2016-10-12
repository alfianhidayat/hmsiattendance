<?php namespace App;
use Illuminate\Database\Eloquent\Model;
class Staff extends Model {
    protected $table = 'tb_staff';
    protected $fillable = [
        'id_staff',
        'fname',
        'lname',
        'job',
        'address',
        'phone_number',
        'email',
        'bday',
        'ttd',
        'dept_id',
    ];

    public function department(){
      return $this->belongsTo('App\Department', 'dept_id');
    }

    public function transmeeting(){
      return $this->hasOne('App\Staff','staff_id');
    }

}
