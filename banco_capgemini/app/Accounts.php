<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    
    public function transactions()
    {

        return $this->hasMany(Transactions::class,'account_id','id');
        
    }
}
