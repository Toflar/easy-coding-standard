<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\Whitespace\MethodChainingIndentationFixer;
use SlevomatCodingStandard\Sniffs\Variables\UnusedVariableSniff;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\EasyCodingStandard\ValueObject\Option;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->import(__DIR__.'/set/contao.php');

    $parameters = $containerConfigurator->parameters();

    $parameters->set(Option::SKIP, [
        MethodChainingIndentationFixer::class => [
            '*/DependencyInjection/Configuration.php',
        ],
        UnusedVariableSniff::class => [
            'core-bundle/tests/Session/Attribute/ArrayAttributeBagTest.php',
        ],
    ]);

    $parameters->set(Option::LINE_ENDING, "\n");
    $parameters->set(Option::EXCLUDE_PATHS, ['*/Resources/*', '*/Fixtures/system/*']);
    $parameters->set(Option::CACHE_DIRECTORY, sys_get_temp_dir().'/ecs_default_cache');
};
