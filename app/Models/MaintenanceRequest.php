<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceRequest extends Model
{
    use HasFactory;

    protected $table = 'maintenance_requests';

    protected $fillable = [
        'issue',            
        'priority_level',
        'appartment_number',
        'issue_start_date',
        'cause',
        'contact_number',
        'available_time',
        'users_id',
        'status'
    ];

    public function getStatusAttribute($value){
        switch ($value) {
            case 0:
                return 'Pending';
                break;
            case 1:
                return 'Received';
                break;
            case 2:
                return 'Resolved';
                break;
            case 3:
                return 'Cancelled';
                break;
            
            default:
                return 'Pending';
                break;
        }
    }
}
