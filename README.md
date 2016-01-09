# Jarvis\Math\Bijective

``Bijective`` encodes any integer into a base(n) string where n is alphabet's length. It can be very useful if you want to create your own url shortener.



```php
<?php

require_once __DIR__ . '/vendor/autoload.php';

$bijective = new \Jarvis\Math\Bijective();

echo $bijective->alphabet(); // print 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'

echo $bijective->encode('64'); // print 'bc'

echo $bijective->decode('ba'); // print '62'

$bijective = new \Jarvis\Math\Bijective('azerty');

echo $bijective->alphabet(); // print 'azerty'

```

Things you should know:

- ``Bijective`` default alphabet is ``abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789``. You can define your own alphabet by passing it to its constructor.
- ``Bijective`` throws exception if you try to decode unsupported char.
- ``Bijective`` throws exception if you try to decode string which start by a zero value (the first char of your defined alphabet. Given the bijective with alphabet '!?:;', the zero value is '!').
- every exception throws by ``Bijective`` is instance of ``\LogicException``.
