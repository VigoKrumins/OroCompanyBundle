<?php

namespace VigoKrumins\OroCompanyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Oro\Bundle\EntityBundle\EntityProperty\DatesAwareInterface;
use Oro\Bundle\EntityBundle\EntityProperty\DatesAwareTrait;
use Oro\Bundle\EntityConfigBundle\Metadata\Annotation\Config;
use Symfony\Component\Validator\Constraints as Assert;
use VigoKrumins\OroCompanyBundle\Model\ExtendEmployee;

/**
 * Class Employee.
 *
 * @author  Vigo Krumins <vigo.krumins@dmk-ebusiness.com>
 * @license http://www.gnu.org/licenses/lgpl.html
 *          GNU Lesser General Public License, version 3 or later
 *
 * @ORM\Entity(repositoryClass="VigoKrumins\OroCompanyBundle\Entity\Repository\EmployeeRepository")
 * @ORM\Table(name="vigokrumins_oro_employee")
 * @Config(defaultValues={
 *     "entity"={"icon"="fa-user"},
 *     "grid"={"default"="vigokrumins-orocompany-employee-grid"},
 *     "tag"={"enabled"=true}
 * })
 */
class Employee extends ExtendEmployee implements DatesAwareInterface
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
     * @ORM\Column(name="first_name", type="string", length=255)
     * @Assert\Length(max="255")
     * @Assert\NotBlank()
     */
    protected $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=255)
     * @Assert\Length(max="255")
     * @Assert\NotBlank()
     */
    protected $lastName;

    /**
     * @var Company
     *
     * @ORM\ManyToOne(targetEntity="Company", inversedBy="employees")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     * @Assert\NotNull()
     */
    protected $company;

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
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return Company
     */
    public function getCompany(): ?Company
    {
        return $this->company;
    }

    /**
     * @param Company $company
     */
    public function setCompany(Company $company): void
    {
        $this->company = $company;
    }

    /**
     * Get full name
     *
     * @return string
     */
    public function getFullName(): string
    {
        return sprintf('%s %s', $this->getFirstName(), $this->getLastName());
    }
}
