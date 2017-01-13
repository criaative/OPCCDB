<?php

namespace SistemaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use SistemaBundle\Entity\Categorias;
use SistemaBundle\Entity\Produtos;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction()
    {
        return $this->render('SistemaBundle:Default:index.html.twig');
    }
    
         
}