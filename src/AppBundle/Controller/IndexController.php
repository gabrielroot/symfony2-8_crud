<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Produto;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $produtos = $this->getDoctrine()
            ->getRepository(Produto::class)
            ->findAllOrderedById();

        return $this->render('index.html.twig', ['produtos'=>$produtos]);
    }
}
