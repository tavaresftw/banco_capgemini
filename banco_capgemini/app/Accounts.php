<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    
    public function transactions()
    {

        return $this->hasMany(Transactions::class,'account_id','id');
        
    }

    public function user(){

        return $this->belongsTo(User::class);

    }
}
