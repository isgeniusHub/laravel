<?php
declare(strict_types=1);

namespace Patterns\FactoryMethod;

abstract class AbstractDepartment
{
    abstract public function getManagerName(): string;
    abstract public function getEmployeesCount(): int;
    abstract public function getEmployee(): AbstractEmployee;
}