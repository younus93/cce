<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataIn extends Model
{
    /**
     * Table for the model
     * @var string
     */
    protected $table = 'data_in';

    /**
     * Mass assignable fields
     * @var array
     */
    protected $fillable = [
        'who',
        'DateTime'
    ];

    public $timestamps = false;
}
