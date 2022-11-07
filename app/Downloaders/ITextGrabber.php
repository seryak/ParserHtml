<?php

namespace Seryak\TestParser\App;

/**
 * Интерфейс загрузчиков текста из различных источников
 */
Interface ITextGrabber
{
    public function grabSource();
}