# Тестовое задание

## Развернуть проект Laravel
`https://laravel.com/docs/7.x/installation`
### Внутри создать модель Lead 
Она должна содержать поля name, email, phone и wantToBay

### Установить на модель обработчик события на создание
В случае если клиент хочет купить создавать Queue Job вызывающий хук `https://httpbin.org/post` и прередать туда данные лида.

*Нельзя просто так взять и вызвать хук в обработчике события ведь по легенде учений сервер принимает запросы раз в секунду*

## Установить и настроить расширение GraphQl
`https://github.com/rebing/graphql-laravel`
Расширение должно отвечать по url `/graphql`
### Создать Type Lead а к нему Query и Mutation
```graphql
type Lead {
    name: String
    email: String
    phone: String
    wantToBay: Boolean
}
```

## Залить все это на открытый репозиторий в GitHub или Bitbacket

---

Фронтенд для проекта не нужен. Все манипуляции через graphql