### Зависимости
```bash
composer require rebing/graphql-laravel
```

### модель Lead

**(модель для Eloquent)**
`app\Models\Lead.php`

**(GraphQl-тип)**
`app\GraphQL\Types\LeadType.php`

**(GraphQl-query)**
`app\GraphQL\Queries\LeadsQuery.php`

**(GraphQl-mutation)**
`app\GraphQL\Mutations\CreateLeadMutation.php`

**(GraphQl-scheme)**
`config\graphql.php`

### Job
`app\Jobs\SendToHttpBinJob.php`

### миграции
миграция для создания таблицы лидов
`php artisan migrate --path=/database/migrations/2022_05_25_110048_create_leads_table.php`
миграция для создания таблицы заданий (пусть очереди сохраняются через драйвер database):
`php artisan migrate --path=/database/migrations/2022_05_25_112619_create_jobs_table.php`,
`php artisan migrate --path=/database/migrations/2019_08_19_000000_create_failed_jobs_table.php`

### Создание лидов
POST:
```js
mutation {
	createLead(name: "test name", phone: "test phone", email: "test-mail@mail.ru", wantToBuy: true){id, name, email, phone, wantToBuy}
}
```

### Получение лидов
POST:
```js
query {
	leads{id, name, email, phone, wantToBuy}
}
```

### Запуск воркера
пусть будет самый простой воркер
`php artisan queue:work --queue="httpbin" --rest=1`
уверен что это далеко не лучшее решение для боевых проектов, лучше использовать Redis/RabbitMQ..

### Примечания
1 - проверку и нормализацию данных пропустил
2 - если после отправки данных на удаленный эндпоинт, сервер не обработал данные (взависимости что там за Response), то можно эту джобу запланировать повторно (например с пометкой "high proirity")
