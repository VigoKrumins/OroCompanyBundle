<?php

namespace VigoKrumins\OroCompanyBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use VigoKrumins\OroCompanyBundle\Entity\Company;

class CompanyType extends AbstractType
{
    /** @var string */
    const LABEL_PREFIX = 'vigokrumins.orocompany.company.';

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'vigokrumins_orocompany_company';
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'name',
                TextType::class,
                [
                    'label' => self::LABEL_PREFIX . 'name.label',
                ]
            )
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class' => Company::class]);
    }
}
