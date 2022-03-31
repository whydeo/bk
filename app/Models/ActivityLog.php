<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;
class ActivityLog extends Model
{
    use LogsActivity;
    protected $table ='activity_log';
    public function user(){
        return $this->belongsTo(user::class,'causer_id');
    }
}
