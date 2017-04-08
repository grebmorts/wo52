<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{

  protected $dateFormat = 'Y-m-d H:i:s.u';

 protected $guarded = [];

}
