<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubIssue extends Model
{
    protected $table = 'sub_issue';
    public $timestamps = false;

    public function project() {
        return $this -> hasMany( 'UserEnquries', 'id' );
    }

}
