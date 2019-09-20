<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class CompanyLicence extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        'licence_key',
        'licence_key_expiary_date',
        'licence_key_last_payment_date',
        'numberOfUsers',
		'created_user_id',
		'updated_by_user_id',
		'created_at',
		'updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
}