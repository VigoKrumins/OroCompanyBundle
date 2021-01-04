<?php

namespace VigoKrumins\OroCompanyBundle\Form\Type;

use Oro\Bundle\FormBundle\Form\Type\OroEntitySelectOrCreateInlineType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use VigoKrumins\OroCompanyBundle\Entity\Employee;

class EmployeeType extends AbstractType
{
    /** @var string */
    const LABEL_PREFIX = 'vigokrumins.orocompany.employee.';

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'vigokrumins_orocompany_employee';
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'firstName',
                TextType::class,
                [
                    'label' => self::LABEL_PREFIX . 'first_name.label',
                    'required' => true,
                ]
            )
            ->add(
                'lastName',
                TextType::class,
                [
                    'label' => self::LABEL_PREFIX . 'last_name.label',
                    'required' => true,
                ]
            )
            ->add(
                'company',
                OroEntitySelectOrCreateInlineType::class,
                [
                    'required' => true,
                    'autocomplete_alias' => 'vigokrumins_orocompany_company',
                    'create_enabled' => false,
                    'grid_name' => 'vigokrumins-orocompany-company-grid',
                    'configs' => [
                        'placeholder' => 'vigokrumins.orocompany.company.form.placeholder.choose',
                    ]
                ]
            )
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class' => Employee::class]);
    }
}
