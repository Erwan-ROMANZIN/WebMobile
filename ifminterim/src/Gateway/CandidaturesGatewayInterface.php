<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 13/03/2019
 * Time: 16:45
 */

namespace App\Gateway;
use App\Entity\Candidatures;

interface CandidaturesGatewayInterface
{

    public function persist(Candidatures $c): Candidatures;

    public function findOneById(string $id): Candidatures;

    public function findAll() : Array;

}