<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 30/11/2018
 * Time: 15:05
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Hydrator\CandidatHydrator;
use App\Manager\CandidatManager;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetAllCandidatsController extends AbstractController
{

    /**
     * Get all Candidat
     * @Route(path="/candidat/all", methods={"GET"}, name="get_candidats")
     * @param Request $request
     * @param CandidatManager $CandidatManager
     * @param CandidatHydrator $hydrator
     * @return JsonResponse
     */
    public function __invoke(Request $request,CandidatManager $CandidatManager, CandidatHydrator $hydrator)
    {
        $data = $CandidatManager->findAll();
        $data = array_map([$hydrator, 'extract'], $data);

        return new JsonResponse($data);
    }

}