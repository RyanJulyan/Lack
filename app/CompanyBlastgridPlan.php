<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class CompanyBlastgridPlan extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id', 
        'plan_mine',
        'plan_location',
        'plan_mine_loc_name',
        'plan_width',
        'plan_height',
        'plan_profile',
        'plan_rock_type',
        'plan_rock_density',
        'plan_rock_hardness',
        'plan_hole_diameter',
        'plan_hole_depth',
        'plan_rows',
        'plan_columns',
        'plan_v_spacing',
        'plan_b_burden',
        'plan_perimeter_offset',
        'plan_cutface_type',
        'plan_explosive_type',
        'plan_hole_mass',
        'plan_fill_perc',
        'plan_detonator_series',
        'plan_total_holes',
        'plan_charged_holes',
        'plan_uncharged_holes',
        'plan_total_mass_explosives',
        'plan_powder_factor',
        'plan_cubes_of_the_round',
        'plan_tonnes_of_rock',
        'plan_total_explosive_cost',
        'plan_total_detonator_cost',
        'plan_total_accessories_cost',
        'plan_total_cost',
        'plan_cost_m',
        'plan_cost_m3',
        'plan_cost_tons',
        'plan_face_json',
        'plan_cutface_json',
        'plan_blastpack_json',
        'plan_report_json',
        'plan_accessories_json',
		'created_User_id',
		'updated_By_User_id',
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
