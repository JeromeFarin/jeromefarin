<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request, \Swift_Mailer $mailer)
    {
        $form = $this->createForm(ContactType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $message = (new \Swift_Message($form->getData()->getSubject()))
                ->setFrom($form->getData()->getEmail())
                ->setTo('j.farin38@gmail.com')
                ->setBody(
                    $this->render(
                        'email/request.html.twig',
                        [
                            'username' => $form->getData()->getUsername(),
                            'message' => $form->getData()->getMessage()
                        ]
                        ),
                        'text/html'
                )
            ;

            if ($mailer->send($message)) {
                $this->addFlash('success', 'Email envoyé');
            } else {
                $this->addFlash('error', 'L\'envoi de l\'email a échoué, merci de réessayer ou de contacter l\'administrateur');
            }

        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
