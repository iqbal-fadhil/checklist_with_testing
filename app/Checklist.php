<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

Class Checklist extends Model 

{
protected $fillable = ['type', 'id', 'object_domain', 'object_id', 'description', 'is_completed'];

}