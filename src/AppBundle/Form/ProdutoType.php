<?php

namespace AppBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProdutoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome', TextType::class,
                [
                    'attr'=>['class'=>'inptNome']
                ]
            )

            ->add('dataCompra', DateType::class,
                [
                    'label' => 'Data de Compra',
                    'attr'=>['class'=>'inptData']
                ]
            )

            ->add('valor', NumberType::class,
                [
                    'invalid_message' => 'O valor inserido não é valido',
                    'label' => 'R$ Valor',
                    'attr'=>['class'=>'inptValor']
                ]
            )

            ->add('submit', SubmitType::class,
                [
                    'label' => 'Salvar',
                    'attr' => ['class' => 'btnSubmit']
                ]
            )
        ;
    }
}