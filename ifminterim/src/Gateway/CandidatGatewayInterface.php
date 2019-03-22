<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 30/11/2018
 * Time: 14:03
 */

namespace App\Gateway;
use App\Entity\Candidat;
interface CandidatGatewayInterface
{
    public function persist(Candidat $c): Candidat;

    public function findOneById(string $id): Candidat;

    public function findAll() : Array;
}