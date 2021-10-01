<?php

declare(strict_types=1);

namespace MHauri\ApiBundle\Console\Commands;

use Illuminate\Console\Command;
use OpenApi\Generator;

class DocumentationGenerateCommand extends Command
{
    protected $signature = 'api:documentation:generate';

    protected $description = 'Generate OpenAPI Documentation';

    public function handle()
    {
        $name = config('api.name');
        $version = config('api.version');

        define('DOC_API_NAME', $name);
        define('DOC_API_CONTACT', config('api.contact'));
        define('DOC_API_VERSION', $version);

        $openapi = Generator::scan([api_bootstrap(), api_default_responses(), app_path()]);
        $this->output->writeln(
            $openapi->toJson(
                JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_IGNORE
            )
        );

        return self::SUCCESS;
    }
}
