<?php

namespace App\Form;

use App\Entity\Menu;
use App\Entity\Page;
use App\Entity\Type;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MenuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, )
            ->add('type', EntityType::class, [
                'class' => Type::class,
                'choice_label' => 'title'
            ])
            ->add('page', EntityType::class, [
                'class' => Page::class,
                'choice_label' => 'displayName'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Menu::class,
        ]);
    }
}
