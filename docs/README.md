# Cron Daemon

Executes cron jobs from an external cron service via a URL.

Workaround for queued cron jobs on servers that can't be set to run every minute.

## Usage

Once the module is installed, go to `Administration -> Modules -> Cron Daemon -> Configure`.

## Limitations

Running cron jobs from a URL may cause timeout issues if the execution time is higher than the allowed time for PHP scripts.

This module should only be used on small HumHub instances where it is not possible to configure cron jobs using [the official recommendations](https://docs.humhub.org/docs/admin/cron-jobs/).

## Pricing

This module is free, but is the result of a lot of work for the design and maintenance over time.

If it's useful to you, please consider [making a donation](https://www.cuzy.app/checkout/donate/) or [participating in the code](https://github.com/cuzy-app/cron-daemon). Thanks!

## Repository

https://github.com/cuzy-app/cron-daemon

## Publisher

[CUZY.APP](https://www.cuzy.app/)

## Licence

[GNU AGPL](https://github.com/cuzy-app/cron-daemon/blob/master/docs/LICENCE.md)
