<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Accounts;
use App\User;
use App\BusinessLogic\TransactionsBusinessLogic;

class TransactionsController extends Controller
{

    //deposito
    public function deposit($accountNumber, Request $request)
    {

        $transactions = new TransactionsBusinessLogic;
        $acc = $transactions->balance($accountNumber);


        if($acc == null) {

            return response()->json([
                'message'   => 'Conta não encontrada',
            ], 500);
        }

        $bool = $transactions->depositValue($request->value,$accountNumber);

        if($bool == true){
            return response()->json([
                'message'   => 'Efetuado deposito de '.$request->value.'!'
            ], 200);
        }
        else return response()->json([
            'message' => 'Valor inconsistente!'
        ],500);

    }

    //saque
    public function withdraw($accountNumber, Request $request)
    {
        $transactions = new TransactionsBusinessLogic;
        $acc = $transactions->balance($accountNumber);
        if($acc == null) {

            return response()->json([
                'message'   => 'Conta não encontrada',
            ], 500);
        }
        $bool = $transactions->withdrawValue($request->value,$accountNumber);

        if ($bool == true){
            return response()->json(['message' => 'Efetuado saque de '.$request->value.' '], 200);
        }  
        else{
            
            return response()->json(['message' => 'Valor solicitado indisponivel'], 500);
        }
        
    }

}
