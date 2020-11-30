<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    protected $table='news';
    protected $fillable=['user_id', 'category_id', 'title', 'description', 'short_description', 'image', 'add_date'];}
