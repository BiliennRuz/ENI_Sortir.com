<?php

namespace App\Form;

use App\Entity\Lieux;
use App\Entity\Participants;
use App\Entity\Sorties;
use App\Entity\Villes;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;



class SortiesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, array('attr' => array( 'class' => 'metro-input cell-7', 'placeholder' => 'nom'),'label' => "Nom de la sortie: "))
            ->add('datedebut', DateType::class, array('widget' => 'single_text', 'attr' => array('class' => 'metro-input cell-7'),'label' => "Date et heure de la sortie: "))
            ->add('duree', IntegerType::class, array('attr' => array('class' => 'metro-input cell-7', 'placeholder' => 'durée'),'label' => "Durée: "))
            ->add('datecloture', DateType::class, array('widget' => 'single_text','attr' => array('label' => 'Date de clôture', 'class' => 'metro-input cell-7'),'label' => "Date limite d'inscription: "))
            ->add('nbinscriptionsmax', IntegerType::class, array('attr' => array('class' => 'metro-input cell-7'),'label' => "Nombre de places:"))
            ->add('descriptioninfos', TextAreaType::class, array('attr' => array('class' => 'metro-input cell-10', 'placeholder' => "Description"),'label' => "Description et infos:"))
            ->add('lieuxNoLieu', EntityType::class, [
                'class' => Lieux::class,
                'choice_label' => 'nomLieu',
                'label' => "Lieu :",
                'attr' => array('class' => 'metro-input cell-6')
            ]);

            
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Sorties::class,
        ]);
    }
}
