<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DatafetchController extends AbstractController
{
    /**
     * @Route("/datafetch", name="datafetch")
     */
    public function index()
    {
        return $this->render('datafetch/index.html.twig', [
            'controller_name' => 'DatafetchController',
        ]);
    }
}
