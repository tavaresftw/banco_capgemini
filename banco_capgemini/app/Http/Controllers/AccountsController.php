<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Transactions;
use App\BusinessLogic\TransactionsBusinessLogic;

class AccountsController extends Controller
{
    
    public function getTransaction()
    {

        return Transactions::select()->where('account_id', 1)->get();

    }

    public function getAccountByNumber($accountNumber,Request $request)
    {
        $transactions = new TransactionsBusinessLogic;
        $acc = $transactions->balance($accountNumber);
        
        if ($acc == null) {
            
            return response()->json(['message' => 'Conta não encontrada'], 500);
        }
        return response()->json($acc, 200);
    }

}
