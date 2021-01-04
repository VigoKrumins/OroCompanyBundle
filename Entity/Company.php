<?php

declare(strict_types=1);

namespace VigoKrumins\OroCompanyBundle\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Oro\Bundle\EntityBundle\EntityProperty\DatesAwareInterface;
use Oro\Bundle\EntityBundle\EntityProperty\DatesAwareTrait;
use Oro\Bundle\EntityConfigBundle\Metadata\Annotation\Config;
use Symfony\Component\Validator\Constraints as Assert;
use VigoKrumins\OroCompanyBundle\Model\ExtendCompany;

/**
 * Class Company.
 *
 * @author  Vigo Krumins <vigo.krumins@dmk-ebusiness.com>
 * @license http://www.gnu.org/licenses/lgpl.html
 *          GNU Lesser General Public License, version 3 or later
 *
 * @ORM\Entity(repositoryClass="VigoKrumins\OroCompanyBundle\Entity\Repository\CompanyRepository")
 * @ORM\Table(name="vigokrumins_oro_company")
 * @Config(
 *     defaultValues={
 *          "entity"={"icon"="fa-building"},
 *          "grid"={"default"="vigokrumins-orocompany-company-grid"},
 *          "form"={"grid_name"="vigokrumins-orocompany-company-grid"},
 *          "tag"={"enabled"=true}
 *     }
 * )
 */
class Company extends ExtendCompany implements DatesAwareInterface
{
    use DatesAwareTrait;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\Length(max="255")
     * @Assert\NotBlank()
     */
    protected $name;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(
     *     targetEntity="VigoKrumins\OroCompanyBundle\Entity\Employee", mappedBy="company",
     *     cascade={"all"}, orphanRemoval=true
     * )
     */
    protected $employees;

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Company
     */
    public function setName(string $name): Company
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection
     */
    public function getEmployees(): Collection
    {
        return $this->employees;
    }

    /**
     * @param Employee $employee
     */
    public function addEmployee(Employee $employee)
    {
        if (!$this->employees->contains($employee)) {
            $this->employees->add($employee);
        }
    }

    /**
     * @param Employee $employee
     */
    public function removeEmployee(Employee $employee)
    {
        $this->employees->removeElement($employee);
    }
}
