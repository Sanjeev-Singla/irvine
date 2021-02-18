<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferTenant extends Model
{
    use HasFactory;

    protected $table = 'refer_tenants';

    protected $fillable = [
        'units_id',
        'owner_id',
        'tenant_email',
        'status'
    ];

    public function users(){
        return $this->belongsTo(User::class,'owner_id');
    }

    public function units(){
        return $this->belongsTo(Unit::class,'units_id');
    }
}
