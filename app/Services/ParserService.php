<?php
namespace Seryak\TestParser\App\Services;

use Seryak\TestParser\App\Factories\FactoryProducer;
use Seryak\TestParser\App\Factories\TagFactory;
use Seryak\TestParser\App\Models\TagsList;

/**
 * Класс для парсинга текста
 */
class ParserService
{
    /**
     * Подсчитывает количество тегов в html тексте в виде массива
     * @param $text
     * @return array
     */
    public function countTagsFromHtmlText($text): array
    {
        $dataOutput = [];

        $result = preg_match_all('/<.+?>/', $text, $items);
        if ($result > 0) {
            $onlyOpeningTags = $this->removeClosingPairTags($items[0]);
            $tagList = $this->createTagsArrayFromTagsList($onlyOpeningTags);

            foreach ($tagList->getList() as $element) {
                if (isset($dataOutput[$element->getTagName()])) {
                    $dataOutput[$element->getTagName()]++;
                } else {
                    $dataOutput[$element->getTagName()] = 1;
                }
            }

        }

        return $dataOutput;
    }

    /**
     * Убирает закрывающие пары в массиве тегов
     * @param array $tags
     * @return array
     */
    private function removeClosingPairTags(array $tags): array
    {
        foreach ($tags as $index => $tag) {
            if (str_starts_with($tag, '</') || str_starts_with($tag, '<!')) {
                unset($tags[$index]);
            }
        }

        return $tags;
    }

    /**
     * Создает модель TagsList из массива Html тегов
     * @param array $tags
     * @return TagsList
     */
    private function createTagsArrayFromTagsList(array $tags): TagsList
    {
        $tagFactory = FactoryProducer::getFactory(TagFactory::class);
        $tagList = new TagsList();

        foreach ($tags as $index => $tagString) {
            $tagObject = $tagFactory->getTag($tagString);
            $tagList->push($tagObject);
        }

        return $tagList;
    }


}