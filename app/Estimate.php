<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estimate extends Model
{
    protected $fillable = ['ref', 'client_id', 'line_items', 'expense_items', 'issue_date', 'notes', 'payment_terms'];
    protected $casts = [
        'line_items'    =>  'array',
        'expense_items' =>  'array'
    ];

    public function client()
    {
        return $this->belongsTo('App\Client');
    }
}
