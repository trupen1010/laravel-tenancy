<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SetConfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        \Stancl\Tenancy\Features\TenantConfig::$storageToConfigMap = [
            'mail_host' => 'mail.mailers.dynamic_smtp.host',
            'mail_port' => 'mail.mailers.dynamic_smtp.port',
            'mail_encryption' => 'mail.mailers.dynamic_smtp.encryption',
            'mail_username' => 'mail.mailers.dynamic_smtp.username',
            'mail_password' => 'mail.mailers.dynamic_smtp.password',
            'mail_from_address' => 'mail.from.address',
            'mail_from_name' => 'mail.from.name',
        ];
    }
}
