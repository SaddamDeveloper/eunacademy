<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $table = 'receipts';
    protected $fillable = ['money_receipt_no', 'branch_id', 'student_id', 'invoice_date', 'discount', 'sub_total', 'grand_total'];

    /**
     * Get all of the comments for the Receipt
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function receiptItem()
    {
        return $this->hasMany(ReceiptItem::class);
    }

    /**
     * Get the user that owns the Receipt
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    /**
     * Get the user that owns the Receipt
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }
}
