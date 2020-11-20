<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'events';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    public function competitionRegistrations() {
        $this->hasMany(CompetitionRegistration::class);
    }

    public function webinarRegistrations() {
        $this->hasMany(WebinarRegistration::class);
    }
}
