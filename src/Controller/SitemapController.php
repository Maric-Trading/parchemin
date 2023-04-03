<?php

namespace MaricTrading\Parchemin\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

class SitemapController
{
    public function __construct(
    )
    {
    }

    public function index(
    )
    {
        dd("sitemap here", $this);
        die("HERE");
    }
}
