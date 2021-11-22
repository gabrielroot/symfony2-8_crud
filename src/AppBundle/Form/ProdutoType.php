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
                    'years' => [
                        '2010',
                        '2011',
                        '2012',
                        '2013',
                        '2014',
                        '2015',
                        '2016',
                        '2017',
                        '2018',
                        '2019',
                        '2020',
                        '2021'
                    ],
                    'format'=> 'ddMMyyyy',
                    'attr'=>['class'=>'inptData']
                ]
            )

            ->add('valor', NumberType::class,
                [
                    'invalid_message' => 'O valor inserido não é valido',
                    'scale' => 2,
                    'label' => 'R$ Valor',
                    'attr'=>['class'=>'inptValor']
                ]
            )

            ->add('delete', SubmitType::class,
                [
                    'label' => 'Remover',
                    'validation_groups' => false,
                    'attr' => ['class' => 'btnDelete']
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