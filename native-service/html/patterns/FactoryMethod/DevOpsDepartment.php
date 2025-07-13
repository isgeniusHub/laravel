<?php
declare(strict_types=1);

namespace Patterns\FactoryMethod;

class DevOpsDepartment extends AbstractDepartment
{
    public function getManagerName(): string
    {
        return 'Иванов Иван Иванович';
    }
    public function getEmployeesCount(): int
    {
        return 3;
    }
    public function getEmployee(): AbstractEmployee
    {
        return new DevOps();
    }
}