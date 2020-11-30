<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    public function Posts(){
    	return $this->belongsTo('App\Posts', 'title');
    }}
