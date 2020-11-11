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

    public function transactions()
    {

        return $this->hasMany(Transactions::class);
    }
    
    public function depositValue($valor, $tipo)
    {
        $transactions = new Transactions;
        
        if ($valor <= 0) {
            return false;
        } else {

            $transactions->value = $valor;
            $transactions->type = $tipo;
            
            $this->balance = $valor + $this->balance;
            $this->save();
            $this->transactions()->saveMany([$transactions]);
            return true;
        }
    }

    public function withdrawValue($valor, $tipo)
    {

        $transactions = new Transactions;

        if ($valor > $this->balance) {

            return false;
        } else if ($valor <= 2) {

            return false;

        } else {
            $transactions->value = $valor;
            $transactions->type = $tipo;
            
            $this->balance = $valor + $this->balance;
            $this->save();
            $this->transactions()->saveMany([$transactions]);
            return true;
        }
    }


}
