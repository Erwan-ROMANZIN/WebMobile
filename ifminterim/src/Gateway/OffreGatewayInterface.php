<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 13/03/2019
 * Time: 16:45
 */

namespace App\Gateway;
use App\Entity\Offre;

interface OffreGatewayInterface
{

    public function persist(Offre $c): Offre;

    public function findOneById(string $id): Offre;

    public function findAll() : Array;

}