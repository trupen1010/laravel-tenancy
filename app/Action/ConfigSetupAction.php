<?php

use App\Models\TenantMailSettings;

class ConfigSetupAction
{
    public function setSmtp($tenantId)
    {
        try {
            $tenantMailSettings = TenantMailSettings::on('central')->where('tenant_id', $tenantId)->first();
            config([
                'mail.mailers.dynamic_smtp.host' => $tenantMailSettings->mail_host,
                'mail.mailers.dynamic_smtp.port' => $tenantMailSettings->mail_port,
                'mail.mailers.dynamic_smtp.encryption' => $tenantMailSettings->mail_encryption,
                'mail.mailers.dynamic_smtp.username' => $tenantMailSettings->mail_username,
                'mail.mailers.dynamic_smtp.password' => $tenantMailSettings->mail_password,
            ]);    
        } catch (\Throwable $th) {
            report($th);
            throw $th;
        }
    }
}