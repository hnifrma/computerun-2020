<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'statuses';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    public function competitionRegistrations() {
        return $this->hasMany(CompetitionRegistration::class);
    }

    public function webinarRegistrations() {
        return $this->hasMany(WebinarRegistration::class);
    }
}
