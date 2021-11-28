<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Produto;
use AppBundle\Form\ProdutoDeleteType;
use AppBundle\Form\ProdutoType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    /**
     * @Route("/admin", name="admin",  methods={"GET"})
     */
    public function indexAction(Request $request)
    {
        $produtos = $this->getDoctrine()
            ->getRepository(Produto::class)
            ->findAllOrderedById();

        return $this->render('admin.html.twig', [
            'produtos'=>$produtos
        ]);
    }
}