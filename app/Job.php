<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = ['reference', 'title', 'type', 'description', 'employer', 'location', 'salary', 'post_date'];

}
