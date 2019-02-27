<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class EstExtType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ces')
            ->add('nombre')
            ->add('apell1')
            ->add('apell2')
            ->add('sexo',ChoiceType::class, array(
                "choices"=> array(
                    "" => "",
                    "F" => "F",
                    "M" => "M"
                )
            ))
            ->add('bajas')
            ->add('licencias')
            ->add('altas')
            ->add('codigoCarrera')
            ->add('annoEstudio',ChoiceType::class, array(
                "choices"=> array(
                    "" => "",
                    "1" => "1",
                    "2" => "2",
                    "3" => "3",
                    "4" => "4",
                    "5" => "5"
                )
            ))
            ->add('observaciones')
            ->add('tipoEst')
            ->add('pais')
            ->add('carrera')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\EstExt'
        ));
    }
}
