<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserEnquries extends Model
{
    protected $table = 'user_enquries';
    public $timestamps = false;

    public function project() {
        return $this -> hasMany( 'SubIssue', 'id', 'user_id' );
    }

}
