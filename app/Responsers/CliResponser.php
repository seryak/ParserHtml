<?php

namespace Seryak\TestParser\App\Responsers;

/**
 * Класс для вывода информации в терминале
 */
class CliResponser implements IResponser
{
    protected array $dataOutput = [];

    public function setDataOutput(array $dataOutput) : void
    {
        $this->dataOutput = $dataOutput;
    }

    /**
     * Выводит информацию на экран
     * @return void
     */
    public function printOutput() : void
    {
        if (!empty($this->dataOutput)) {
            echo "\033[31mКоличество HTML элементов \033[0m\n";

            foreach ($this->dataOutput as $tagName => $count) {
                echo "\033[34m$tagName : $count шт. \033[0m\n";
            }
        } else {
            echo "\033[31mНет найденных элементов \033[0m\n";
        }

    }
}