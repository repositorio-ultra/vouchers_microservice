<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'recipient_id', 'offer_id', 'used'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}