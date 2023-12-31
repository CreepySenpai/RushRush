<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'Invoices';
    protected $primaryKey = 'invoice_id';
    protected $keyType = 'string';
    public $incrementing = false;

    // Can access all data
    protected $guarded = [];
}
