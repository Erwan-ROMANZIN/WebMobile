<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 13/03/2019
 * Time: 16:43
 */

namespace App\Manager;


use App\Entity\Candidatures;
use App\Gateway\CandidaturesGatewayInterface;

class CandidaturesManager
{

    protected  $gateway;


    public function __construct(CandidaturesGatewayInterface $gateway)
    {
        $this->gateway = $gateway;
    }

    public function findOneById(String $id): Candidatures
    {
        return $this->getGateway()->findOneById($id);
    }

    public function persist(Candidatures $card): Candidatures
    {
        return $this->getGateway()->persist($card);
    }

    public function delete(Candidatures $card)
    {
        return $this->getGateway()->delete($card);
    }


    public function findAll(): Array
    {
        return $this->getGateway()->findAll();
    }
    /**
     * @return CandidaturesGatewayInterface
     */
    public function getGateway(): CandidaturesGatewayInterface
    {
        return $this->gateway;
    }

}