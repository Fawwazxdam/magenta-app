<?php

namespace App\Services;

use App\Models\TransactionItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TransactionItemService
{
    public function getTransactionItems(array $params = [])
    {
        //
    }

    public function getTransactionItem(string $ID)
    {
        return TransactionItem::find($ID);
    }

    public function getTransactionItemByTransactionId(string $transactionId)
    {
        return TransactionItem::where('transaction_id', $transactionId)->get();
    }

    public function createTransactionItem(array $data)
    {
        return TransactionItem::create($data);
    }

    public function updateTransactionItem(array $data, string $ID)
    {
        return TransactionItem::where('id', $ID)->update($data);
    }

    public function deleteTransactionItem(string $ID)
    {
        return TransactionItem::find($ID)->delete();
    }
}
