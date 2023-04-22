<?php

namespace MaricTrading\Parchemin\Event;

use Symfony\Contracts\EventDispatcher\Event;

class SitemapCreateEvent extends Event {

    public const NAME = 'parchemin.sitemap.create';
    private array $pages = [];

    public function addPage(string $url): void
    {
        $this->pages[] = $url;
    }

    public function getPages(): array {
        return $this->pages;
    }
}


