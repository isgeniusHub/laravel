<?php
declare(strict_types=1);

require_once __DIR__ . '/../autoload.php';

use Helpers\PrintFileContentHelper;
use Patterns\FactoryMethod\DevelopDepartment;
use Patterns\FactoryMethod\DevOpsDepartment;

echo sprintf('<h1>%s</h1>', 'Factory method');
echo sprintf('<h3>%s</h3>', 'Порождающий шаблон');

echo PrintFileContentHelper::printFileContent('../patterns/FactoryMethod/AbstractEmployee.php');
echo PrintFileContentHelper::printFileContent('../patterns/FactoryMethod/Developer.php');
echo PrintFileContentHelper::printFileContent('../patterns/FactoryMethod/DevOps.php');

echo PrintFileContentHelper::printFileContent('../patterns/FactoryMethod/AbstractDepartment.php');
echo PrintFileContentHelper::printFileContent('../patterns/FactoryMethod/DevelopDepartment.php');
echo PrintFileContentHelper::printFileContent('../patterns/FactoryMethod/DevOpsDepartment.php');

echo sprintf('<h3>%s</h3>', 'Особенности:');

$developDepartment = new DevelopDepartment();
echo sprintf(
    'ФИО начальника: %s<br>',
    $developDepartment->getManagerName()
);
echo sprintf(
    'Количество сотрудников в отделе: %s<br>',
    $developDepartment->getEmployeesCount()
);
echo sprintf(
    'Обязанности сотрудников: %s<br>',
    implode(',', $developDepartment->getEmployee()->getResponsibilities())
);

$devOpsDepartment = new DevOpsDepartment();
echo sprintf(
    'ФИО начальника: %s<br>',
    $devOpsDepartment->getManagerName()
);
echo sprintf(
    'Количество сотрудников в отделе: %s<br>',
    $devOpsDepartment->getEmployeesCount()
);
echo sprintf(
    'Обязанности сотрудников: %s<br>',
    implode(',', $devOpsDepartment->getEmployee()->getResponsibilities())
);

