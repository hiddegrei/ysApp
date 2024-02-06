<?php

namespace App\Form;

use App\Entity\Blog;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints as Assert;

class ValidationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
       
        $builder
            ->add('email', TextType::class, [
                'attr'=>array(
                    'class'=>'bg-transparent block border-b-2 w-full h-20 text-6xl outline-none ',
                    'placeholder'=>'Enter email to be validated..'
                ),
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter an email',
                    ])
                    ,
                    new Length([
                        'min' => 3,
                        'minMessage' => 'Your email should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 320,
                    ]),
                ],
                
                'required'=>true
            ])
            ->add('likes', TextType::class, [
                'attr'=>array(
                    'class'=>'bg-transparent block border-b-2 w-full h-20 text-6xl outline-none ',
                    'placeholder'=>'Enter likes to be validated..'
                ),
                'constraints' => [
                new Assert\Type([
                    'type' => 'integer',
                    'message' => 'The value {{ value }} is not a valid {{ type }}.',
                ])],
                
                'required'=>true
            ])
            ->add('reposts', TextType::class, [
                'attr'=>array(
                    'class'=>'bg-transparent block border-b-2 w-full h-20 text-6xl outline-none ',
                    'placeholder'=>'Enter reposts to be validated..'
                ),
                
                'required'=>true
            ])
            ->add('views', TextType::class, [
                'attr'=>array(
                    'class'=>'bg-transparent block border-b-2 w-full h-20 text-6xl outline-none ',
                    'placeholder'=>'Enter reposts to be validated..'
                ),
                
                'required'=>true
            ])
           
           
            
           
        ;
    }

   
}
