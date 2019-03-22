<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 18/03/2019
 * Time: 09:33
 */

namespace App\Hydrator;
use App\Entity\Offre;

class OffreHydrator
{

    /**
     * @param Offre $c
     * @return array
     */
    public function extract(Offre $c) : array
    {
        return [

            //id;nom_ent;poste;code_postal;ville;presentation;activite;sur_le_poste;photo

            "id" => $c->getId(),
            "nom_ent" => $c->getNomEnt(),
            "poste" => $c->getPoste(),
            "code_postal" => $c->getCodePostal(),
            "ville" => $c->getVille(),
            "presentation" => $c->getPresentation(),
            "active" => $c->getActivite(),
            "sur_le_poste" => $c->getSurLePoste(),
            "photo" => $c->getPhoto()



        ];
    }

    /**
     * @param Offre $c
     * @param array $values
     * @return Offre
     */

    public function hydrate(Offre $c, array $values = []) : Offre    {
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