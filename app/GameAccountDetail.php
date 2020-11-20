<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameAccountDetail extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'game_account_details';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    public function user() {
        return $this->belongsTo(User::class);
    }
}
