<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Produto;
use AppBundle\Form\ProdutoType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProdutoController extends Controller
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
     * @Route("/show/{id}", name="showProduto")
     */
    public function showAction(Request $request, $id)
    {
        $produto = $this->getDoctrine()
            ->getRepository(Produto::class)
            ->findOneBy(['id'=>$id]);
        return $this->render('produtoShow.html.twig', ['produto'=>$produto]);
    }

    /**
     * @Route("/editar/{id}", name="produtoUpdate", methods={"GET", "POST"})
     */
    public function updateAction(Request $request, $id){

        $produto =  $this->getDoctrine()
            ->getRepository(Produto::class)
            ->findOneBy(['id'=>$id]);

        $formEdit = $this->createForm(ProdutoType::class, $produto);
        $formEdit->handleRequest($request);

        $formDelete = $this->createFormBuilder($produto)
            ->setAction($this->generateUrl('produtoDelete', ['id'=>$produto->getId()]))
            ->setMethod('DELETE')
            ->add('delete', SubmitType::class,
                [
                    'label' => 'Remover',
                    'validation_groups' => false,
                    'attr' => ['class' => 'btnDelete']
                ]
            )
            ->getForm();
        $formDelete->handleRequest($request);

        if($formEdit->isSubmitted() && $formEdit->isValid()){
            $entityManager = $this->getDoctrine()->getManager();

            $produto = $formEdit->getData();
            $entityManager->merge($produto);

            $entityManager->flush();
            return $this->redirectToRoute('homepage');
        }

        return $this->render('produtoEditar.html.twig', [
            'id'=>$produto->getId(),
            'formEdit' => $formEdit->createView(),
            'formDelete' => $formDelete->createView()
        ]);
    }

    /**
     * @Route("/deletar/{id}", name="produtoDelete", methods={"DELETE"})
     */
    public function deleteAction(Request $request, $id){

        $produto =  $this->getDoctrine()
            ->getRepository(Produto::class)
            ->findOneBy(['id'=>$id]);

        $entityManager = $this->getDoctrine()
            ->getManager();

        $entityManager->remove($produto);
        $entityManager->flush();

        return $this->redirectToRoute('homepage');
    }

    /**
     * @Route("/novo", name="produtoCreate")
     */
    public function createAction(Request $request){
        $produto =  new Produto();

        $form = $this->createForm(ProdutoType::class, $produto);
        $form->handleRequest($request);

        $formDelete = $this->createFormBuilder($produto)
            ->add('delete', SubmitType::class,
                [
                    'label' => 'Remover',
                    'validation_groups' => false,
                    'attr' => ['class' => 'btnDelete']
                ]
            )
            ->getForm();
        $formDelete->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $entityManager = $this->getDoctrine()->getManager();

            $produto = $form->getData();

            $entityManager->persist($produto);
            $entityManager->flush();

            return $this->redirectToRoute('homepage');
        }

        return $this->render('produtoCriar.html.twig', [
            'formNovo' => $form->createView()
        ]);
    }
}