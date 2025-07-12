<?php
declare(strict_types=1);

class Singleton
{
    private static ?Singleton $instance = null;
    private function __construct()
    {

    }

    public static function getInstance(): ?Singleton
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}