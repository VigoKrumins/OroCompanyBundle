<?php

namespace VigoKrumins\OroCompanyBundle\Model;

use Oro\Bundle\ActivityBundle\Model\ActivityInterface;
use Oro\Bundle\ActivityBundle\Model\ExtendActivity;

/**
 * Extend class which allow to make Employee entity extendable.
 *
 * @author  Vigo Krumins <vigo.krumins@dmk-ebusiness.com>
 * @license http://www.gnu.org/licenses/lgpl.html
 *          GNU Lesser General Public License, version 3 or later
 */
class ExtendEmployee implements ActivityInterface
{
    use ExtendActivity;

    /**
     * ExtendEmployee constructor.
     */
    public function __construct()
    {
    }
}
