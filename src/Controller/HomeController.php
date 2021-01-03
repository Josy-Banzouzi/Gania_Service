<?php

namespace App\Controller;

use App\Entity\Abonner;
use App\Form\AbonnerType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HomeController
 * @package App\Controller
 */
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
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return RedirectResponse|Response
     * @Route("subcriber", name="subscriber")
     */
    public function abonner(Request $request, EntityManagerInterface $entityManager){
        $abonner = new Abonner();

        $form = $this->createForm(AbonnerType::class, $abonner,[
            'method' => 'POST'
        ]);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($abonner);
            $entityManager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('partials/_footer.html.twig',[
            'abonnerForm' => $form->createView(),
        ]);
    }
}
