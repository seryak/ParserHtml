<?php

namespace Seryak\TestParser\App\Responsers;

/**
 * Интерфейс для классов "ответчиков" информации
 */
interface IResponser
{
    public function setDataOutput(array $dataOutput);

    public function printOutput();
}