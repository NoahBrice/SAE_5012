<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\Admin\UserCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use App\Entity\Bloc;
use App\Entity\Commentaire;
use App\Entity\DataSet;
use App\Entity\Mail;
use App\Entity\Page;
use App\Entity\Reaction;
use App\Entity\Site;
use App\Entity\Statistique;
use App\Entity\Theme;
use App\Entity\TypeBloc;
use App\Entity\TypeGraphique;
use App\Entity\User;
class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(UserCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        return $this->render('/MenuCrud.html.twig');
    }
  
    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('SAE 5012');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Blocs', 'fas fa-list', Bloc::class);
        yield MenuItem::linkToCrud('Commentaires', 'fas fa-list', Commentaire::class);
        yield MenuItem::linkToCrud('Data Sets', 'fas fa-list', DataSet::class);
        yield MenuItem::linkToCrud('Mails', 'fas fa-list', Mail::class);
        yield MenuItem::linkToCrud('Pages', 'fas fa-list', Page::class);
        yield MenuItem::linkToCrud('Reactions', 'fas fa-list', Reaction::class);
        yield MenuItem::linkToCrud('Sites', 'fas fa-list', Site::class);
        yield MenuItem::linkToCrud('Statistiques', 'fas fa-list', Statistique::class);
        yield MenuItem::linkToCrud('Themes', 'fas fa-list', Theme::class);
        yield MenuItem::linkToCrud('Type de blocs', 'fas fa-list', TypeBloc::class);
        yield MenuItem::linkToCrud('Type de graphique', 'fas fa-list', TypeGraphique::class);
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-list', User::class);
    }
}
