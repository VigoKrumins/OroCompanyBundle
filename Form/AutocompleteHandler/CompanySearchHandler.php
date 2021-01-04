<?php

namespace VigoKrumins\OroCompanyBundle\Form\AutocompleteHandler;

use Oro\Bundle\TaxBundle\Autocomplete\SearchHandler;
use VigoKrumins\OroCompanyBundle\Entity\Company;

/**
 * Class CompanySearchHandler.
 *
 * @author  Vigo Krumins <vigo.krumins@dmk-ebusiness.com>
 * @license http://www.gnu.org/licenses/lgpl.html
 *          GNU Lesser General Public License, version 3 or later
 */
class CompanySearchHandler extends SearchHandler
{
    /**
     * CompanySearchHandler constructor.
     */
    public function __construct()
    {
        parent::__construct(Company::class, ['name']);
    }
}
