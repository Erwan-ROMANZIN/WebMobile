<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use App\Entity\Candidatures;
use App\Hydrator\CandidatureHydrator;
use App\Manager\CandidaturesManager;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class GetCandidatureController extends AbstractController
{
    /**
     * @Route("/candidature/{id}", name="get_candidature")
     * @param Request $request
     * @param CandidaturesManager $CandidaturesManager
     * @param CandidatureHydrator $hydrator
     * @return JsonResponse
     */
    public function __invoke(Request $request,CandidaturesManager $CandidaturesManager, CandidatureHydrator $hydrator, String $id)
    {

        $data = $CandidaturesManager-> findOneById($id);
        $data =$hydrator->extract($data);
        return new JsonResponse($data);


    }
}
