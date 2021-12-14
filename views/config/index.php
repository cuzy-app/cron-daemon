<?php
/**
 * Cron Daemon
 * @link https://github.com/cuzy-app/humhub-modules-cron-daemon
 * @license https://github.com/cuzy-app/humhub-modules-cron-daemon/blob/master/docs/LICENCE.md
 * @author [Marc FARRE](https://marc.fun) for [CUZY.APP](https://www.cuzy.app)
 */

use humhub\libs\Html;
use humhub\widgets\Button;
use yii\helpers\Url;

/**
 * @var $this \humhub\modules\ui\view\components\View
 * @var $model \humhub\modules\moduleModel\models\ModuleSettings
 */

/** @var \humhub\modules\moduleModel\Module $module */
$module = Yii::$app->getModule('cron-daemon');
?>

<div class="panel panel-default">

    <div class="panel-heading">
        <strong><?= $module->getName() ?></strong>
        <div class="help-block">
            <?= $module->getDescription() ?>
        </div>
    </div>

    <div class="panel-body">
        <h4><?= Yii::t('CronDaemonModule.config', '1) Set up an external cron job service') ?></h4>
        <p><?= Yii::t('CronDaemonModule.config', 'To execute the queued jobs, call the following URLs every minute by an external cron service such as {cronJobDotOrgLink}:', ['cronJobDotOrgLink' => '<a href="https://cron-job.org" target="_blank">cron-job.org</a>']) ?></p>
        <div class="alert alert-info"><?= Url::to(['/cron-daemon/external-service/run-queue'], true) ?></div>
        <div class="alert alert-info"><?= Url::to(['/cron-daemon/external-service/run-cron'], true) ?></div>

        <h4><?= Yii::t('CronDaemonModule.config', '2) Chek the cron jobs execution') ?></h4>
        <p><?= Button::primary(Yii::t('AdminModule.information', '<strong>CronJob</strong> Status'))->link(['/admin/information/background-jobs']) ?></p>
    </div>
</div>
