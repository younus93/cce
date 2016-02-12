<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainIssue extends Model
{
    protected $table = 'main_issue';
    public $timestamps = false;
    public function models(){
        return $this->has_many('SubIssue');
    }
}
