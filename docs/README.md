# Cron Daemon

Cron daemon to execute cron jobs from an external cron service via an URL.
Work around the problem of queued jobs executed by cron on managed shared servers that can't be set to run every minute.

If you use this module, please indicate if it works well for you on https://github.com/cuzy-app/humhub-modules-cron-daemon/issues or https://community.humhub.com/content/perma?id=159094

## Usage

To execute the queued jobs, call the URL `https://my-humhub.tdl/cron-daemon/external-service/run-queue` (replace my-humhub.tdl) every minute by an external cron service such as [https://cron-job.org](https://cron-job.org/).

And execute the hourly and daily cron jobs as frequently as possible (at least every hour) on your server cron panel by adding this command:
`/usr/bin/php /path/to/humhub/protected/yii cron/run >/dev/null 2>&1`