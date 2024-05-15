<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantDataController extends Controller
{

    public function index()
    {
        return view('index');
    }

    public function store(Request $request)
    {
        $tenant = $this->createTenant($request->all());
    }

    private function createTenant(array $data)
    {
        $tenant = Tenant::create([
            'id' => $data['name'],
            'domain' => $data['domain'],
            'mail_host' => $data['mail_host'] ?? '',
            'mail_port' => $data['mail_port'] ?? '',
            'mail_username' => $data['mail_username'] ?? '',
            'mail_password' => $data['mail_password'] ?? '',
            'mail_encryption' => $data['mail_encryption'] ?? '',
            'mail_from_address' => $data['mail_from_address'] ?? '',
            'mail_from_name' => $data['mail_from_name'] ?? '',
            'tenancy_db_name' => 'tenancy_' . $data['name'],
            /* 'tenancy_db_username' => 'tenancy_db_user_' . $data['name'],
            'tenancy_db_password' => Hash::make($data['name'] ?? str()::random(16)), */
        ]);
        $this->createDomain($data['domain'], $tenant->id);
        return $tenant;
    }

    public function edit(){
        $tenant = Tenant::find('suresh');
        return view('update', compact('tenant'));
    }

    public function update(Request $request, $id)
    {
        $this->updateTenant($request->all(), $id);
        $this->createDomain($request->domain, $id);
    }

    private function updateTenant(array $data, $id)
    {
        $tenant = Tenant::find($id);
        $tenant->update([
            'domain' => $data['domain'],
            'mail_host' => $data['mail_host'],
            'mail_port' => $data['mail_port'],
            'mail_username' => $data['mail_username'],
            'mail_password' => $data['mail_password'],
            'mail_encryption' => $data['mail_encryption'],
            'mail_from_address' => $data['mail_from_address'],
            'mail_from_name' => $data['mail_from_name'],
            /* 'tenancy_db_username' => 'tenancy_db_user_' . $data['name'],
            'tenancy_db_password' => Hash::make($data['name'] ?? str()::random(16)), */
        ]);
        return $tenant;
    }

    private function createDomain($domain, $tenantId)
    {
        $tenant = Tenant::find($tenantId);
        $tenant->domains()->create([
            'domain' => $domain,
            'tenant_id' => $tenantId
        ]);
    }
}

