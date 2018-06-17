<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
  protected $table = 'contact';

  protected $fillable = ['name', 'phone_number', 'user_id', 'group_id'];

}
