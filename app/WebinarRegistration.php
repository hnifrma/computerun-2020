<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebinarRegistration extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'webinar_registrations';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function event() {
        return $this->belongsTo(Event::class);
    }

    public function attendances() {
        return $this->hasMany(Attendance::class);
    }
}
