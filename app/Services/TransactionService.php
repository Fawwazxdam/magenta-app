<?php

namespace App\Services;

use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TransactionService
{
    public function getTransactions(array $params = [])
    {
        $query = Transaction::with('items', 'user', 'customer', 'employee');

        if (!empty($params['status'])) {
            $query->where('status', $params['status']);
        }

        if (!empty($params['user_id'])) {
            $query->where('user_id', $params['user_id']);
        }

        if (!empty($params['customer_id'])) {
            $query->where('customer_id', $params['customer_id']);
        }

        if (!empty($params['employee_id'])) {
            $query->where('employee_id', $params['employee_id']);
        }

        $transactions = $query->get();

        return $transactions;
    }

    public function getTransaction(string $ID)
    {
        return Transaction::with('items', 'user', 'customer', 'employee')->find($ID);
    }

    public function getTransactionByUuid(string $uuid)
    {
        return Transaction::with('items', 'user', 'customer', 'employee')->where('uuid', $uuid)->first();
    }

    public function createTransaction(array $data)
    {
        return Transaction::create($data);
    }

    public function updateTransaction(array $data, string $ID)
    {
        return Transaction::where('id', $ID)->update($data);
    }

    public function deleteTransaction(string $ID)
    {
        return Transaction::find($ID)->delete();
    }
}
