<?php

namespace MaricTrading\Parchemin\Entity;


use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity()]
#[ORM\Table(name: 'page')]
#[ORM\Unique(name: 'idx_slug', fields: ['slug'])]
class Page {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    protected int $id;
    #[ORM\Column(type: 'text')]
    protected string $content;
    #[ORM\Column(type: 'string', length: 255)]
    protected string $slug;
}
