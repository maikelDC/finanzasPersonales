<?php

namespace App\Observers;

use App\Models\Budget;
use App\Models\Transaction;

class TransactionObserver
{
    /**
     * Handle the Transaction "created" event.
     */
    public function created(Transaction $transaction): void
    {
        $budget = Budget::where('user_id', $transaction->user_id)
            ->where('category_id', $transaction->category_id)
            ->first();
        if ($budget && $transaction->amount > 0 && $transaction->category->type === 'egreso') {
            $budget->amount_spent += $transaction->amount;
            $budget->save();
        }
    }

    /**
     * Handle the Transaction "updated" event.
     */
    public function updated(Transaction $transaction): void
    {
        // Obtener los valores originales antes del update
        $originalAmount = $transaction->getOriginal('amount');
        $originalCategoryId = $transaction->getOriginal('category_id');

        // Si la categoria o el monto cambian, actualizar ambos presupuestos
        if ($transaction->category_id !== $originalCategoryId) {
            // Revertir en el presupuesto anterior
            $oldBudget = Budget::where('user_id', $transaction->user_id)
                ->where('category_id', $originalCategoryId)
                ->first();
            if ($oldBudget && $transaction->category->type === 'egreso') {
                $oldBudget->amount_spent -= $originalAmount;
                $oldBudget->save();
            }
            // Sumar en el nuevo presupuesto
            $newBudget = Budget::where('user_id', $transaction->user_id)
                ->where('category_id', $transaction->category_id)
                ->first();
            if ($newBudget && $transaction->amount > 0 && $transaction->category->type === 'egreso') {
                $newBudget->amount_spent += $transaction->amount;
                $newBudget->save();
            }
        } else {
            // Si solo cambia el monto
            $budget = Budget::where('user_id', $transaction->user_id)
                ->where('category_id', $transaction->category_id)
                ->first();
            if ($budget && $transaction->category->type === 'egreso') {
                $diferencia = $transaction->amount - $originalAmount;
                $budget->amount_spent += $diferencia;
                $budget->save();
            }
        }
    }

    /**
     * Handle the Transaction "deleted" event.
     */
    public function deleted(Transaction $transaction): void
    {
        $budget = Budget::where('user_id', $transaction->user_id)
            ->where('category_id', $transaction->category_id)
            ->first();
        if ($budget && $transaction->amount > 0 && $transaction->category->type === 'egreso') {
            $budget->amount_spent -= $transaction->amount;
            $budget->save();
        }
    }

    /**
     * Handle the Transaction "restored" event.
     */
    public function restored(Transaction $transaction): void
    {
        //
    }

    /**
     * Handle the Transaction "force deleted" event.
     */
    public function forceDeleted(Transaction $transaction): void
    {
        //
    }
}
