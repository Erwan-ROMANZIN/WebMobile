<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use App\Hydrator\CandidatHydrator;
use App\Manager\CandidatManager;
use App\Entity\Candidat;


class AddCandidatController extends AbstractController
{

    /**
     * @Route("/candidat/add", name="candidat_add", methods={"POST"})
     *  * @param Request $request
     * * @param CandidatManager $CandidatManager
     * @param CandidatHydrator $CandidatHydrator
     * @return JsonResponse
     */

    public function _invoke(Request $request, CandidatManager $CandidatManager, CandidatHydrator $CandidatHydrator)
    {


        $c = $CandidatHydrator->hydrate(new Candidat(),$request->request->all());

        /* if ($card->getEmail() !== null) {
             $card= $CardManager->findOneById($card->getEmail());
             $card = $CardHydrator->hydrate($card, $request->request->all());
         }
 */



        $CandidatManager->persist($c);


        return new JsonResponse($CandidatHydrator->extract($c));

    }

}
