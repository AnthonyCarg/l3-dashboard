<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Entity\Projet;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class FicheType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('projetEx', EntityType::class, array(
            "label"=>"Nom du projet", 
            'class' => Projet::class, 
            'query_builder' => function (EntityRepository $er) {
                //return $er->createQueryBuilder('p')
                //->where('p.dateEnd >= :date')
                //->setParameter('date', new \DateTime())        
                //;
                //Equivalent
                return $er->getOpenedProjects();
            },
            ))->add('date')->add('nbJoursFait')->add('nbJoursVendus')->add('pourcentAvancement')->add('manager')->add('comment');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Fiche'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_fiche';
    }


}
