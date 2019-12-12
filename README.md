===============
## Setup

Extention Symfony



В консоли выполняем
<pre><code>composer require kuznetsovsite/math</pre></code>



Необходимо сделать простой bundle для symfony 4, который:
- Получает на вход строку, в которой цифры и знаки математических действий.
  См. src/Lib/ParseString.php
  Реализованно с помощью алгоритма обратной польской нотации.
  
- Выдает на выходе результат или ошибку, если что-то пошло не так.
    ResultInterface
    
- Имеет возможность расширения (например, если в какой-то момент будет решено считать через wolfram alpha).
    Возможно добавить через 
    MathLibInterface::addProvider(ProviderInterface $provider)
    Как пример, добавлена заисимость - сторонняя библиотека 
    <pre><code>hrisKonnertz\StringCalc\StringCalc()</pre></code>
    
- Корректную инициацию для композера.
    composer require kuznetsovsite/math

- Юнит-тесты, покрывающие ключевые моменты в реализации.

- Конфиг для gitlab ci для прогона на версиях php от 5.3 до 7.2.
    Symfony 4 по-умолчанию, работает только с версией php 7.1+
    
