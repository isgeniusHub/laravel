<?php
declare(strict_types=1);

namespace Patterns\FactoryMethod;

abstract class AbstractEmployee
{
    abstract public function getResponsibilities(): array;
}