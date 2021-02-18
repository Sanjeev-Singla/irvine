<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $table = 'units';

    protected $fillable = [
        'rent',
        'users_id',
        'unit_type',
        'address',
        'unit_number',
        'bedroom',
        'bathroom',
        'washer_dryer',
        'ac',
        'heating',
        'appliances',
        'parking_spot',
        'square_footage',
        'year_built',
        'year_remodeled',
        'upload_image',
        'status'
    ];

    public function users(){
        return $this->belongsTo(User::class,'users_id');
    }

    public function getUploadImageAttribute($value){
        if(empty($value)){
            return '';
        } else {
             return url('public/uploads/images/units').'/'.$value;
        }
    }
}
