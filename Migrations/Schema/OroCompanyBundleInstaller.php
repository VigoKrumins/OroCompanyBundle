<?php

namespace VigoKrumins\OroCompanyBundle\Migrations\Schema;

use Doctrine\DBAL\Schema\Schema;
use Oro\Bundle\ActivityBundle\Migration\Extension\ActivityExtension;
use Oro\Bundle\ActivityBundle\Migration\Extension\ActivityExtensionAwareInterface;
use Oro\Bundle\CommentBundle\Migration\Extension\CommentExtension;
use Oro\Bundle\CommentBundle\Migration\Extension\CommentExtensionAwareInterface;
use Oro\Bundle\EntityExtendBundle\Migration\Extension\ExtendExtension;
use Oro\Bundle\EntityExtendBundle\Migration\Extension\ExtendExtensionAwareInterface;
use Oro\Bundle\MigrationBundle\Migration\Installation;
use Oro\Bundle\MigrationBundle\Migration\QueryBag;
use VigoKrumins\OroCompanyBundle\Migrations\Schema\v1_0\InitialCompanyTable;
use VigoKrumins\OroCompanyBundle\Migrations\Schema\v1_0\InitialEmployeeTable;

/**
 * Installer for OroCompanyBundle
 */
class OroCompanyBundleInstaller implements
    Installation,
    ActivityExtensionAwareInterface,
    CommentExtensionAwareInterface,
    ExtendExtensionAwareInterface
{
    /** @var ActivityExtension */
    protected $activityExtension;

    /** @var CommentExtension */
    protected $comment;

    /** @var ExtendExtension */
    protected $extendExtension;

    /**
     * @param ActivityExtension $activityExtension
     */
    public function setActivityExtension(ActivityExtension $activityExtension)
    {
        $this->activityExtension = $activityExtension;
    }

    /**
     * @param CommentExtension $commentExtension
     */
    public function setCommentExtension(CommentExtension $commentExtension)
    {
        $this->comment = $commentExtension;
    }

    /**
     * @param ExtendExtension $extendExtension
     */
    public function setExtendExtension(ExtendExtension $extendExtension)
    {
        $this->extendExtension = $extendExtension;
    }

    /**
     * {@inheritdoc}
     */
    public function getMigrationVersion(): string
    {
        return 'v1_0';
    }

    /**
     * {@inheritdoc}
     */
    public function up(Schema $schema, QueryBag $queries)
    {
        // v1_0
        InitialCompanyTable::createCompanyTable($schema);

        InitialEmployeeTable::createEmployeeTable($schema);
        InitialEmployeeTable::addEmployeeForeignKeys($schema);
    }
}
