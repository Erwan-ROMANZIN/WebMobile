<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Hydrator\CandidatHydrator;
use App\Manager\CandidatManager;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DeleteCandidatController extends AbstractController
{
    /**
     * @Route("/delete/candidat/{id}", name="delete_candidat", methods={"DELETE"});
     * @param Request $request
     * * @param CandidatManager $CandidatManager
     * @param CandidatHydrator $CandidatHydrator
     * @return JsonResponse
     */
    public function _invoke(Request $request, CandidatManager $CandidatManager, CandidatHydrator $CandidatHydrator, String $id)
    {
        $c=$CandidatManager->findOneById($id);
        $CandidatManager->delete($c);

        return new JsonResponse($CandidatHydrator->extract($c));
    }
}
