<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Jobs\SendMail;
use App\Models\TenantMailSettings;
use Illuminate\Http\Request;

class MailConfigController extends Controller
{
    public function index()
    {
        $tenantMailSetting = TenantMailSettings::on('central')->where('tenant_id', tenant('id'))->first();
        
        return view('tenant.mail-setting.index', compact('tenantMailSetting'));
    }

    public function create()
    {
        return view('tenant.mail-setting.create');
    }

    public function store(Request $request)
    {
        $tenantMailSetting = new TenantMailSettings([
            'tenant_id' => tenant('id'),
            'mail_mailer' => $request->mail_mailer,
            'mail_host' => $request->mail_host,
            'mail_port' => $request->mail_port,
            'mail_username' => $request->mail_username,
            'mail_password' => $request->mail_password,
            'mail_encryption' => $request->mail_encryption,
            'mail_from_address' => $request->mail_from_address,
            'mail_from_name' => $request->mail_from_name,
        ]);

        $tenantMailSetting->setConnection('central');
        $tenantMailSetting->save();

        return redirect()->route('tenant.mail-setting.index');
    }
    
    public function edit($id)
    {
        $tenantMailSetting = TenantMailSettings::on('central')->find($id);
        return view('tenant.mail-setting.edit', compact('tenantMailSetting'));
    }

    public function update(Request $request, $id)
    {
        $mailSettings = TenantMailSettings::on('central')->find($id);

        $mailSettings->fill([
            'mail_mailer' => $request->mail_mailer,
            'mail_host' => $request->mail_host,
            'mail_port' => $request->mail_port,
            'mail_username' => $request->mail_username,
            'mail_password' => $request->mail_password,
            'mail_encryption' => $request->mail_encryption,
            'mail_from_address' => $request->mail_from_address,
            'mail_from_name' => $request->mail_from_name,
        ])->save();

        return redirect()->route('tenant.mail-setting.index');
    }
    
    public function delete($id)
    {
        $mailSettings = TenantMailSettings::on('central')->findOrFail($id);
        $mailSettings->delete();
        return redirect()->route('tenant.mail-setting.index');
    }

    public function testMail()
    {
        SendMail::dispatch(tenant('id'));
    }
}
