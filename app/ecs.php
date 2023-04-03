<?php declare(strict_types=1);

use PHP_CodeSniffer\Standards\Generic\Sniffs\Commenting\DocCommentSniff;
use PHP_CodeSniffer\Standards\Generic\Sniffs\PHP\ForbiddenFunctionsSniff;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\EasyCodingStandard\ValueObject\Option;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->import(__DIR__ . '/vendor/lmc/coding-standard/ecs.php');
    $parameters = $containerConfigurator->parameters();
    $parameters->set(
        Option::SKIP,
        [
            // Ignore specific check only in specific files
            ForbiddenFunctionsSniff::class => [
                __DIR__ . '/tests/bootstrap.php'
            ],
            // Disable check entirely
            DocCommentSniff::class,
            // Skip one file
            //__DIR__ . '/vendor/symplify/easy-coding-standard/vendor/webmozart/assert/src/Assert.php',
            // Skip entire directory
            __DIR__ . '/vendor/*',
        ]
    );

    // Be default only checks compatible with  PHP 7.3 are enabled.
    // Depending on the lowest PHP version your project need to support, you can enable additional checks for PHP 7.4, 8.0 or 8.1.


    // Import one of ecs-7.4.php, ecs-8.0.php or ecs-8.1.php. Use only one file (for the highest possible PHP version).
    $containerConfigurator->import(__DIR__ . '/vendor/lmc/coding-standard/ecs-8.1.php');
};
