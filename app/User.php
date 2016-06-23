<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Mail;


class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    protected $name = '';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    public function files()
    {
        return $this->hasMany('App\Files', 'user_id');
    }


    public function sendMail($req) {
        $this->name = $req['name'];
        try {
            Mail::send('/pdf/user-welcoming', ['nuser' => $req], function($message){
                $message->to('bouzanih.mounir@gmail.com', 'some Guy')->subject('Bienvenue dans l\'equipe ATS CENTER, '.$this->name);
            });
        }
        catch(Error $e) {
            abort('500');
        }
        return['status' => 'success'];
    }
}

