<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    //Table Name
    protected $table = 'applicants';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;
    //create relationship
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
