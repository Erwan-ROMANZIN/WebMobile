<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 30/11/2018
 * Time: 15:05
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Hydrator\CandidatureHydrator;
use App\Manager\CandidaturesManager;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetAllCandidaturesController extends AbstractController
{

    /**
     * Get all Candidat
     * @Route(path="/candidatures/all", methods={"GET"}, name="get_candidatures")
     * @param Request $request
     * @param CandidaturesManager $CandidaturesManager
     * @param CandidatureHydrator $hydrator
     * @return JsonResponse
     */
    public function __invoke(Request $request,CandidaturesManager $CandidaturesManager, CandidatureHydrator $hydrator)
    {
        $data = $CandidaturesManager->findAll();
        $data = array_map([$hydrator, 'extract'], $data);

        return new JsonResponse($data);
    }

}