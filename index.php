<!--Домашнее задание к лекции 3.3 «Пространства имен, перегрузка и встроенные интерфейсы и классы»
1. Распишите свое понимание пространства имен. (Представьте, что вас спрашивают на собеседовании).
Пространство имен - это своего рода хранилище файлов с классами в разных каталогах на диске C:\ или др.носителях информации. Используется пространство имен для того, чтобы можно было использовать классы, методы и т.д. с одинаковыми именами и они не приводили к ошибке в исполняемом коде, за счет того, что у них разные пути до исполняемого кода. Пространство имен позволяет так же подключать сторонние библиотеки.

2. Распишите свое понимание исключений (Exception) и зачем они нужны. (Представьте, что вас спрашивают на собеседовании).
Исключения - это механизм, помагающий обрабатывать ошибки на уровне кода или логики, а не игнорирование их. Мы можем сами определять поведение в случае ошибки.
-->

3. Сделайте класс Товар из прошлого ДЗ абстрактным суперклассом для всех остальных классов.


4. Придумайте свое пространство имен (для всех классов), распределите все классы и интерфейсы по директориям и напишите свой autoloader.
5. Опишите класс Корзина, в который можно передавать любой товар. Опишите у корзины нужные свойства и методы. Например, метод получения суммы заказа, удаление товара из корзины и т.д.
6. Опишите класс Заказ, который создается на основе Корзины и имеет методы для оформления и печати (вывода на экран) информации о заказе.

Дополнительное задание:
Использовать исключения для некорректной логики. Например, у товара нет цены и в корзину такой товар не должен попасть.