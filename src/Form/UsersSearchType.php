<?php

namespace App\Form;

use App\Entity\UsersSearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UsersSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        //creer les champ Firstname , Lastname , Zipcode , City
        // modifier configuration option :
                // * 'method'=> 'get'
                // * 'csrf_token_manager'=>false [car c'est un GET pas un POST]
                 // * 'csrf_token_id'=>false [car c'est un GET pas un POST]

        //******  on la pagination dans le Controller "SearchController.php *****

        $builder

            ->add('zipcode', IntegerType::class, [
                'label'=> false,
                'required'=>false,
                'attr'=>[
                    'placeholder'=>'Search by Zipcode'
                ]
            ])

            ->add('city', TextType::class, [
                'label'=> false,
                'required'=>false,
                'attr'=>[
                    'placeholder'=>'Search by City'
                ]
            ])

        ;
    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => UsersSearch::class,
            'method' => 'get',
        ]);
    }

    // pour RACCOURSIR / EMBELLIR la requete URL
    public function getBlockPrefix()
    {
        return ''; // TODO: Change the autogenerated stub
    }
}
