<?php

declare(strict_types=1);

namespace VigoKrumins\OroCompanyBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Class CompanyRepository.
 *
 * @author  Vigo Krumins <vigo.krumins@dmk-ebusiness.com>
 * @license http://www.gnu.org/licenses/lgpl.html
 *          GNU Lesser General Public License, version 3 or later
 */
class CompanyRepository extends EntityRepository
{
    /**
     * @return array
     */
    public function findActiveCompanies(): array
    {
        return $this->findBy(['isActive' => true]);
    }
}
