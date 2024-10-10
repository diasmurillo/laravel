<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Http\Requests\StoreTransactionRequest;

class TransactionController extends Controller
{
    //
    public function index(){
        $transactions = Transaction::all();

        return response()->json([
            "transactions"=>$transactions
        ]);
    }

    //função responsavel por criar uma nova transaction

    public function store(StoreTransactionRequest $request) {
        $transaction = new Transaction();


        //mapeamento da informação recebida pelo request com as propriedades da classa
        $transaction->description = $request->description;
        $transaction->amount = $request->amount;
        $transaction->category = $request->category;
        $transaction->type = $request->type;

        $transaction->save();

        return response()->json([
            "transaction" => $transaction
        ]);
    }

    //Vai mostrar uma transaction especifica
    public function show($id){

        //primeiro parametro do metodo where, é o nome do campo na base de dados
        $transaction = Transaction::where('id', $id)->first();

        //caso a transactions não seja encontrada
        if(!$transaction){
            return response()->json([
                "error" => "Transaction nout found"
            ],404);
        }

        return response()->json([
            "transaction" => $transaction
        ]);
    }

    public function destroy($id){

        $transaction = Transaction::where('id', $id)->first();

        if(!$transaction){
            return response()->json([
                "error" => "Transaction does not exists"
            ],404);
        }

        $transaction->delete();

        return response()->json([
            "message" => "Transaction has been deleted"
        ]);
    }

}
