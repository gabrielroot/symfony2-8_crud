<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Produto;
use AppBundle\Form\ProdutoType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
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

    /**
     * @Route("/editar/{id}", name="adminEditar")
     */
    public function adminEditar(Request $request, $id){

        $produto =  $this->getDoctrine()
            ->getRepository(Produto::class)
            ->findOneBy(['id'=>$id]);

        $form = $this->createForm(ProdutoType::class, $produto);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $entityManager = $this->getDoctrine()->getManager();

            if($form->get('delete')->isClicked()){
                $entityManager->remove($produto);
            }else{
                $produto = $form->getData();
                $entityManager->merge($produto);
            }

            $entityManager->flush();
            return $this->redirectToRoute('homepage');
        }

        return $this->render('editar.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/novo", name="adminCriar")
     */
    public function adminCriar(Request $request){
        $produto =  new Produto();

        $form = $this->createForm(ProdutoType::class, $produto);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $entityManager = $this->getDoctrine()->getManager();

            $produto = $form->getData();

            $entityManager->persist($produto);
            $entityManager->flush();

            return $this->redirectToRoute('homepage');
        }

        return $this->render('editar.html.twig', [
            'form' => $form->createView()
        ]);
    }
}