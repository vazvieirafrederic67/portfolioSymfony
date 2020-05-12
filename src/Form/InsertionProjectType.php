<?php

namespace App\Form;

use App\Entity\Project;
use App\Entity\Skill;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class InsertionProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label_attr'=>['class'=> 'red-bg', 'style'=> 'color : black'],
                'attr' => ['placeholder' => 'project name']
            ])
            ->add('description', TextType::class, [
                'label_attr'=>['class'=> 'red-bg', 'style'=> 'color : black'],
                'attr' => ['placeholder' => 'description']
            ])
            ->add('image', FileType::class, ['mapped'=>false, 'required' =>false], 
            [
                'label_attr'=>['class'=> 'red-bg', 'style'=> 'color : black'],
                'attr' => ['placeholder' => 'image']
            ])
            ->add('skills', EntityType::class, [
                'class' => Skill::class,
                'multiple'=>true,
                'expanded'=>true,
                'label_attr'=>['class'=> 'red-bg', 'style'=> 'color : black'],
                'choice_label' => 'name',
                'attr'=>['class'=>'row m-4 d-flex justify-content-around','style'=>'color : black']
            ])
            ->add('save', SubmitType::class);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
