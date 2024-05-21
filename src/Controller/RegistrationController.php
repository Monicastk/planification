<?php

namespace App\Controller;

use App\Form\RegistrationType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Psr\EventDispatcher\EventDispatcherInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class RegistrationController extends AbstractController
{
    #[Route('/inscription', name: 'app_registration')]
    public function subscribe(Request $request , EntityManagerInterface $em,EventDispatcherInterface $dispatcher): Response
    {
        $registration = new Reg
        return $this->render('index/registration.html.twig', [
            'controller_name' => 'Inscription',
        ]);
    }

    #[Route('/login', name: 'app_login')]
    public function login(): Response
    {
        return $this->render('index/login.html.twig', [
            'controller_name' => 'Login',    
        ]);
    }
}

