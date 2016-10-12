<?php namespace App;
use Illuminate\Database\Eloquent\Model;
class TransactionMeeting extends Model {
    protected $table = 'tb_trans_meeting';
    protected $fillable = [
        'meeting_id',
        'staff_id',
        'status_id',
    ];

    public function staff(){
      return $this->belongsTo('App\Staff');
    }

    public function meeting(){
      return $this->belongsTo('App\Meeting');
    }

    public function status(){
      return $this->hasOne('App\Status','status_id');
    }

}
