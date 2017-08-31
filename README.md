## Скрипт для автообновления даты публикации резюме на сайте hh.ru ##

Для работы скрипта необходимо:
 1. Cоздать файл конфигурации  **Config.json** Пример  конфигурации в файле **[SampleConfig.json](https://github.com/porox/hh_resume_auto_updater/blob/master/SampleConfig.json)** 
 2. Запустить команду php App.php проверить что выведет "Ок".
 3. ```php App.php```  в Cron (linux) или Task Scheduler (windows) на каждые 4 часа.
 
Обновление резюме доступно каждые 4 часа! (ограничение Hh.ru)


 
**Config.json**
```javascript
 { 
   "hhToken": "Получить токен можно здесь https://dev.hh.ru/admin", 
   "resumeLink":"Ссылка на резюме hh" 
  }
 ```
