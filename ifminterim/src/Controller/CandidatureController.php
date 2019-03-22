<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use App\Entity\Candidatures;   
use App\Entity\Offre;
use App\Hydrator\CandidatureHydrator;
use App\Hydrator\OffreHydrator;

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

    /**
     * @Route("Mycandidature/{id}", name="candidature_id", methods={"GET"})
     * @return JsonResponse
     */
    public function MyCandidatures(CandidatureHydrator $candidaturesHydrator, SerializerInterface $serializer, String $id){

        $repository = $this->getDoctrine()->getRepository(Candidatures::class);
        $data = $repository->find($id);
        //$cand = $candidaturesHydrator->hydrate(new Candidatures(),$data);

        $id_offre = $data->getIdOffre();


        $repositoryOffre = $this->getDoctrine()->getRepository(Offre::class);
        $data = $repositoryOffre->find($id_offre);
        $d = $serializer->serialize($data, 'json');

        return new Response($d);
    }


}