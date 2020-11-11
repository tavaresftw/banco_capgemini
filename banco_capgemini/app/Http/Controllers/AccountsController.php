<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Transactions;
use app\Accounts;

class AccountsController extends Controller
{
    
    public function getTransaction()
    {

        return Transactions::select()->where('account_id', 1)->get();

    }

    public function getAccountByNumber(Request $request)
    {
        $json = json_decode($request->json()->all());
        $account = new Accounts;
        $acc = $account->getAccount($json->accountNumber);
        
        if ($acc == null) {
            
            return response()->json(['message' => 'Conta não encontrada'], 500);
        }
        return response()->json($acc, 200);
    }

}
