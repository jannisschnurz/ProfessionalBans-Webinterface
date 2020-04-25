<?php

namespace App\Form;

use App\Entity\Reasons;
use App\Repository\ReasonRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class BanType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Name', TextType::class, [
                'attr' => [
                    'class' => "form-control"
                ]
            ])
            ->add('Reason', EntityType::class, [
                'class' => Reasons::class,
                'choice_label' => 'reason',
                'attr' => [
                    'class' => 'form-control'
                ],
                'query_builder' => function (ReasonRepository $er) {
                    return $er->createQueryBuilder('r')
                        ->where('r.Type = 0');
                },
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Ban',
                'attr' => [
                    'class' => 'btn btn-primary'
                ]
            ])
        ;
    }

}
