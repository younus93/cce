<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClosedEnquiry extends Model
{
    protected $table = 'enquiry_close';

    public $timestamps = false;
}
