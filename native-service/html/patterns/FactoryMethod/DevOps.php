<?php

namespace Patterns\FactoryMethod;

class DevOps extends AbstractEmployee
{
    public function getResponsibilities(): array
    {
        return [
            'configure server settings',
            'configure environments',
            'deploy',
        ];
    }
}