<?php

namespace SubspaceUser\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('subspace-user/signup.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }


    /**
     * Matches /locations exactly
     *
     * @Route("/locations")
     */

    public function locationsAction(Request $request)
    {
        return $this->render('subspace-user/locations.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * Matches /tour exactly
     *
     * @Route("/tour")
     */

    public function tourAction(Request $request)
    {
        return $this->render('subspace-user/tour.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * Matches /pricing exactly
     *
     * @Route("/pricing")
     */

    public function pricingAction(Request $request)
    {
        return $this->render('subspace-user/pricing.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * Matches /login exactly
     *
     * @Route("/login")
     */

    public function loginAction(Request $request)
    {
        return $this->render('subspace-user/login.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
}
