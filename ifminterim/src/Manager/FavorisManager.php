<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 13/03/2019
 * Time: 16:43
 */

namespace App\Manager;


use App\Entity\Favoris;
use App\Gateway\FavorisGatewayInterface;

class FavorisManager
{

    protected  $gateway;


    public function __construct(FavorisGatewayInterface $gateway)
    {
        $this->gateway = $gateway;
    }

    public function findOneById(String $id): Favoris
    {
        return $this->getGateway()->findOneById($id);
    }

    public function persist(Favoris $card): Favoris
    {
        return $this->getGateway()->persist($card);
    }

    public function delete(Favoris $card)
    {
        return $this->getGateway()->delete($card);
    }


    public function findAll(): Array
    {
        return $this->getGateway()->findAll();
    }
    /**
     * @return FavorisGatewayInterface
     */
    public function getGateway(): FavorisGatewayInterface
    {
        return $this->gateway;
    }

}