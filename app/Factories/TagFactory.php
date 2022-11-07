<?php

namespace Seryak\TestParser\App\Factories;

use Seryak\TestParser\App\Models\Tag;

/**
 * Фабрика тегов
 */
class TagFactory
{
    /**
     * Создает объект класса Tag из html строки элемента
     * @param string $htmlString
     * @return Tag
     */
    public function getTag(string $htmlString): Tag
    {
        $re = "/<([a-zA-Z0-9]+)([^>]*>)?/im";
        preg_match_all($re, $htmlString, $matches);

        $tagName = $matches[1][0];
        $idName = $this->getAttributeValue('id', $htmlString);

        $classNames = $this->getAttributeValue('class', $htmlString);
        $classNames = $classNames !== null ? explode(' ', $classNames) : [];

        return new Tag($tagName, $classNames, $idName);
    }

    /**
     * Парсит из строки значение аттрибута
     * @param $attribName - имя аттрибута
     * @param $htmlString - строка с html элементом
     * @return string|null
     */
    private function getAttributeValue($attribName, $htmlString): ?string
    {
        $htmlString = str_replace(["/", "\\"], ["", ""], $htmlString);

        $re = '/' . preg_quote($attribName) . '=([\'"])?((?(1).+?|[^\s>]+))(?(1)\1)/is';

        if (preg_match($re, $htmlString, $match)) {
            return urldecode($match[2]);
        }

        return null;
    }
}