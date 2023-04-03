<?php

namespace MaricTrading\Parchemin\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use MaricTrading\Parchemin\Entity\Page;

class PageRepository extends EntityRepository {
    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct($entityManager, $entityManager->getClassMetadata(Page::class));
    }

    public function save(Page $entity, bool $flush = false): void
    {
        $res = $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }



}
