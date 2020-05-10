<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Techno;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InsertionTechnoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label_attr'=>['class'=> 'red-bg', 'style'=> 'color : white'],
                'attr' => ['placeholder' => 'techno name']
            ])
            ->add('image', TextType::class, [
                'label_attr'=>['class'=> 'red-bg', 'style'=> 'color : white'],
                'attr' => ['placeholder' => 'image']
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'label_attr'=>['class'=> 'red-bg', 'style'=> 'color : white'],
                'choice_label' => 'name'
            ])
            ->add('save', SubmitType::class);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Techno::class,
        ]);
    }
}
