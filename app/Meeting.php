<?php namespace App;
use Illuminate\Database\Eloquent\Model;
class Meeting extends Model {
    protected $table = 'tb_meeting';
    protected $fillable = [
        'name',
        'total_staff',
        'explanation',
    ];

    public function transmeeting(){
      return $this->hasMany('App\TransactionMeeting','meeting_id');
    }

}
