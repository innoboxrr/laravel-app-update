<?php

namespace Innoboxrr\LaravelAppUpdate\Console\Commands;

use Illuminate\Console\Command;

class UpdateAppCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update app';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Ejecutar git pull
        $this->executeCommand('git pull');
        
        // Actualizar dependencias de Composer
        $this->executeCommand('composer update');
        
        // Actualizar módulos de npm y compilar assets
        $this->executeCommand('npm install');
        $this->executeCommand('npm run build');
        
        // Ejecutar migraciones
        $this->executeCommand('php artisan migrate');
        
        // Limpiar y optimizar el proyecto
        $this->executeCommand('php artisan optimize');

        // Comandos adicionales de Laravel
        $this->executeCommand('php artisan route:json');
        $this->executeCommand('php artisan app:publish');

        // Otros comandos de limpieza y optimización
        $this->executeCommand('php artisan cache:clear');
        $this->executeCommand('php artisan config:clear');
        $this->executeCommand('php artisan route:clear');
        $this->executeCommand('php artisan view:clear');

        $this->info('Actualización del proyecto completada con éxito.');

        return 0;
    }

    protected function executeCommand($command)
    {
        $this->info("Ejecutando: $command");
        $output = shell_exec($command);
        if($output !== null) $this->line($output);
    }
}
