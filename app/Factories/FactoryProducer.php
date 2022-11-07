<?php

namespace Seryak\TestParser\App\Factories;

/**
 * Класс для создания фабрик
 */
class FactoryProducer
{
    public static function getFactory(string $productType)
    {
        return new $productType();
    }
}