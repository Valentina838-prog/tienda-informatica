<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Genera la llave de la aplicación si el archivo .env no tiene una
        $envPath = base_path('.env');

        if (empty(config('app.key')) && file_exists($envPath)) {
            $key = 'base64:' . base64_encode(random_bytes(32));
            $contenido = file_get_contents($envPath);
            file_put_contents($envPath, preg_replace('/^APP_KEY=.*$/m', 'APP_KEY=' . $key, $contenido));
            config(['app.key' => $key]);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
