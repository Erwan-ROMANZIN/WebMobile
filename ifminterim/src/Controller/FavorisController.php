<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 20/03/2019
 * Time: 00:40
 */

namespace App\Controller;


use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use App\Entity\Favoris;


class FavorisController extends AbstractController
{

    /**
     * @Route("favoris/all", name="fav_all", methods={"GET"})
     * @return JsonResponse
     */
    public function allOffres(SerializerInterface $serializer){

        $repository = $this->getDoctrine()->getRepository(Favoris::class);
        $data = $repository->findAll();
        $d = $serializer->serialize($data, 'json');

        return new Response($d);
    }

    /**
     * @Route("favoris/{id}", name="fav", methods={"GET"})
     * @return JsonResponse
     */
    public function oneOffre(SerializerInterface $serializer, String $id){
        $repository = $this->getDoctrine()->getRepository(Favoris::class);
        $data = $repository->find($id);
        $d = $serializer->serialize($data, 'json');

        return new Response($d);
    }

}