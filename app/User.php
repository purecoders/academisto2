<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $fillable = [
        'name', 'email', 'password','phone_number'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];






    public function ads(){
      return $this->hasMany('App\Ad');
    }

    public function projects(){
      return $this->hasMany('App\Project');
    }

    public function rates(){
      return $this->hasMany('App\Rate','user_id_to');
    }

    public function projectRequests(){
      return $this->hasMany('App\ProjectRequest');
    }

    public function tickets(){
      return $this->hasMany('App\Ticket');
    }

    public function roles(){
      return $this->belongsToMany('App\Role');
    }

    public function cv(){
      return $this->hasOne('App\Cv');
    }

    public function payments(){
      return $this->hasMany('App\Payment');
    }

    public function sent_reports(){
      return $this->hasMany('App\Report','user_id_from');
    }

    public function received_reports(){
      return $this->hasMany('App\Report','user_id_to');
    }

    public function fullInfo(){
      return $this->hasOne('App\UserFullInformation');
    }

    public function sitePays(){
      return $this->hasMany('App\SitePay');
    }




}
