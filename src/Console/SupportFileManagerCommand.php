<?php

namespace Emilianotisato\NovaTinyMCE\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;


class SupportFileManagerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nova-tinymce:support-lfm';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fix lfm index.php file among others files.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Fixing Filemanager files...');

        if (File::isFile(resource_path('views/vendor/laravel-filemanager/index.blade.php'))) {
            // Delete files that need to be override
            File::delete(
                [
                    resource_path('views/vendor/laravel-filemanager/index.blade.php'),
                ]
            );
        }

        if (! File::isDirectory(resource_path('views/vendor/laravel-filemanager'))) {
            File::makeDirectory(resource_path('views/vendor/laravel-filemanager'));
        }

        // Copy stubs
        File::copy(
            __DIR__ . '/stubs/laravel-filemanager/index.blade.php',
            resource_path('views/vendor/laravel-filemanager/index.blade.php')
        );

        $this->info("Installation was successful!" . PHP_EOL);
    }
}
