<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Accounts;
use App\User;
use App\Transactions;

class TransactionsController extends Controller
{

    //deposito
    public function deposit(Request $request)
    {
        $json = json_decode($request->json()->all());
        $account = new Accounts;
        $transactions = new Transactions;
        $acc = $account->getAccount($json->accountNumber);

        if($acc == null) {

            return response()->json([
                'message'   => 'Conta não encontrada',
            ], 500);
        }

        $bool = $transactions->depositValue($json->value, $json->type);

        if($bool == true){
            return response()->json([
                'message'   => 'Efetuado deposito de '.$json->value.'!'
            ], 200);
        }
        else return response()->json([
            'message' => 'Valor inconsistente!'
        ],500);

    }

    //saque
    public function withdraw(Request $request)
    {
        $json = json_decode($request->json()->all());
        $account = new Accounts();
        $transactions = new Transactions;
        $acc = $account->getAccount($json->accountNumber);
        if($acc == null) {

            return response()->json([
                'message'   => 'Conta não encontrada',
            ], 500);
        }else if($json->value <= 2) return response()->json(['message' => 'Valor deve ser superior a R$ 2,00'], 500);
        $bool = $transactions->withdrawValue($json->value, $json->type);

        if ($bool == true){
            return response()->json(['message' => 'Efetuado saque de '.$json->value.' '], 200);
        }  
        else{
            
            return response()->json(['message' => 'Valor solicitado indisponivel'], 500);
        }
        
    }

}
