<?php

namespace MaricTrading\Parchemin\Controller;

use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use MaricTrading\Parchemin\Repository\PageRepository;

class PageController
{
    public function __construct(
        private PageRepository $pageRepository,
    )
    {
    }

    public function show(string $slug) {
        $page = $this->pageRepository->findOneBySlug($slug);
        dd($page);
    }
}
