<?php

namespace App\Controller\Admin;

use App\Entity\Categorie;
use App\Entity\Menu;
use App\Entity\Plat;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public function __construct(private AdminUrlGenerator $adminUrlGenerator)
    {
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator->setController(CategorieCrudController::class)->generateUrl();

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Administtration - Le Quai Antique');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('Menus');
        yield MenuItem::subMenu('Actions', 'fas fa_bars')->setSubItems([
            MenuItem::linkToCrud('Création MenuPlat', 'fas fa-plus', Menu::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Modifier Menu', 'fas fa-eye', Menu::class)
        ]);
        yield MenuItem::section('Plats');
        yield MenuItem::subMenu('Actions', 'fas fa_bars')->setSubItems([
            MenuItem::linkToCrud('Création Plat', 'fas fa-plus', Plat::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Modifier Plat', 'fas fa-eye', Plat::class)
        ]);
        yield MenuItem::section('Catégories');
        yield MenuItem::subMenu('Actions', 'fas fa_bars')->setSubItems([
            MenuItem::linkToCrud('Création Catégorie', 'fas fa-plus', Categorie::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Modifier Catégorie', 'fas fa-eye', Categorie::class)
        ]);
    }
}
