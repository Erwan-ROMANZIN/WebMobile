<?php

namespace App\Repository;

use App\Entity\Candidat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Candidat|null find($id, $lockMode = null, $lockVersion = null)
 * @method Candidat|null findOneBy(array $criteria, array $orderBy = null)
 * @method Candidat[]    findAll()
 * @method Candidat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CandidatRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Candidat::class);
    }

    // /**
    //  * @return Candidat[] Returns an array of Candidat objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Candidat
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function doRequete($sql){

        $entityManager=$this->getEntityManager();

        $query=$entityManager->createQuery($sql);

        $result=$query->execute();

        return $query;
    }

    public function addCandidat(){
       $sql= "INSERT INTO candidat (nom, prenom, ville, email, telephone, type_de_contrat, emploi_recherche, localisation, rayon, disponibilite, cv, photo)
        VALUES ('" . $nom . "', '" . $prenom . "', '" . $ville . "', '" . $email . "', '" . $telephone . "', '" . $type_de_contrat . "', '" . $emploi_recherche . "', '" . $localisation . "', '" . $rayon . "' , '" . $disponibilite . "', '" . $cv . "' , '" . $photo . "' )";
       $query = $this->doRequete($sql);

    }
}
