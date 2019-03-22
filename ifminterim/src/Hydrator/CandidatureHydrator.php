<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 13/03/2019
 * Time: 16:36
 */

namespace App\Hydrator;

use App\Entity\Candidatures;
class CandidatureHydrator
{


    /**
     * @param Candidatures $c
     * @return array
     */
    public function extract(Candidatures $c) : array
    {
        return [

            //id;id_candidat;id_offre

            "id" => $c->getId(),
            "id_candidat" => $c->getIdCandidat(),
            "id_offre" => $c->getIdOffre()



        ];
    }

    /**
     * @param Candidatures $c
     * @param array $values
     * @return Candidatures
     */

    public function hydrate(Candidatures $c, array $values = []) : Candidatures
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