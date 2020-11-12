<?php

namespace App\BusinessLogic;

use App\Accounts;
use App\Transactions;

class TransactionsBusinessLogic
{

    //deposito
    public function depositValue($value,$accountNumber){

        $transactions = new Transactions;
        $conta        = Accounts::select()->where('account_number', $accountNumber)->first();
        

        if ($value <= 0) {
            return false;
        } else {

            $transactions->value = $value;
            $transactions->type = "DEPOSIT";

            $conta->balance = $value + $conta->balance;
            $conta->save();
            $conta->transactions()->saveMany([$transactions]);
            return true;
        }

    }

    //saque
    public function withdrawValue($valor, $accountNumber){

        $transactions = new Transactions;
        $conta        = Accounts::select()->where('account_number', $accountNumber)->first();
        
        if ($valor > $conta->balance || $valor <= 0) {

            return false;

        } else {
            $transactions->value = $valor;
            $transactions->type = "WITHDRAW";
            
            $conta->balance = $conta->balance - $valor;
            $conta->save();
            $conta->transactions()->saveMany([$transactions]);
            return true;
        }

    }

    //saldo
    public function balance($accountNumber){
    
        $conta = Accounts::where('account_number', $accountNumber)->first();
        if (empty($conta)){
            return null;
        }
        else return $conta;


    }

}