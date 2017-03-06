<?php

namespace Subspace\CustomerBundle\Repository;

/**
 * SpaceRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SpaceRepository extends \Doctrine\ORM\EntityRepository
{
    public function findAllSpaces()
    {
        $query = $this->getEntityManager()
        ->createQuery(
            'SELECT s FROM SubspaceCustomerBundle:Space s
            INNER JOIN SubspaceCustomerBundle:Address a WITH s.AddressId = a.id');
	    try {
	        return $query->getResult();
	    } catch (\Doctrine\ORM\NoResultException $e) {
	        return null;
	    }
    }
}
