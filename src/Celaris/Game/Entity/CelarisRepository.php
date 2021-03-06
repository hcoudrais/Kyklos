<?php

namespace Celaris\Game\Entity;

use Doctrine\ORM\EntityRepository;

class CelarisRepository extends EntityRepository
{
    public function getAllCelaris()
    {
        return $this
            ->createQueryBuilder('c')
            ->getQuery()
            ->getArrayResult()
        ; 
    }

    public function getOneRandomCelaris($galaxy)
    {
        $mapping = "G0$galaxy%";

        $result = $this
            ->createQueryBuilder('c')
            ->where('c.mapping LIKE :mapping')
            ->andWhere('c.player IS NULL')
            ->setParameter(':mapping', $mapping)
            ->getQuery()
            ->getResult()
        ;

        $int = mt_rand(0, count($result));

        return $result[$int];
    }

    public function findAllPlanets()
    {
        $mapping = '%0';

        return $this
            ->createQueryBuilder('c')
            ->where('c.mapping LIKE :mapping')
            ->setParameter(':mapping', $mapping)
            ->getQuery()
            ->getResult()
        ; 
    }

    public function findAllMoons()
    {
        $mapping = '%0';

        return $this
            ->createQueryBuilder('c')
            ->where('c.mapping NOT LIKE :mapping')
            ->setParameter(':mapping', $mapping)
            ->getQuery()
            ->getResult()
        ; 
    }

    public function findFirstCelaris($playerId)
    {
        $celaris = $this
            ->createQueryBuilder('c')
            ->where('c.player = :playerId')
            ->andWhere('c.typeCelaris = 7') // 15
            ->setParameter(':playerId', $playerId)
            ->getQuery()
            ->getArrayResult()
        ;

        return count($celaris) > 0 ? $celaris[0] : null;
    }
            
}
