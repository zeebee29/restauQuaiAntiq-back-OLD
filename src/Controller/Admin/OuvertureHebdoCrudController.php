<?php

namespace App\Controller\Admin;

use App\Entity\OuvertureHebdo;
use DateTimeImmutable;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class OuvertureHebdoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return OuvertureHebdo::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm()->hideOnIndex(),
            TextField::new('jourSemaine', 'Jour'),
            DateTimeField::new('h_ouverture', 'Heure Ouverture')->setFormat('HH:mm'),
            DateTimeField::new('h_fermeture', 'Heure Fermeture')->setFormat('HH:mm'),
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        // ...
        $actions->remove(Crud::PAGE_INDEX, Action::NEW);
        // ...
        return $actions;
    }
}
