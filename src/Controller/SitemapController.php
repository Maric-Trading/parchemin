<?php

namespace MaricTrading\Parchemin\Controller;

use MaricTrading\Parchemin\Repository\PageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class SitemapController extends AbstractController
{
    public function __construct(
        private PageRepository $pageRepository,
        private array $additionalSitemapRoutes,
    )
    {
    }

    public function index(
    )
    {
        $pages = $this->pageRepository->findAll();
        $xml = new \SimpleXMLElement('<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></urlset>');
        foreach ($pages as $p) {
            $url = $this->generateUrl("parchemin_show", ["slug" => $p->getSlug()], UrlGeneratorInterface::ABSOLUTE_URL);

            // add the URL to the XML document
            $xml->addChild('url')->addChild('loc', $url);
        }

        // add any additional pages.
        foreach ($this->additionalSitemapRoutes as $route) {
            $url = $this->generateUrl($route, [], UrlGeneratorInterface::ABSOLUTE_URL);
            $xml->addChild('url')->addChild('loc', $url);
        }

        // return the XML document as a Response
        $response =new Response($xml->asXML());
        $response->headers->set('Content-Type', 'application/xml');
        return $response;
    }
}
