<?php
/**
 * Cron Daemon
 * @link https://www.cuzy.app
 * @license https://www.cuzy.app/cuzy-license
 * @author [Marc FARRE](https://marc.fun)
 */

namespace humhub\modules\cronDaemon;


class Module extends \humhub\components\Module
{
    
    /**
     * @var string defines the icon
     */
    public $icon = 'tasks';

    /**
     * @var string defines path for resources, including the screenshots path for the marketplace
     */
    public $resourcesPath = 'resources';

    public function getName()
    {
        return 'Cron Daemon';
    }

    public function getDescription()
    {
        return 'Cron daemon to execute cron jobs from an external cron service via an URL';
    }
}
