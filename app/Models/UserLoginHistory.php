<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class UserLoginHistory extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'user_login_history';

    protected $fillable = ['user_id','login_at','logout_at','login_ip','session_id'];

    public function setLogInLog(){
        $this->insert(
            [
            'user_id' => Auth::user()->id,
            'login_at' =>Carbon::now(),
            'login_ip'=>request()->getClientIp(),
            'session_id'=>request()->session()->getId()
            ]);  

            $user = User::where('id',Auth::user()->id)->first();
            $user->update([
                'last_session' => request()->session()->getId()
            ]);
    }

    public function setLogOutLog(){
        $session_id = Auth::User()->last_session;
        $userHistory = UserLoginHistory::where('session_id', $session_id)
            -> update([
                'logout_at' => Carbon::now()
            ]);
    }
    
    
}
