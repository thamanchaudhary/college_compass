<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Http\Request;
use App\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\ResetPassword as NotificationsResetPassword;
use Illuminate\Http\Exceptions\HttpResponseException;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function getData()
    {
        return $this->orderBy('id', 'DESC')->paginate(10);
    }
    // get User Intrested Program
    public function IntrestedProgram()
    {
        return $this->belongsTo('App\Models\Program', 'program_id', 'id');
    }
    // get User Intrested Location
    public function IntrestedLocation()
    {
        return $this->belongsTo('App\Models\Location', 'location_id', 'id');
    }
     //COllege Location
     public function collegeLocation()
     {
         return $this->belongsTo(Location::class, 'location_id');
     }
   
    public function storeData(Request $request, $name, $username, $email, $mobile, $password, $avatar, $role)
    {
        //dd($name, $username, $email, $mobile, $password, $avatar );
        try {
            $data =                        new User;
            $data->name                    = $name;
            $data->username                = $username;
            $data->email                   = $email;
            $data->password                = bcrypt($password);
            // $data->role                    = $role;
            $data->status                  = 1;
            // if ($request->hasFile('avatar')) {
            //     $data->image = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'image', '', '');
            // }
            $check         =                   $data->save();
            return $check;
        } catch (HttpResponseException $e) {
            return $e->getResponse();
        }
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'last_login_at', 'last_login_ip','program_id', 'location_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new NotificationsResetPassword($token));
    }
}
