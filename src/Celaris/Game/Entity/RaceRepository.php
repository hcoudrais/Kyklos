<?php

namespace Celaris\Game\Entity;

use Doctrine\ORM\EntityRepository;

class RaceRepository extends EntityRepository
{
    public function getAllRaces()
    {
        return $this
            ->createQueryBuilder('r')
            ->getQuery()
            ->getArrayResult()
        ; 
    }
}

