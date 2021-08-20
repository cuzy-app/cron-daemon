TODOS 
=====


* * * * * sudo -u www-data /var/www/marc/lelienlocal.org/humhub/protected/yii cron/run >/dev/null 2>&1
          40 2 2 * * rm -rf /home/web/www/marc/lelienlocal.org/humhub/protected/runtime/module_downloads/*
          45 2 2 * * rm -rf /home/web/www/marc/lelienlocal.org/humhub/protected/runtime/module_backups/*
          50 2 2 * * rm -rf /home/web/www/marc/lelienlocal.org/humhub/protected/runtime/updater/backups/*
