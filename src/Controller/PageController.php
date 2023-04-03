<?php

namespace MaricTrading\Parchemin\Controller;

use MaricTrading\Parchemin\Entity\Page;
use MaricTrading\Parchemin\Form\PageType;
use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use MaricTrading\Parchemin\Repository\PageRepository;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class PageController extends AbstractController
{
    public function __construct(private PageRepository $pageRepository, private Environment $twig, private string $editRole)
    {
    }

    public function show(string $slug)
    {
        $page = $this->pageRepository->findOneBySlug($slug);
        if (!$page) {
            throw new \Exception("Page not found", 404);
        }
        return new Response($this->twig->render("@MaricTradingParchemin/page/show.html.twig", ["page" => $page]));
    }

    public function edit(Page $page, FormFactoryInterface $formFactory, Request $request, Security $security)
    {
        if (!$security->isGranted($this->editRole)) {
            throw new \Exception("Access denied", 403);
        }
        $form = $formFactory->create(PageType::class, $page);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->pageRepository->save($page, true);
            return $this->redirectToRoute("parchemin_edit", ["id" => $page->getId()]);
        }
        return new Response($this->twig->render("@MaricTradingParchemin/page/edit.html.twig", ["form" => $form->createView(),]));
    }
}
