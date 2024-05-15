<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenantMailSettings extends Model
{
    use HasFactory;

    protected $fillable = [
        'tenant_id',
        'mail_driver',
        'mail_host',
        'mail_port',
        'mail_username',
        'mail_password',
        'mail_encryption',
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
