<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use \App\Transactions;

class Accounts extends Model
{
    
    public function getAccount($accountNumber)
    {

        $conta = $this->select()->where('account_number', $accountNumber)->get();
        if (empty($contas)){
            return null;
        }
        else return $conta;
    }


}
