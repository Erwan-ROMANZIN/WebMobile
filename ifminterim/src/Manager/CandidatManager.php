<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 30/11/2018
 * Time: 14:07
 */

namespace App\Manager;

use App\Gateway\CandidatGatewayInterface;
use App\Entity\Candidat;
use PhpParser\Node\Expr\Array_;

/**
 * Class CardManager
 *
 * @package App\Manager
 */

class CandidatManager
{

    protected  $gateway;


    public function __construct(CandidatGatewayInterface $gateway)
    {
        $this->gateway = $gateway;
    }

    public function findOneById(String $id): Candidat
    {
        return $this->getGateway()->findOneById($id);
    }

    public function persist(Candidat $card): Candidat
    {
        return $this->getGateway()->persist($card);
    }

    public function delete(Candidat $card)
    {
        return $this->getGateway()->delete($card);
    }


    public function findAll(): Array
    {
        return $this->getGateway()->findAll();
    }
    /**
     * @return CandidatGatewayInterface
     */
    public function getGateway(): CandidatGatewayInterface
    {
        return $this->gateway;
    }
}