<?php

namespace SistemaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="painel")
     */
    public function indexAction()
    {
        return $this->render('SistemaBundle:Default:index.html.twig');
    }
}