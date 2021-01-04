<?php


namespace VigoKrumins\OroCompanyBundle\Controller;

use Oro\Bundle\FormBundle\Model\UpdateHandlerFacade;
use Oro\Bundle\SecurityBundle\Annotation\Acl;
use Oro\Bundle\SecurityBundle\Annotation\AclAncestor;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use VigoKrumins\OroCompanyBundle\Entity\Employee;
use VigoKrumins\OroCompanyBundle\Form\Type\EmployeeType;

/**
 * Class EmployeeController.
 *
 * @author  Vigo Krumins <vigo.krumins@dmk-ebusiness.com>
 * @license http://www.gnu.org/licenses/lgpl.html
 *          GNU Lesser General Public License, version 3 or later
 *
 * @Route("/employee")
 */
class EmployeeController
{
    /** @var UpdateHandlerFacade */
    private $updateHandlerFacade;

    /** @var TranslatorInterface */
    private $translator;

    /** @var FormFactoryInterface */
    private $formFactory;

    /**
     * EmployeeController constructor.
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
     * @Route("/", name="vigokrumins_orocompany_employee_index")
     * @Acl(
     *     id="vigokrumins_orocompany_employee_view",
     *     type="entity",
     *     permission="VIEW",
     *     class="OroCompanyBundle:Employee"
     * )
     *
     * @Template
     *
     * @return array
     */
    public function indexAction()
    {
        return [];
    }

    /**
     * @Route("/view/{id}", name="vigokrumins_orocompany_employee_view", requirements={"id"="\d+"})
     * @Acl(
     *     id="vigokrumins_orocompany_employee_view",
     *     type="entity",
     *     permission="VIEW",
     *     class="OroCompanyBundle:Employee"
     * )
     *
     * @Template("@OroCompany/Employee/view.html.twig")
     *
     * @param Employee $employee
     *
     * @return Employee[]
     */
    public function viewAction(Employee $employee): array
    {
        return [
            'entity' => $employee,
        ];
    }

    /**
     * @Route("/create", name="vigokrumins_orocompany_employee_create")
     * @Acl(
     *     id="vigokrumins_orocompany_employee_create",
     *     type="entity",
     *     permission="CREATE",
     *     class="OroCompanyBundle:Employee"
     * )
     *
     * @Template("@OroCompany/Employee/update.html.twig")
     *
     * @return mixed
     */
    public function createAction()
    {
        return $this->update(new Employee());
    }

    /**
     * @Route("/update/{id}", name="vigokrumins_orocompany_employee_update", requirements={"id"="\d+"})
     * @AclAncestor("vigokrumins_orocompany_employee_view")
     *
     * @Template
     *
     * @param Employee $employee
     */
    public function updateAction(Employee $employee)
    {
        return $this->update($employee);
    }

    /**
     * @param Employee $employee
     */
    protected function update(Employee $employee)
    {
        return $this->updateHandlerFacade->update(
            $employee,
            $this->formFactory->create(EmployeeType::class, $employee),
            $this->translator->trans('vigokrumins.orocompany.employee.saved_message')
        );
    }
}
