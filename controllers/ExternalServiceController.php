<?php
/**
 * Cron Daemon
 * @link https://www.cuzy.app
 * @license https://www.cuzy.app/cuzy-license
 * @author [Marc FARRE](https://marc.fun)
 */

namespace humhub\modules\cronDaemon\controllers;

use humhub\commands\CronController;
use Yii;
use yii\queue\db\Queue;
use yii\rest\Controller;


class ExternalServiceController extends Controller
{
    /**
     * @return array
     */
    public function actionRunQueue()
    {
        $queue = new Queue();
        $exitCode = $queue->run(0);
        return !$exitCode ? $this->returnSuccess('Queue executed successfully!') : $this->returnError(500, 'Error on queue execution. Exit code: '.$exitCode);
    }


    /**
     * @return array
     */
    public function actionRunCron()
    {
        $cronController = new CronController($this->id, $this->module);
        $exitCode = $cronController->actionRun();
        return !$exitCode ? $this->returnSuccess('Daily/hourly cron jobs executed successfully!') : $this->returnError(500, 'Error on daily/hourly cron jobs execution. Exit code: '.$exitCode);
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
}