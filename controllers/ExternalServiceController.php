<?php

/**
 * Cron Daemon
 * @link https://github.com/cuzy-app/cron-daemon
 * @license https://github.com/cuzy-app/cron-daemon/blob/master/docs/LICENCE.md
 * @author [Marc FARRE](https://marc.fun) for [CUZY.APP](https://www.cuzy.app)
 */

namespace humhub\modules\cronDaemon\controllers;

use humhub\commands\CronController;
use Yii;
use yii\queue\db\Queue;
use yii\rest\Controller;

class ExternalServiceController extends Controller
{
    public function init()
    {
        // fix missing constants for non-cli php versions (like php-fpm)
        if (!defined('STDERR')) {
            define('STDERR', fopen('php://stderr', 'wb'));
        }
        if (!defined('STDIN')) {
            define('STDIN', fopen('php://stdin', 'rb'));
        }
        if (!defined('STDOUT')) {
            define('STDOUT', fopen('php://stdout', 'wb'));
        }

        parent::init();
    }

    /**
     * @return array
     */
    public function actionRunQueue()
    {
        $queue = new Queue();
        $exitCode = $queue->run(0);
        return !$exitCode ? $this->returnSuccess('Queue executed successfully!') : $this->returnError(500, 'Error on queue execution. Exit code: ' . $exitCode);
    }

    /**
     * Generates success response
     *
     * @param string $message
     * @param int $statusCode
     * @param array $additional
     * @return array
     */
    protected function returnSuccess($message = 'Request successful', $statusCode = 200, $additional = [])
    {
        Yii::$app->response->statusCode = $statusCode;
        return array_merge(['code' => $statusCode, 'message' => $message], $additional);
    }

    /**
     * Generates error response
     *
     * @param int $statusCode
     * @param string $message
     * @param array $additional
     * @return array
     */
    protected function returnError($statusCode = 400, $message = 'Invalid request', $additional = [])
    {
        Yii::$app->response->statusCode = $statusCode;
        return array_merge(['code' => $statusCode, 'message' => $message], $additional);
    }

    /**
     * @return array
     */
    public function actionRunCron()
    {
        $cronController = new CronController($this->id, $this->module);
        $exitCode = $cronController->actionRun();
        return !$exitCode ? $this->returnSuccess('Daily/hourly cron jobs executed successfully!') : $this->returnError(500, 'Error on daily/hourly cron jobs execution. Exit code: ' . $exitCode);
    }
}
