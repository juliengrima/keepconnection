<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use Symfony\Component\Security\Core\User\UserInterface;
use EasyCorp\Bundle\EasyAdminBundle\Provider\AdminContextProvider;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

//    public function configureDashboard(): Dashboard
//    {
//        return Dashboard::new()
//            // the name visible to end users
//            ->setTitle('Keep Connection.')
//            // you can include HTML contents too (e.g. to link to an image)
//            ->setTitle('<img src="../../../public/pictures/logoKeep.png"> Keep Connection')
//
//            // the path defined in this method is passed to the Twig asset() function
//            ->setFaviconPath('favicon.svg')
//
//            // the domain used by default is 'messages'
//            ->setTranslationDomain('messages')
//
//            // there's no need to define the "text direction" explicitly because
//            // its default value is inferred dynamically from the user locale
//            ->setTextDirection('ltr')
//
//            // set this option if you prefer the page content to span the entire
//            // browser width, instead of the default design which sets a max width
//            ->renderContentMaximized()
//
//            // set this option if you prefer the sidebar (which contains the main menu)
//            // to be displayed as a narrow column instead of the default expanded design
//            ->renderSidebarMinimized()
//            ;
//    }
}
