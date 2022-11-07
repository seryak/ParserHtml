<?php

namespace Seryak\TestParser\App;

/**
 * Класс для загрузки текста из HTML страницы по адресу
 */
class HtmlDownloader implements ITextGrabber
{
    protected string $source;
    protected string $sourceText;

    public function setSource($source): void
    {
        $this->source = $source;
    }

    public function getSourceText(): string
    {
        return $this->sourceText;
    }

    /**
     * Забирает текст из источника
     * @return void
     */
    public function grabSource() : void
    {
        $text = file_get_contents($this->source);
        $this->sourceText = $text;
    }
}