<?php

namespace Trainer\Commands;

use Exception;
use Trainer\Executable;

class Trainer
{
    /**
     * Classes that can be executed
     *
     * @var string[]
     */
    protected $executables = [
        \Trainer\DesignPatterns\Adapter\Adapter::class,
        \Trainer\DesignPatterns\Decorator\Decorator::class,
        \Trainer\DesignPatterns\Observer\Observer::class,
        \Trainer\DesignPatterns\ResponsibilityChain\ResponsibilityChain::class,
        \Trainer\DesignPatterns\Strategy\Strategy::class,
        \Trainer\DesignPatterns\TemplateMethod\TemplateMethod::class,
        \Trainer\General\AnonymousClasses\AnonymousClasses::class,
        \Trainer\General\ConstructorPropertyPromotion\ConstructorPropertyPromotion::class,
        \Trainer\General\DynamicClassAccess\DynamicClassAccess::class,
        \Trainer\General\GroupedImports\GroupedImports::class,
        \Trainer\General\MatchedExpressions\MatchedExpressions::class,
        \Trainer\General\NamedParameters\NamedParameters::class,
        \Trainer\General\StringHelpers\StringHelpers::class,
        \Trainer\General\UnionTypes\UnionTypes::class,
        \Trainer\General\WeakMaps\WeakMaps::class,
        \Trainer\Operators\NullCoalesce::class,
        \Trainer\Operators\Nullsafe::class,
        \Trainer\Operators\Spaceship::class,
        \Trainer\Principles\DependencyInversion\DependencyInversion::class,
        \Trainer\Principles\InterfaceSegregation\InterfaceSegregation::class,
        \Trainer\Principles\LiskovSubstitution\LiskovSubstitution::class,
        \Trainer\Principles\OpenClosed\OpenClosed::class,
        \Trainer\Principles\SingleResponsibility\SingleResponsibility::class,
        \Trainer\OOP\Exceptions\Exceptions::class,
        \Trainer\OOP\Inheritance\Inheritance::class,
    ];

    /**
     * Run the specified command
     *
     * @param string $command
     * @return void
     */
    public function run(string $command)
    {
        $class = $this->findClass($command);

        if (! $class) {
            echo '😔 Exercise not found.' . PHP_EOL;
            die;
        }

        $class::run();
    }

    /**
     * Find the class that registeres that signature
     *
     * @param mixed $command
     * @return string|void
     */
    public function findClass($command)
    {
        foreach ($this->executables as $executable) {
            if (! is_subclass_of($executable, Executable::class)) {
                throw new Exception('Executable classes must extend from Trainer\Executable.');
            }

            if ($command === $executable::SIGNATURE) {
                return $executable;
            }
        }
    }
}
