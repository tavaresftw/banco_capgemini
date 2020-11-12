<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use app\User;

class Transactions extends Model
{

    protected $fillable = [ 'balance' ];
    protected $hidden = [ 'created_at', 'updated_at' ];

    public function user()
    {

        return $this->belongsTo('App\User');
    }

    public function accounts()
    {

        return $this->belongsTo(Accounts::class);

    }


}
