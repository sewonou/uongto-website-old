<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AdminAccountController extends AbstractController
{
    #[Route('/admin/login', name: 'admin_login')]
    public function index(AuthenticationUtils $utils): Response
    {
        return $this->render('admin/account/login.html.twig', [

        ]);
    }

    #[Route('/admin/logout', name: 'admin_logout')]
    /**
     * @return  void
     */
    public function logout()
    {

    }
}
