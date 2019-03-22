<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 13/03/2019
 * Time: 16:46
 */

namespace App\Gateway;


use App\Entity\Favoris;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

class FavorisMySQLGateway implements FavorisGatewayInterface
{

    protected $EntityManager;

    public function __construct(EntityManagerInterface $manager)
    {
        $this->EntityManager = $manager;
    }

    public function persist(Favoris $c): Favoris
    {
        $this->getEntityManager()->persist($c);
        $this->getEntityManager()->flush();

        return $c;


    }

    public function delete(Favoris $c)
    {
        $this->getEntityManager()->remove($c);
        $this->getEntityManager()->flush();
        return('successfully removed');
    }

    public function findOneById(string $id): Favoris
    {


        $repository = $this->getEntityManager()->getRepository(Favoris::class);


        return $repository->find($id);



    }

    public function findAll(): Array
    {
        $repository = $this->getEntityManager()->getRepository(Favoris::class);
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