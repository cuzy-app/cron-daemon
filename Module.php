<?php
/**
 * Cron Daemon
 * @link https://github.com/cuzy-app/humhub-modules-cron-daemon
 * @license https://github.com/cuzy-app/humhub-modules-cron-daemon/blob/master/docs/LICENCE.md
 * @author [Marc FARRE](https://marc.fun) for [CUZY.APP](https://www.cuzy.app)
 */

namespace humhub\modules\cronDaemon;


use Yii;
use yii\helpers\Url;

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
        return Yii::t('CronDaemonModule.config', 'Executes cron jobs from an external cron service via a URL');
    }

    /**
     * @inheritdoc
     */
    public function getConfigUrl()
    {
        return Url::to([
            '/cron-daemon/config'
        ]);
    }
}
