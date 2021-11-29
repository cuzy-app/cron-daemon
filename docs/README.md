# Cron Daemon

Executes cron jobs from an external cron service via a URL.

Work around the problem of queued jobs executed by cron on managed shared servers that can't be set to run every minute.


## Usage

To execute the queued jobs, call the following URLs every minute by an external cron service such as [https://cron-job.org](https://cron-job.org/) (replace my-humhub.tdl):
- `https://my-humhub.tdl/cron-daemon/external-service/run-queue`
- `https://my-humhub.tdl/cron-daemon/external-service/run-cron`


## Repository

https://github.com/cuzy-app/humhub-modules-cron-daemon


## Publisher

[CUZY.APP](https://www.cuzy.app/)


## Licence

[GNU AGPL](https://github.com/cuzy-app/humhub-modules-cron-daemon/blob/master/docs/LICENCE.md)