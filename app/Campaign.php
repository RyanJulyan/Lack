<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Campaign extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'campaign_name',
        'campaign_description',
        'ideal_client',
        'achieve',
        'methodology',
        'start_date_time',
        'end_date_time',
        'total_budget_cents',
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
