<?php

namespace MaricTrading\Parchemin\Entity;


use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity()]
class Page {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    protected int $id;
}
