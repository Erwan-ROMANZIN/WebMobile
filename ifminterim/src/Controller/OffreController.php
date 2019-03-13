<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use App\Entity\Offre;   


class OffreController extends AbstractController
{
    /**
     * @Route("offre/all", name="offre_all", methods={"GET"})
     * @return JsonResponse
     */
    public function allOffres(SerializerInterface $serializer){

       $repository = $this->getDoctrine()->getRepository(Offre::class);
       $data = $repository->findAll();
       $d = $serializer->serialize($data, 'json');

        return new Response($d);
    }

    /**
     * @Route("offre/{id}", name="offre", methods={"GET"})
     * @return JsonResponse
     */
    public function oneOffre(SerializerInterface $serializer){
        $repository = $this->getDoctrine()->getRepository(Offre::class);
        $data = $repository->find($id);
        $d = $serializer->serialize($data, 'json');

        return new Response($d);
    }
}