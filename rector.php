<?php

use Rector\DeadCode\Rector\ClassMethod\RemoveUnusedPromotedPropertyRector;
use Rector\DeadCode\Rector\Property\RemoveUnusedPrivatePropertyRector;
use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\ValueObject\MethodCallRename;
use Rector\Set\ValueObject\SetList;
use Rector\Transform\Rector\MethodCall\MethodCallToMethodCallRector;
use Rector\Transform\ValueObject\MethodCallToMethodCall;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Rector\Removing\Rector\ClassMethod\ArgumentRemoverRector;
use Rector\Removing\ValueObject\ArgumentRemover;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;

return static function (ContainerConfigurator $containerConfigurator): void {
    // here we can define, what sets of rules will be applied
    // tip: use "SetList" class to autocomplete sets
    $containerConfigurator->import(SetList::CODE_QUALITY);

    $services = $containerConfigurator->services();

    $services->set(ArgumentRemoverRector::class)
        ->call('configure', [[
            ArgumentRemoverRector::REMOVED_ARGUMENTS => ValueObjectInliner::inline(
                [
                    new ArgumentRemover('Sulu\Component\Webspace\Portal','isXDefault', 0, [false]),
                    new ArgumentRemover('Sulu\Component\Webspace\Portal','setXDefaultLocalization', 1, [false]),
                    new ArgumentRemover('Sulu\Component\Webspace\Portal','getXDefaultLocalization', 0, [false]),
                ]
            ),
        ]]);

    $services->set(RenameMethodRector::class)
        ->call('configure', [[
            RenameMethodRector::METHOD_CALL_RENAMES => ValueObjectInliner::inline([
                new MethodCallRename('Sulu\Component\Webspace\Portal', 'isXDefault', 'isDefault'),
                new MethodCallRename('Sulu\Component\Webspace\Portal', 'setXDefaultLocalization', 'setDefaultLocalization'),
                new MethodCallRename('Sulu\Component\Webspace\Portal', 'getXDefaultLocalization', 'getDefaultLocalization'),
            ]),
        ]]);

    $services->set(MethodCallToMethodCallRector::class)
        ->call('configure', [[
            MethodCallToMethodCallRector::METHOD_CALLS_TO_METHOD_CALLS => ValueObjectInliner::inline([
                new MethodCallToMethodCall('Sulu\\Bundle\\MediaBundle\\Media\\Manager\\MediaManagerInterface', 'save', 'Symfony\\Component\\Messenger\\MessageBusInterface', 'dispatch'),
                new MethodCallToMethodCall('Sulu\\Bundle\\MediaBundle\\Media\\Manager\\MediaManagerInterface', 'get', 'Sulu\\Media\\Domain\\RepositoryInterface\\MediaRepositoryInterface', 'findOneBy'),
                new MethodCallToMethodCall('Sulu\\Bundle\\ContactBundle\\Contact\\ContactManagerInterface', 'save', 'Symfony\\Component\\Messenger\\MessageBusInterface', 'dispatch'),
                new MethodCallToMethodCall('Sulu\\Bundle\\MediaBundle\\Media\\Manager\\ContactManagerInterface', 'get', 'Sulu\\Contact\\Domain\\RepositoryInterface\\ContactRepositoryInterface', 'findOneBy'),
            ]),
        ]]);

    $services->set(RemoveUnusedPromotedPropertyRector::class);
    $services->set(RemoveUnusedPrivatePropertyRector::class);
};
