<?php
declare(strict_types=1);

class PrintClassInfoHelper
{
    /**
     * Returns html representation of class methods, attributes, etc.
     *
     * @param string $class
     * @return string
     * @throws ReflectionException
     */
    public static function getHtml(string $class): string
    {
        $html = '<div style="font-size: 18px;">';
        $reflectionClass = new \ReflectionClass($class);

        echo sprintf('<h4>%s methods:</h4>', $reflectionClass->getName());
        foreach ($reflectionClass->getMethods() as $key => $method) {
            echo ($key + 1) . '. methodName = ' . $method->getName() . '<br>';
            echo 'isConstructor = ' . ($method->isConstructor() ? 'true' : 'false'). '<br>';
            echo 'isPrivate = ' . ($method->isPrivate()  ? 'true' : 'false') . '<br>';
            echo 'isStatic = ' . ($method->isStatic() ? 'true' : 'false') . '<br>';
        }

        echo sprintf('<h4>%s properties:</h4>', $reflectionClass->getName());
        foreach ($reflectionClass->getProperties() as $key => $property) {
            echo ($key + 1) . '. name = ' . $property->getName() . '<br>';
            echo 'isStatic = ' . ($property->isStatic() ? 'true' : 'false') . '<br>';
            echo 'isPrivate = ' . ($property->isPrivate() ? 'true' : 'false') . '<br>';
            echo 'type = ' . $property->getType()->getName() . '<br>';
            echo 'default = ' . ($property->getDefaultValue() === null ? 'null' : $property->getDefaultValue()) . '<br>';
        }

        $html .= '</div>';
        return $html;
    }
}