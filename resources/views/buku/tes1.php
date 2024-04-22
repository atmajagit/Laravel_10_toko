Anda dapat menggunakan kode PHP berikut untuk mencetak output sesuai permintaan:

```php
<?php

function printOutput($string) {
    $length = strlen($string);

    // Bagian pertama dari output
    $firstPart = substr($string, 0, ceil($length / 3));
    echo ucfirst($firstPart) . "\n";

    // Bagian kedua dari output
    $secondPart = substr($string, ceil($length / 3), ceil($length / 3));
    echo ucfirst($secondPart) . "\n";

    // Bagian ketiga dari output
    $thirdPart = substr($string, 2 * ceil($length / 3));
    if ($thirdPart == "") {
        echo "_\n";
    } else {
        echo ucfirst($thirdPart) . "\n";
    }
}

$input = "dinustek";
echo "Input: $input, Output:\n";
printOutput($input);

?>
```

Ini akan mencetak output sesuai dengan permintaan Anda.