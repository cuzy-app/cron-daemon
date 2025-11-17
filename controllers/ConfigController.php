<?php

/**
 * Cron Daemon
 * @link https://github.com/cuzy-app/cron-daemon
 * @license https://github.com/cuzy-app/cron-daemon/blob/master/docs/LICENCE.md
 * @author [Marc FARRE](https://marc.fun) for [CUZY.APP](https://www.cuzy.app)
 */

namespace humhub\modules\cronDaemon\controllers;

use humhub\modules\admin\components\Controller;

class ConfigController extends Controller
{
    /**
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
