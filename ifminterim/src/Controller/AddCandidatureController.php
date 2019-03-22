<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use App\Hydrator\CandidatureHydrator;
use App\Manager\CandidaturesManager;
use App\Entity\Candidatures;


class AddCandidatureController extends AbstractController
{

    /**
     * @Route("/candidature/add", name="candidature_add", methods={"POST"})
     *  * @param Request $request
     * * @param CandidaturesManager $CandidaturesManager
     * @param CandidatureHydrator $CandidatureHydrator
     * @return JsonResponse
     */

    public function _invoke(Request $request, CandidaturesManager $CandidaturesManager, CandidatureHydrator $CandidatureHydrator)
    {


        $c = $CandidatureHydrator->hydrate(new Candidatures(),$request->request->all());

        /* if ($card->getEmail() !== null) {
             $card= $CardManager->findOneById($card->getEmail());
             $card = $CardHydrator->hydrate($card, $request->request->all());
         }
 */



        $CandidaturesManager->persist($c);


        return new JsonResponse($CandidatureHydrator->extract($c));

    }

}
