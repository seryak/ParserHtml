<?php

namespace Seryak\TestParser\App\Responsers;

/**
 * Класс для вывода информации в HTML формате
 */
class HtmlResponser implements IResponser
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
        $htmlResponse = '<h1>Нет найденных элементов</h1>';

        if (!empty($this->dataOutput)) {
            $htmlResponse = '<h1> Количество HTML элементов : </h1>';
            $htmlResponse .= '<ul>';
            foreach ($this->dataOutput as $tagName => $count) {
                $htmlResponse .= '<li>'.$tagName.': '.$count.' шт.</li>';
            }
            $htmlResponse .= '/<ul>';
        }

        echo $htmlResponse;
    }
}