<?php

namespace Seryak\TestParser\App\Core;

use Seryak\TestParser\App\HtmlDownloader;
use Seryak\TestParser\App\Responsers\CliResponser;
use Seryak\TestParser\App\Responsers\HtmlResponser;
use Seryak\TestParser\App\Responsers\IResponser;
use Seryak\TestParser\App\Services\ParserService;

/**
 * Класс приложения
 */
class App
{
    /**
     * Режим в котором работает приложение (терминал или html - если не терминал)
     * @var string
     */
    protected string $workMode;

    /**
     * Объект для вывода информации
     * @var IResponser|CliResponser|HtmlResponser
     */
    protected IResponser $responser;

    public function __construct()
    {
        if (PHP_SAPI === "cli") {
            $this->workMode = 'cli';
            $this->responser = new CliResponser();
        } else {
            $this->workMode = 'html';
            $this->responser = new HtmlResponser();
        }
    }

    /**
     * @throws \Exception
     */
    public function run(): void
    {
        $url = Config::get('parsing_url');
        $downloader = new HtmlDownloader();
        $downloader->setSource($url);
        $downloader->grabSource();

        $service = new ParserService();
        $dataOutput = $service->countTagsFromHtmlText($downloader->getSourceText());

        $this->responser->setDataOutput($dataOutput);
        $this->responser->printOutput();
    }
}