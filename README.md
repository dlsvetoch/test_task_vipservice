# Test task for vipservice

### Примечание

- Тестовое делалось с использованием следующей документации: https://biletix.ru/affiliate/office/static/doc/api.pdf, а в частности пункт 9 -  GetOptimalFares().

- Во время запроса самого дешевого перелета мне приходили несколько рейсов в ответе (разное время рейсов), в данном задании я использовал первые, которые попадались в массиве. Если нужно будет это исправить прошу сообщите, поскольку ТЗ не особо это регламентирует

- В IndexController я захардкодил параметры для запроса перелетов, поскольку не написал никакой формы выбора даты. Если это важно - сообщите.

- Никакая БД не использовалась, думаю для этого тестового задания она не нужна.

### Installation

- Клонировать репозиторий.
- composer update
