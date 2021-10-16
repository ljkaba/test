<?php 

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use App\Entity\Users;


class UserCrudController extends AbstractCrudController
{

    public static function getEntityFqcn() : string
    {
        return Users::class;
    }
}