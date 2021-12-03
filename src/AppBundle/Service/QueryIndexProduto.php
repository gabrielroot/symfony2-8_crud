<?php

namespace AppBundle\Service;

use Doctrine\ORM\EntityManager;

class QueryIndexProduto{

    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getQueryProduto(){
        $qb = $this->em->createQueryBuilder('p');

        return $qb->select('produto')
            ->from('AppBundle:Produto', 'produto')
            ->orderBy('produto.id', 'DESC')
            ->getQuery();
    }
}