<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'teams';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    public function teamDetails() {
        return $this->hasMany(TeamDetail::class);
    }

    public function competitionRegistrations() {
        return $this->hasMany(CompetitionRegistration::class);
    }
}
