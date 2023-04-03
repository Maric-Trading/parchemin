<?php

namespace MaricTrading\Parchemin\Repository;

use App\Entity\Integration;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use MaricTrading\Parchemin\Entity\Page;

class PageRepository extends ServiceEntityRepository {
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Page::class);
    }



}
