<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 30/11/2018
 * Time: 14:03
 */

namespace App\Gateway;
use App\Entity\Favoris;
interface FavorisGatewayInterface
{
    public function persist(Favoris $c): Favoris;

    public function findOneById(string $id): Favoris;

    public function findAll() : Array;
}