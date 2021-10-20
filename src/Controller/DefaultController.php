<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->render('base.html.twig', []);
    }

    /**
     * @Route("/cv", name="cv")
     */
    public function download()
    {
        $file = new File('../public/documents/CV_Jerome_Farin.pdf');

        return $this->file($file);
    }
}
