# Установка metabase
Скачать metabase: https://downloads.metabase.com/v0.34.3/metabase.jar
Скачать драйвер КХ: https://github.com/enqueue/metabase-clickhouse-driver/releases/download/0.7.0/clickhouse.metabase-driver.jar
Скачать патч стилей: https://github.com/androkon/metabase/raw/androkon-patch-1/styles.bundle.css
Распаковать metabase.jar
Удалить всё из каталога modules
Положить драйвер КХ в каталог plugins
Положить патч стилей в каталог frontend_client/app/dist/
Настроить бэкенд по инструкции из https://www.metabase.com/docs/latest/operations-guide/configuring-application-database.html
Запустить приложение: java metabase.core
