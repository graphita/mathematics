# Mathematics
PHP Mathematics Library for easier calculation of Base Converts, Factorials, Permutation and Combination.

## Installation
You can install the package via composer:

```bash
composer require graphita/mathematics
```

## Usage

### Base Convert

```php
use Graphita\Mathematics\BaseConvert;

// Convert a Number from Base 10 to Base 2
$result = BaseConvert::convert(6)->to(2)->getResult(); // 110
$resultArray = BaseConvert::convert(6)->to(2)->getResultArray(); // [1,1,0]

// Convert a Number from Base 8 to Base 10
$result = BaseConvert::convert(20, 8)->to(10)->getResult(); // 16

// Convert a Number from Base 16 with Source Characters Map to Base 10
$result = BaseConvert::convert('FF', 16, '0123456789ABCDEF')->to(10)->getResult(); // 255

// Convert a Number from Base 10 to Base 16 with Destination Characters Map
$result = BaseConvert::convert(255)->to(16, '0123456789ABCDEF')->getResult(); // FF

// Convert a Number from Base 16 with Source Characters Map to Base 10 with Destination Characters Map
$result = BaseConvert::convert('FF', 16, '0123456789ABCDEF')->to(10, 'ZYXWVUTSRQ')->getResult(); // XUU
```

### Factorial

```php
use Graphita\Mathematics\Factorial;

// Factorial 3 : 3x2x1
$result = Factorial::instance(3)->calculate()->getResult(); // 6

// Factorial 4 : 4x3x2x1
$result = Factorial::instance(4)->calculate()->getResult(); // 24

// Factorial 5 : 5x4x3x2x1
$factorial = new Factorial;
$factorial->setNumber(5);
$factorial->calculate();
$result = $factorial->getResult();
```

### Permutation

```php
use Graphita\Mathematics\Permutation;

// Permutation two Character without Repetitions
$permutation = new Permutation();
$permutation->setItems(['a', 'b']);
$permutation->setSelection(2);
$permutation->calculate();
$result = $permutation->getPossibilities(); // [ ['a', 'b'], ['b','a'] ]
$count = $permutation->countPossibilities(); // 2

// Permutation two Character with Repetitions
$permutation = new Permutation();
$permutation->setItems(['a', 'b']);
$permutation->setSelection(2);  
$permutation->setRepetitions(true);
$permutation->calculate();
$result = $permutation->getPossibilities(); // [ ['a', 'a'], ['a', 'b'], ['b','a'], ['b','b'] ]
$count = $permutation->countPossibilities(); // 4
```

### Combination

```php
use Graphita\Mathematics\Combination;

// Combination two Character without Repetitions
$combination = new Combination();
$combination->setItems(['a', 'b']);
$combination->setSelection(2);
$combination->calculate();
$result = $combination->getPossibilities(); // [ ['a', 'b'] ]
$count = $combination->countPossibilities(); // 1

// Combination two Character with Repetitions
$combination = new Combination();
$combination->setItems(['a', 'b']);
$combination->setSelection(2);  
$combination->setRepetitions(true);
$combination->calculate();
$result = $combination->getPossibilities(); // [ ['a', 'a'], ['a', 'b'], ['b','b'] ]
$count = $combination->countPossibilities(); // 3
```

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.

