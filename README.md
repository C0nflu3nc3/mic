##  Сайт для МИЦ


## Версия 1.0.3

В money.php - наброски кода для отправки Денег между командами
Проверка кода была через MySQL

## Версия 1.0.4
Добавлена 1 строчка В таблицу `Teams`, связанную с ней строчку в `Operation`

## Логика работы сайта:

```erDiagram
    CUSTOMER ||--o{ ORDER : places
    ORDER ||--|{ LINE-ITEM : contains
    CUSTOMER }|..|{ DELIVERY-ADDRESS : uses
```
