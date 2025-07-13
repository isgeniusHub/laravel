<?php

namespace Patterns\FactoryMethod;

class Developer extends AbstractEmployee
{
    public function getResponsibilities(): array
    {
        return [
            'write code',
            'refactor code',
            'code review',
        ];
    }
}