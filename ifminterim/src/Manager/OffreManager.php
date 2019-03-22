<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 13/03/2019
 * Time: 16:43
 */

namespace App\Manager;


use App\Entity\Offre;
use App\Gateway\OffreGatewayInterface;

class OffreManager
{

    protected  $gateway;


    public function __construct(OffreGatewayInterface $gateway)
    {
        $this->gateway = $gateway;
    }

    public function findOneById(String $id): Offre
    {
        return $this->getGateway()->findOneById($id);
    }

    public function persist(Offre $card): Offre
    {
        return $this->getGateway()->persist($card);
    }

    public function delete(Offre $card)
    {
        return $this->getGateway()->delete($card);
    }


    public function findAll(): Array
    {
        return $this->getGateway()->findAll();
    }
    /**
     * @return OffreGatewayInterface
     */
    public function getGateway(): OffreGatewayInterface
    {
        return $this->gateway;
    }

}