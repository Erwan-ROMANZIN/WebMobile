<?php

namespace App\DataFixtures;

use App\Entity\Offre;
use App\Entity\Candidatures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;
        $this->loadOfrre();
        $this->loadCandidature();
    }

    private function loadOfrre()
    {
        for($i =1; $i < 20; $i++) {
            $offre = (new Offre())
                ->setNomEnt('LuTriEr'.$i)
                ->setPoste('Developpeur web '.$i)
                ->setCodePostal('570' + mt_rand(10,99))
                ->setVille('Metz')
                ->setPresentation($i.'Post emensos insuperabilis expeditionis eventus languentibus partium animis, quas periculorum varietas fregerat et laborum, nondum tubarum cessante clangore vel milite locato per stationes hibernas, fortunae saevientis procellae tempestates alias rebus infudere communibus per multa illa et dira facinora Caesaris Galli, qui ex squalore imo miseriarum in aetatis adultae primitiis ad principale culmen insperato saltu provectus ultra terminos potestatis delatae procurrens asperitate nimia cuncta foedabat. propinquitate enim regiae stirpis gentilitateque etiam tum Constantini nominis efferebatur in fastus, si plus valuisset, ausurus hostilia in auctorem suae felicitatis, ut videbatur.')
                ->setActivite($i.'Post emensos insuperabilis expeditionis eventus languentibus partium animis, quas periculorum varietas fregerat et laborum, nondum tubarum cessante clangore vel milite locato per stationes hibernas, fortunae saevientis procellae tempestates alias rebus infudere communibus per multa illa et dira facinora Caesaris Galli, qui ex squalore imo miseriarum in aetatis adultae primitiis ad principale culmen insperato saltu provectus ultra terminos potestatis delatae procurrens asperitate nimia cuncta foedabat. propinquitate enim regiae stirpis gentilitateque etiam tum Constantini nominis efferebatur in fastus, si plus valuisset, ausurus hostilia in auctorem suae felicitatis, ut videbatur.')
                ->setSurLePoste($i.'Post emensos insuperabilis expeditionis eventus languentibus partium animis, quas periculorum varietas fregerat et laborum, nondum tubarum cessante clangore vel milite locato per stationes hibernas, fortunae saevientis procellae tempestates alias rebus infudere communibus per multa illa et dira facinora Caesaris Galli, qui ex squalore imo miseriarum in aetatis adultae primitiis ad principale culmen insperato saltu provectus ultra terminos potestatis delatae procurrens asperitate nimia cuncta foedabat. propinquitate enim regiae stirpis gentilitateque etiam tum Constantini nominis efferebatur in fastus, si plus valuisset, ausurus hostilia in auctorem suae felicitatis, ut videbatur.')
                ->setPhoto('assets/imgs/logo');
            $this->manager->persist($offre);
        }
        $this->manager->flush();
    }

    private function loadCandidature()
    {
        for($i =1; $i < 20; $i++) {
            $candidature = (new Candidatures())
                ->setIdCandidat($i)
                ->setIdOffre($i);
            $this->manager->persist($candidature);
        }
        $this->manager->flush();
    }
}
