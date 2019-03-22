<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 30/11/2018
 * Time: 14:05
 */
namespace  App\Gateway;


use App\Entity\Candidat;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use PhpParser\Node\Expr\Array_;


class CandidatMySQLGateway implements CandidatGatewayInterface{
    protected $EntityManager;

    public function __construct(EntityManagerInterface $manager)
    {
        $this->EntityManager = $manager;
    }

    public function persist(Candidat $c): Candidat
    {
        $this->getEntityManager()->persist($c);
        $this->getEntityManager()->flush();

        return $c;


    }

    public function delete(Candidat $c)
    {
        $this->getEntityManager()->remove($c);
        $this->getEntityManager()->flush();
        return('successfully removed');
    }

    public function findOneById(string $id): Candidat
    {


        $repository = $this->getEntityManager()->getRepository(Candidat::class);


        return $repository->find($id);



    }

    public function findAll(): Array
    {
        $repository = $this->getEntityManager()->getRepository(Candidat::class);
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
