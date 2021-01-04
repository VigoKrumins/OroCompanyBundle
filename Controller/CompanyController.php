<?php

namespace VigoKrumins\OroCompanyBundle\Controller;

use Oro\Bundle\FormBundle\Model\UpdateHandlerFacade;
use Oro\Bundle\SecurityBundle\Annotation\Acl;
use Oro\Bundle\SecurityBundle\Annotation\AclAncestor;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use VigoKrumins\OroCompanyBundle\Entity\Company;
use VigoKrumins\OroCompanyBundle\Form\Type\CompanyType;

/**
 * Class CompanyController.
 *
 * @author  Vigo Krumins <vigo.krumins@dmk-ebusiness.com>
 * @license http://www.gnu.org/licenses/lgpl.html
 *          GNU Lesser General Public License, version 3 or later
 *
 * @Route("/company")
 */
class CompanyController
{
    /** @var UpdateHandlerFacade  */
    private $updateHandlerFacade;

    /** @var TranslatorInterface  */
    private $translator;

    /** @var FormFactoryInterface  */
    private $formFactory;

    /**
     * CompanyController constructor.
     *
     * @param UpdateHandlerFacade $updateHandlerFacade
     * @param TranslatorInterface $translator
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(
        UpdateHandlerFacade $updateHandlerFacade,
        TranslatorInterface $translator,
        FormFactoryInterface $formFactory
    ) {
        $this->updateHandlerFacade = $updateHandlerFacade;
        $this->translator = $translator;
        $this->formFactory = $formFactory;
    }

    /**
     * @Route("/", name="vigokrumins_orocompany_company_index")
     * @AclAncestor("vigokrumins_orocompany_company_view")
     *
     * @Template("@OroCompany/Company/index.html.twig")
     *
     * @return array
     */
    public function indexAction(): array
    {
        return [];
    }

    /**
     * @Route("/view/{id}", name="vigokrumins_orocompany_company_view", requirements={"id"="\d+"})
     * @Acl(
     *     id="vigokrumins_orocompany_company_view",
     *     type="entity",
     *     permission="VIEW",
     *     class="OroCompanyBundle:Company"
     * )
     *
     * @Template("@OroCompany/Company/view.html.twig")
     *
     * @param Company $company
     *
     * @return Company[]
     */
    public function viewAction(Company $company): array
    {
        return [
            'entity' => $company,
        ];
    }

    /**
     * @Route("/create", name="vigokrumins_orocompany_company_create")
     * @Acl(
     *     id="vigokrumins_orocompany_company_create",
     *     type="entity",
     *     permission="CREATE",
     *     class="OroCompanyBundle:Company"
     * )
     *
     * @Template("@OroCompany/Company/update.html.twig")
     */
    public function createAction()
    {
        return $this->update(new Company());
    }

    /**
     * @Route("/update/{id}", name="vigokrumins_orocompany_company_update", requirements={"id"="\d+"})
     * @AclAncestor("vigokrumins_orocompany_company_view")
     * @Template
     *
     * @param Company $company
     *
     * @return array
     */
    public function updateAction(Company $company): array
    {
        return $this->update($company);
    }

    /**
     * @Route("/widget/employees/{id}", name="vigokrumins_orocompany_company_widget_employees", requirements={"id"="\d+"})
     * @AclAncestor("vigokrumins_orocompany_company_view")
     * @Template("@OroCompany/Company/widget/employee.html.twig")
     *
     * @param Company $company
     *
     * @return Company[]
     */
    public function employeeAction(Company $company): array
    {
        return [
            'entity' => $company,
        ];
    }

    /**
     * @param Company $company
     *
     * @return array|RedirectResponse
     */
    protected function update(Company $company)
    {
        return $this->updateHandlerFacade->update(
            $company,
            $this->formFactory->create(CompanyType::class, $company),
            $this->translator->trans('vigokrumins.orocompany.company.saved_message')
        );
    }
}
