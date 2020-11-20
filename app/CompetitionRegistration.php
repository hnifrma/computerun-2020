<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompetitionRegistration extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'competition_registrations';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    public function team() {
        return $this->belongsTo(Team::class);
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function event() {
        return $this->belongsTo(Event::class);
    }

    public function payment() {
        return $this->hasOne(Payment::class);
    }

    public function files() {
        return $this->hasMany(File::class);
    }
}
