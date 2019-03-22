<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 18/03/2019
 * Time: 09:30
 */

namespace App\Hydrator;
use App\Entity\Favoris;

class FavorisHydrator
{

    /**
     * @param Favoris $c
     * @return array
     */
    public function extract(Favoris $c) : array
    {
        return [

            //id;id_candidat;id_offre

            "id" => $c->getId(),
            "id_candidat" => $c->getIdCandidat(),
            "id_offre" => $c->getIdOffre()



        ];
    }

    /**
     * @param Favoris $c
     * @param array $values
     * @return Favoris
     */

    public function hydrate(Favoris $c, array $values = []) : Favoris
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