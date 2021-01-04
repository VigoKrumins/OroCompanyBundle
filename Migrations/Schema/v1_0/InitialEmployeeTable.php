<?php

namespace VigoKrumins\OroCompanyBundle\Migrations\Schema\v1_0;

use Doctrine\DBAL\Schema\Schema;
use Oro\Bundle\MigrationBundle\Migration\Migration;
use Oro\Bundle\MigrationBundle\Migration\QueryBag;

/**
 * Class InitialEmployeeTable.
 *
 * @author  Vigo Krumins <vigo.krumins@dmk-ebusiness.com>
 * @license http://www.gnu.org/licenses/lgpl.html
 *          GNU Lesser General Public License, version 3 or later
 */
class InitialEmployeeTable implements Migration
{
    public function up(Schema $schema, QueryBag $queries)
    {
        self::createEmployeeTable($schema);
        self::addEmployeeForeignKeys($schema);
    }

    public static function createEmployeeTable(Schema $schema)
    {
        $table = $schema->createTable('vigokrumins_oro_employee');
        $table->addColumn('id', 'integer', ['autoincrement' => true]);
        $table->addColumn('first_name', 'string', ['length' => 255]);
        $table->addColumn('last_name', 'string', ['length' => 255]);
        $table->addColumn('company_id', 'integer', ['notnull' => false]);
        $table->addColumn('created_at', 'datetime', ['comment' => '(DC2Type:datetime)']);
        $table->addColumn('updated_at', 'datetime', ['comment' => '(DC2Type:datetime)']);
        $table->setPrimaryKey(['id']);
    }

    public static function addEmployeeForeignKeys(Schema $schema)
    {
        $table = $schema->getTable('vigokrumins_oro_employee');
        $table->addForeignKeyConstraint(
            $schema->getTable('vigokrumins_oro_employee'),
            ['company_id'],
            ['id'],
            ['onDelete' => null, 'onUpdate' => null]
        );
    }
}
