<?php
declare(strict_types=1);

namespace Patterns\FactoryMethod;

class DevelopDepartment extends AbstractDepartment
{
    public function getManagerName(): string
    {
        return 'Петров Петр Петрович';
    }
    public function getEmployeesCount(): int
    {
        return 10;
    }
    public function getEmployee(): AbstractEmployee
    {
        return new Developer();
    }
}