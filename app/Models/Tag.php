<?php

namespace Seryak\TestParser\App\Models;

/**
 * Модель HTML тегов
 */
class Tag
{
    public function __construct(protected string $tagName, protected array $classNames, protected ?string $idName){}

    public function getTagName(): string
    {
        return $this->tagName;
    }

    public function getClassNames(): array
    {
        return $this->classNames;
    }

    public function getId(): string
    {
        return $this->idName;
    }
}