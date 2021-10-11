<?php

declare(strict_types=1);

namespace MHauri\ApiBundle\Console\Commands;

use Illuminate\Console\Command;
use OpenApi\Annotations\OpenApi;
use OpenApi\Annotations\SecurityScheme;
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
        define('DOC_API_DESCRIPTION', config('api.description'));
        define('DOC_API_CONTACT', config('api.contact'));
        define('DOC_API_VERSION', $version);

        $openApi = Generator::scan([api_bootstrap(), api_default_responses(), app_path()]);
        $this->mergeSecurityConfig($openApi);
        $this->addPrefix($openApi);
        $this->output->writeln(
            $openApi->toJson(
                JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_IGNORE
            )
        );

        return self::SUCCESS;
    }

    private function addPrefix(OpenApi $openApi)
    {
        if (config('api.prefix')) {
            foreach ($openApi->paths as $path) {
                $path->path = '/'.config('api.prefix').$path->path;
            }
        }
    }

    private function mergeSecurityConfig(OpenApi $openApi)
    {
        $security = config('api.security');
        foreach ($security as $name => $params) {
            $schema = ['securityScheme' => $name];
            $schema = array_merge($schema, $params);
            $test = new SecurityScheme($schema);
            $openApi->components->merge([$test]);
        }
    }
}
