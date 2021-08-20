<?php
/**
 * Cron Daemon
 * @link https://www.cuzy.app
 * @license https://www.cuzy.app/cuzy-license
 * @author [Marc FARRE](https://marc.fun)
 */

namespace humhub\modules\cronDaemon\controllers;

use Yii;
use yii\queue\db\Queue;
use humhub\components\Controller;


class ExternalServiceController extends Controller
{
    public function actionRunQueue()
    {
        $queue = new Queue();
        $exitCode = $queue->run(0);
        return ($exitCode === null) ? $this->returnSuccess('Queue executed') : $this->returnError(500, 'Queue not executed. Error code: '.$exitCode);
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