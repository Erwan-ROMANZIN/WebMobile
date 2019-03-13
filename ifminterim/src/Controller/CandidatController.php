<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use App\Entity\Candidat;   


class CandidatController extends AbstractController
{
    /**
     * @Route("candidat/add", name="candidat_add", methods={"POST"})
     */
    public function ajoutCandidat(SerializerInterface $serializer){

       $repository = $this->getDoctrine()->getRepository(Candidat::class);
       $data = $repository->addCandidat();
       
    }
}