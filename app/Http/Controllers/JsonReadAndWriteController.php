<?php

namespace App\Http\Controllers;

use DateTime;
use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JsonReadAndWriteController
{
    public function __invoke(Request $request)
    {
        DB::beginTransaction();

        try {
            $users_json = file_get_contents(app_path('Jsons/users.json'));
            $users_data = json_decode($users_json);

            foreach ($users_data->users as $item) {
                User::create([
                    'id' => $item->id,
                    'balance' => $item->balance,
                    'currency' => $item->currency,
                    'email' => $item->email,
                    'created_at' => DateTime::createFromFormat('d/m/Y', $item->created_at),
                ]);
            }

            $transaction_json = file_get_contents(app_path('Jsons/transactions.json'));
            $transactions_data = json_decode($transaction_json);

            foreach ($transactions_data->transactions as $item) {
                Transaction::create([
                    'id' => Str::uuid(),
                    'paid_amount' => $item->paidAmount,
                    'parent_email' => $item->parentEmail,
                    'status_code' => $item->statusCode,
                    'currency' => $item->Currency,
                    'payment_date' => Carbon::parse($item->paymentDate)->format('Y-m-d'),
                    'parent_identification' => $item->parentIdentification,
                ]);
            }

            DB::commit();
            return response()->json();
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json($e->getMessage());
        }
    }
}
