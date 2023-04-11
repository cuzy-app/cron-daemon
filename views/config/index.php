<?php
/**
 * Cron Daemon
 * @link https://github.com/cuzy-app/humhub-modules-cron-daemon
 * @license https://github.com/cuzy-app/humhub-modules-cron-daemon/blob/master/docs/LICENCE.md
 * @author [Marc FARRE](https://marc.fun) for [CUZY.APP](https://www.cuzy.app)
 */

use humhub\libs\Html;
use humhub\modules\moduleModel\models\Configuration;
use humhub\modules\moduleModel\Module;
use humhub\modules\ui\view\components\View;
use humhub\widgets\Button;
use yii\helpers\Url;

/**
 * @var $this View
 * @var $model Configuration
 */

/** @var Module $module */
$module = Yii::$app->getModule('cron-daemon');
?>

<div class="panel panel-default">

    <div class="panel-heading">
        <strong><?= $module->getName() ?></strong>
        <div class="help-block"><?= $module->getDescription() ?></div>
    </div>

    <div class="panel-body">
        <div class="alert alert-info">
            This module was created and is maintained by
            <a href="https://www.cuzy.app/"
               target="_blank">CUZY.APP (view other modules)</a>.
            <br>
            It's free, but it's the result of a lot of design and maintenance work over time.
            <br>
            If it's useful to you, please consider
            <a href="https://www.cuzy.app/checkout/donate/"
               target="_blank">making a donation</a>
            or
            <a href="https://github.com/cuzy-app/humhub-modules-cron-daemon"
               target="_blank">participating in the code</a>.
            Thanks!
        </div>

        <h4><?= Yii::t('CronDaemonModule.config', '1) Set up an external cron job service') ?></h4>
        <p><?= Yii::t('CronDaemonModule.config', 'To execute the queued jobs, call the following URLs every minute by an external cron service such as {cronJobDotOrgLink}:', ['cronJobDotOrgLink' => '<a href="https://cron-job.org" target="_blank">cron-job.org</a>']) ?></p>

        <label class="control-label" for="queueRun">queue/run:</label>
        <?= Html::textInput(
            'queueRun',
            Url::to(['/cron-daemon/external-service/run-queue'], true),
            [
                'class' => 'form-control',
                'label' => 'queueRun',
            ]
        ) ?>

        <label class="control-label" for="cronRun">cron/run:</label>
        <?= Html::textInput(
            'cronRun',
            Url::to(['/cron-daemon/external-service/run-cron'], true),
            [
                'class' => 'form-control',
                'label' => 'cronRun',
            ]
        ) ?>
        <br>

        <h4><?= Yii::t('CronDaemonModule.config', '2) Check the cron jobs execution') ?></h4>
        <p><?= Button::primary(Yii::t('AdminModule.information', '<strong>CronJob</strong> Status'))->link(['/admin/information/background-jobs']) ?></p>
    </div>
</div>
