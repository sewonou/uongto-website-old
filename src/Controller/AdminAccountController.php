<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminAccountController extends AbstractController
{
    #[Route('/admin-panel/login', name: 'admin_login')]
    public function index(): Response
    {
        return $this->render('admin/account/login.html.twig', [

        ]);
    }
}
