<?php

namespace App\Controller;

use App\Entity\Registration;
use App\Form\RegistrationType;
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
        $registration = new Registration();

        $form = $this->createForm(RegistrationType::class, $registration);
     
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            
        }

        return $this->render('index/registration.html.twig', [
            'controller_name' => 'Inscription',
            'form' => $form
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

