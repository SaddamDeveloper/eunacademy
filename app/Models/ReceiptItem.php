<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReceiptItem extends Model
{
    protected $table = 'receipt_items';
    protected $fillable = ['receipt_id', 'name', 'qty', 'price', 'total'];

    /**
     * Get the user that owns the ReceiptItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function receipt()
    {
        return $this->belongsTo(Receipt::class, 'receipt_id', 'id');
    }
}
