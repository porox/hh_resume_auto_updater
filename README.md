## Скрипт для автообновления даты публикации резюме на сайте hh.ru ##

Для работы скрипта необходимо:
 1. Cоздать файл конфигурации  <strong>Config.json</strong> Пример  конфигурации в файле **[SampleConfig.json](https://github.com/porox/hh_resume_auto_updater/blob/master/SampleConfig.json)** 
 
 
**Config.json**
```javascript
 { "hhToken": "Получить токен можно здесь https://dev.hh.ru/admin", 
   "resumeLink":"Ссылка на резюме hh" }
 ```
 2. Запустить команду php App.php проверить что выведет "Ок".
 3. php App.php  в Cron (linux) или Task Scheduler (windows) на каждые 4 часа.
 
Обновление резюме доступно каждые 4 часа! (ограничение Hh.ru)
