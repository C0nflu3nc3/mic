##  Сайт для МИЦ


## Версия 1.0.3

В money.php - наброски кода для отправки Денег между командами
Проверка кода была через MySQL

## Версия 1.0.4
Добавлена 1 строчка В таблицу `Teams`, связанную с ней строчку в `Operation`

## Логика работы сайта:
```mermaid
graph TD;
    A-->B;
    B-->C;
    АККАУНТ ЮЗЕРА-->Операции команды : Как она получили деньги;
    АККАУНТ ЮЗЕРА-->Кнопка переводов; 
    Кнопка переводов-->Счёт другой команды : Минус в операциях отправителя, Плюс у получателя;
    Кнопка переводов-->Если указанное количество денег < Счёт команды : Условие;
    Кнопка переводов-->Если указанное количество денег < 0 : Условие;
    Если указанное количество денег < Счёт команды-->Блокировать;
    Если указанное количество денег < 0-->Блокировать;
    ВХОД-->АККАУНТ АДМИНА;
    АККАУНТ АДМИНА-->Счёт всех команд; 
    АККАУНТ АДМИНА-->Операции команд : Как они получили деньги; 
    АККАУНТ АДМИНА-->Кнопка переводов; 
    АККАУНТ АДМИНА-->Кнопка Смены Данных для входа;
    Кнопка Смены Данных для входа-->3 Окна, в которые пишутся данные : Номер команды, Новый Логин и Пароль;
    3 Окна, в которые пишутся данные-->Update В БД;
    Кнопка переводов-->Счёт другой команды : Минус в операциях отправителя, Плюс у получателя; 
    
```

