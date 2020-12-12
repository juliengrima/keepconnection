<?php


namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
//    /**
//     * @Route("/")
//     */
    public function index(){

        return $this->render('default/index.html.twig');
    }

    public function downloads(){

        return $this->render('default/downloads.html.twig');
    }

    public function maintenance(){

        return $this->render('default/maintenance.html.twig');
    }

    public function whoAreWe(){

        return $this->render('default/whoarewe.html.twig');
    }

    public function charte(){

        return $this->render('default/charte.html.twig');
    }

    public function knowhow(){
        return $this->render('default/knowhow.html.twig');
    }

    public function services(){
        return $this->render('default/services.html.twig');
    }

    public function reference(){
        return $this->render('default/reference.html.twig');
    }
}