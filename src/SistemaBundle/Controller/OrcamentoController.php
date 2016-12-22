<?php

namespace SistemaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class OrcamentoController extends Controller
{
    /**
     * @Route("/orcamento", name="orcamento")
     */
    public function indexAction()
    {
        return $this->render('SistemaBundle:Orcamento:index.html.twig');
    }    
}
