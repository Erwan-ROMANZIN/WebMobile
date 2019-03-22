<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 30/11/2018
 * Time: 14:14
 */
namespace App\Hydrator;

use App\Entity\Candidat;


class CandidatHydrator
{

    /**
     * @param Candidat $c
     * @return array
     */
    public function extract(Candidat $c) : array
    {
        return [

            //private $id;$nom;$prenom;$ville;$email;$telephone;$type_de_contrat;$emploi_recherche;$localisation;
            //                $rayon;$disponibilite;$cv;$photo;

            "id" => $c->getId(),
            "nom" =>$c->getNom(),
            "prenom" =>$c->getPrenom(),
            "ville" =>$c->getVille(),
            "email" =>$c->getEmail(),
            "telephone" =>$c->getTelephone(),
            "typeDeContrat" =>$c->getTypeDeContrat(),
            "emploiRecherche" =>$c->getEmploiRecherche(),
            "localisation" =>$c->getLocalisation(),
            "rayon" =>$c->getRayon(),
            "disponibilite"=>$c->getDisponibilite(),
            "cv" =>$c->getCv(),
            "photo"=>$c->getPhoto()


        ];
    }

    /**
     * @param Candidat $c
     * @param array $values
     * @return Candidat
     */

    public function hydrate(Candidat $c, array $values = []) : Candidat
    {
        foreach ($values as $key => $value)
        {
            $setterName = "set" . ucfirst($key);
            if(method_exists($c, $setterName))
            {
                $c->$setterName($value);
            }
        }

        return $c;
    }
}