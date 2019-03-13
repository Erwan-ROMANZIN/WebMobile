<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use App\Entity\Candidatures;   


class CandidatureController extends AbstractController
{
    /**
     * @Route("candidature/all", name="candidature_all", methods={"GET"})
     * @return JsonResponse
     */
    public function allCandidatures(SerializerInterface $serializer){

       $repository = $this->getDoctrine()->getRepository(Candidatures::class);
       $data = $repository->findAll();
       $d = $serializer->serialize($data, 'json');

        return new Response($d);
    }
}