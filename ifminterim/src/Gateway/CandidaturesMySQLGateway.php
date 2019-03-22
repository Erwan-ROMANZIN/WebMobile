<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 13/03/2019
 * Time: 16:46
 */

namespace App\Gateway;


use App\Entity\Candidatures;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

class CandidaturesMySQLGateway implements CandidaturesGatewayInterface
{

    protected $EntityManager;

    public function __construct(EntityManagerInterface $manager)
    {
        $this->EntityManager = $manager;
    }

    public function persist(Candidatures $c): Candidatures
    {
        $this->getEntityManager()->persist($c);
        $this->getEntityManager()->flush();

        return $c;


    }

    public function delete(Candidatures $c)
    {
        $this->getEntityManager()->remove($c);
        $this->getEntityManager()->flush();
        return('successfully removed');
    }

    public function findOneById(string $id): Candidatures
    {


        $repository = $this->getEntityManager()->getRepository(Candidatures::class);


        return $repository->find($id);



    }

    public function findAll(): Array
    {
        $repository = $this->getEntityManager()->getRepository(Candidatures::class);
        return $repository->findAll();
    }

    /**
     * @return EntityManager
     */
    public function getEntityManager(): EntityManager
    {
        return $this->EntityManager;
    }
}