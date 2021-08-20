<?php
/**
 * Cron Daemon
 * @link https://www.cuzy.app
 * @license https://www.cuzy.app/cuzy-license
 * @author [Marc FARRE](https://marc.fun)
 */

namespace humhub\modules\cronDaemon\controllers;

use yii\queue\db\Queue;
use humhub\components\Controller;


class ExternalServiceController extends Controller
{
    public function actionRunQueue()
    {
        $queue = new Queue();
        $queue->run(0);
    }
}