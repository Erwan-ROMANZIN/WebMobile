<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use App\Entity\Candidat;
use App\Hydrator\CandidatHydrator;
use App\Manager\CandidatManager;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class GetCandidatController extends AbstractController
{
    /**
     * @Route("/candidat/{id}", name="get_candidat")
     * @param Request $request
     * @param CandidatManager $CandidatManager
     * @param CandidatHydrator $hydrator
     * @return JsonResponse
     */
    public function __invoke(Request $request,CandidatManager $CandidatManager, CandidatHydrator $hydrator, String $id)
    {

        $data = $CandidatManager-> findOneById($id);
        $data =$hydrator->extract($data);
        return new JsonResponse($data);


    }
}
