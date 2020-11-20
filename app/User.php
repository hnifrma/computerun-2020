<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'line', 'whatsapp', 'university_id', 'new_university', 'nim', 'id_mobile_legends', 'id_pubg_mobile', 'id_valorant'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function gameAccountDetail() {
        return $this->hasOne(GameAccountDetail::class);
    }

    public function university() {
        return $this->belongsTo(University::class);
    }

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function teamDetails() {
        return $this->hasMany(TeamDetail::class);
    }

    public function webinarRegistrations() {
        return $this->hasMany(WebinarRegistration::class);
    }
}
