<?php

namespace MaricTrading\Parchemin\Controller;

use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use MaricTrading\Parchemin\Repository\PageRepository;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class PageController
{
    public function __construct(
        private PageRepository $pageRepository,
        private Environment $twig,
    )
    {
    }

    public function show(string $slug) {
        $page = $this->pageRepository->findOneBySlug($slug);
        if (!$page) {
            throw new \Exception("Page not found", 404);
        }
        return new Response($this->twig->render("@MaricTradingParchemin/page/show.html.twig", ["page" => $page]));
    }
}
