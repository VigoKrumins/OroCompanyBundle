<?php

declare(strict_types=1);

namespace VigoKrumins\OroCompanyBundle\Model;

use Oro\Bundle\ActivityBundle\Model\ActivityInterface;
use Oro\Bundle\ActivityBundle\Model\ExtendActivity;

/**
 * Extend class which allow to make Company entity extendable
 *
 * @author  Vigo Krumins <vigo.krumins@dmk-ebusiness.com>
 * @license http://www.gnu.org/licenses/lgpl.html
 *          GNU Lesser General Public License, version 3 or later
 */
class ExtendCompany implements ActivityInterface
{
    use ExtendActivity;

    /**
     * ExtendCompany constructor.
     */
    public function __construct()
    {
    }
}
