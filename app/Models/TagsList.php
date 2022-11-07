<?php

namespace Seryak\TestParser\App\Models;

/**
 * Модель списка тегов
 */
class TagsList
{
    /**
     * @var Tag[]
     */
    private array $list;

    public function push(Tag $tag):void
    {
        $this->list[] = $tag;
    }

    public function getList(): array
    {
        return $this->list;
    }

    /**
     * Количество тегов в списке
     * @return int
     */
    public function count(): int
    {
        return count($this->list);
    }

    /**
     * Фильтрует элементы в спсике по имени тега
     * @param array $tagNames
     * @return TagsList
     */
    public function filterTags(array $tagNames): TagsList
    {
        $tagList = new self();

        /* @var Tag $tag */
        foreach ($this->list as $tag) {
            if (in_array($tag->getTagName(), $tagNames, true)) {
                $tagList->push($tag);
            }
        }

        return $tagList;
    }
}