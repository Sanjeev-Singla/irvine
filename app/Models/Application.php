<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Application extends Model
{
    use HasFactory;

    protected $table = 'applications';

    protected $fillable = [
        'refer_tenant_id',
        'email',
        'auth_signature',
        'application_status',
    ];

    public function applicationTenants(){
        return $this->hasOne(ApplicationTenant::class,'application_id');
    }

    public function referTenants(){
        return $this->belongsTo(ReferTenant::class,'refer_tenant_id');
    }
}
