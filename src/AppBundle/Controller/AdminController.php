<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    /**
     * @Route("/editar/{id}", name="adminEditar")
     */
    public function indexAdmin($id){
        return $this->render('editar.html.twig');
    }
}