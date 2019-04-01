<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Restaurants;

class RestaurantController extends AbstractController
{

    public function __constructor()
    { }
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $id = 1;
        $repo = $this->getDoctrine()->getRepository(Restaurants::class);
        $restaurant = $repo->find($id);
        return $this->render('restaurant/index.html.twig', [
            'controller_name' => 'RestaurantController',
            'restaurant' => $restaurant,
        ]);
    }
    /**
     * @Route("/le-menu", name="menu")
     */
    public function menu()
    {
        return $this->render('restaurant/menu.html.twig');
    }

    /**
     * @Route("/la-carte", name="card")
     */
    public function card()
    {
        return $this->render('restaurant/card.html.twig');
    }

    /**
     * @Route("/votre_panier", name="cart")
     */
    public function cart()
    {
        return $this->render('restaurant/cart.html.twig');
    }

    /**
     * @Route ("/news & evenements", name="event")
     */
    public function event()
    {
        return $this->render('restaurant/event.html.twig');
    }

    /**
     * @Route ("/reservation", name="booking")
     */
    public function booking()
    {
        return $this->render('restaurant/booking.html.twig');
    }

    /**
     * @Route ("/contact", name="contact")
     */
    public function contact()
    {
        return $this->render('restaurant/contact.html.twig');
    }

    /**
     * @Route ("/connexion", name="sign")
     */
    public function sign()
    {
        return $this->render('restaurant/sign.html.twig');
    }
}
