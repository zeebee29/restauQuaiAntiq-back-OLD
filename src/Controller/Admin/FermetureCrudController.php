<?php

namespace App\Controller\Admin;

use App\Entity\Fermeture;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class FermetureCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Fermeture::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm()->hideOnIndex(),
            TextField::new('commentaire', 'Libellé'),
            DateTimeField::new('debut_fermeture', '1er jour')->setFormat('dd/MM/YYYY'),
            DateTimeField::new('fin_fermeture', 'Dernier jour')->setFormat('dd/MM/YYYY'),
        ];
    }
}
