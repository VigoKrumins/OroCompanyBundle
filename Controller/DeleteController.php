<?php

namespace VigoKrumins\OroCompanyBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use VigoKrumins\OroCompanyBundle\Entity\Company;
use VigoKrumins\OroCompanyBundle\Entity\Employee;

/**
 * Class DeleteController.
 *
 * @author  Vigo Krumins <vigo.krumins@dmk-ebusiness.com>
 * @license http://www.gnu.org/licenses/lgpl.html
 *          GNU Lesser General Public License, version 3 or later
 *
 * @Route("/api/delete")
 */
class DeleteController extends Controller
{
    /**
     * @Route("/company/{id}/", name="vigokrumins_orocompany_company_delete")
     * @Method("DELETE")
     *
     * @param Company $company
     *
     * @return JsonResponse
     */
    public function deleteCompanyAction(Company $company): JsonResponse
    {
        $em = $this->getDoctrine()->getManagerForClass(Company::class);
        $em->remove($company);
        $em->flush();

        return new JsonResponse();
    }

    /**
     * @Route("/employee/{id}/", name="vigokrumins_orocompany_employee_delete")
     * @Method("DELETE")
     *
     * @param Employee $employee
     *
     * @return JsonResponse
     */
    public function deleteEmployeeAction(Employee $employee): JsonResponse
    {
        $em = $this->getDoctrine()->getManagerForClass(Employee::class);
        $em->remove($employee);
        $em->flush();

        return new JsonResponse();
    }
}
