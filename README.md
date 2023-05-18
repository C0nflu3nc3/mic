##  Сайт для МИЦ


## Версия 1.0.3

В money.php - наброски кода для отправки Денег между командами
Проверка кода была через MySQL

## Версия 1.0.4
Добавлена 1 строчка В таблицу `Teams`, связанную с ней строчку в `Operation`

## Логика работы сайта:
```mermaid 
flowchart TD;
vhod((Вход))
style vhod fill : blue 
style User_Acc fill : blue 
style Admin_Acc fill : blue 
User_Acc((Аккаунт Юзера))
UserScore(Счёт команды)
UserOp(Операции команды, как она получила деньги)
Perevod1(Кнопка переводов)
Perevod2(Кнопка переводов)
OtherTeam(Счёт Другой команды)
Perevod1_dop{{Минус в операциях отправителя, Плюс у получателя}}
style Perevod1_dop fill : green 
style Okna_dop fill : green 
ifPerevod1(Если указанное количество денег < Счёт команды)
ifPerevod2(Если указанное количество денег < 0 )
block(Блокировать)
style block fill : red 
Admin_Acc((АККАУНТ АДМИНА))
AdminScore(Счёт всех команд)
AdminOp(Операции всех команд, как они получили деньги)
AdminChange(Кнопка Смены Данных для входа)
Okna(3 Окна, в которые пишутся данные)
Okna_dop{{Номер команды, Новый Логин и Пароль}}
OknaBD(Update В БД)
style OknaBD fill : red 

vhod-->User_Acc
User_Acc-->UserScore
User_Acc-->UserOp
User_Acc-->Perevod1 
Perevod1-->OtherTeam 
OtherTeam-->Perevod1_dop
Perevod1-->ifPerevod1
Perevod1-->ifPerevod2
ifPerevod1-->block
ifPerevod2-->block
vhod-->Admin_Acc
Admin_Acc-->AdminScore
Admin_Acc-->AdminOp 
Admin_Acc-->Perevod2
Admin_Acc-->AdminChange
AdminChange-->Okna 
AdminChange-->Okna_dop
Okna-->OknaBD
Perevod2-->OtherTeam
OtherTeam-->Perevod1_dop
```
