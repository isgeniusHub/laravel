<?php
declare(strict_types=1);

require_once __DIR__ . '/../autoload.php';

use Helpers\PrintClassInfoHelper;
use Helpers\PrintFileContentHelper;
use Patterns\Singleton\Singleton;

echo sprintf('<h1>%s</h1>', 'Singleton');
echo sprintf('<h3>%s</h3>', 'Порождающий шаблон');

echo PrintFileContentHelper::printFileContent('../patterns/Singleton/Singleton.php');


echo sprintf('<h3>%s</h3>', 'Особенности:');
echo '$singleton = Singleton::getInstance();<br>';
$singleton = Singleton::getInstance();

echo PrintClassInfoHelper::getHtml(Singleton::class);

echo '<br>$singleton2 = Singleton::getInstance();<br>';
$singleton2 = Singleton::getInstance();

echo '$singleton === $singleton2 returns ' . ($singleton === $singleton2 ? 'true' : 'false'). '<br>';

echo '$singleton2 = new Singleton(); //returns Fatal error: Uncaught Error: Call to private Singleton::__construct() from global scope';
