<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Hydrator\CandidatHydrator;
use App\Manager\CandidatManager;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class UpdateCandidatController extends AbstractController
{
    /**
     * @Route("/update/candidat", name="update_candidat", methods={"PUT"})
     *  @param Request $request
     * @param CandidatManager $CandidatManager
     * @param CandidatHydrator $CandidatHydrator
     * @return JsonResponse
     */
    public function _invoke(Request $request, CandidatManager $CandidatManager, CandidatHydrator $CandidatHydrator)
    {


        $c = $CandidatManager->findOneById($request->request->get("id"));

        $c = $CandidatHydrator->hydrate($c, $request->request->all());

        $CandidatManager->persist($c);


        return new JsonResponse($CandidatHydrator->extract($c));

    }}
