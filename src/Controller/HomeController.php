<?php

namespace App\Controller;

use App\Entity\Subscriber;
use App\Form\SubscriberType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("subscriber", name="subscriber")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return RedirectResponse|Response
     */
    public function subscriber (Request $request, EntityManagerInterface $entityManager)
    {

        $subscriber = new Subscriber();

        $form = $this->createForm(SubscriberType::class, $subscriber,[
            'method' => 'POST'
        ]);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($subscriber);
            $entityManager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('partials/_form.html.twig',[
            'subscriber' => $form->createView(),
        ]);
    }
}
