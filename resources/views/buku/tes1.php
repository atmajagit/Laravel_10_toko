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

// Input data
var inputData = "Charlie Zoe,charlie.zoe@example.com; Charlie Zoe,charlie.zoe@example.com; Andre Xavier,andre.xavier@example.com; Charlie Xyz,charlie.zoe@example.com; Jean Summers,jean.summers@example.com; Charlie Xya,charlie.zoe@example.com";

// Split the input into individual contacts
var contacts = inputData.split(";");

// Initialize an array to store contact objects
var contactList = [];

// Iterate over each contact
contacts.forEach(function(contact) {
    // Split each contact into name and email
    var parts = contact.trim().split(", ");
    var name = parts[0];
    var email = parts[1];
    
    // Create a contact object and push it to the contact list array
    contactList.push({name: name, email: email});
});

// Output the contact list
console.log(contactList);



<?php

// Input data
$inputData = "Charlie Zoe,charlie.zoe@example.com; Charlie Zoe,charlie.zoe@example.com; Andre Xavier,andre.xavier@example.com; Charlie Xyz,charlie.zoe@example.com; Jean Summers,jean.summers@example.com; Charlie Xya,charlie.zoe@example.com";

// Split the input into individual contacts
$contacts = explode("; ", $inputData);

// Initialize an array to store contact objects
$contactList = [];

// Iterate over each contact
foreach ($contacts as $contact) {
    // Split each contact into name and email
    $parts = explode(",", $contact);
    $name = trim($parts[0]);
    $email = trim($parts[1]);
    
    // Create a contact object and push it to the contact list array
    $contactList[] = ['name' => $name, 'email' => $email];
}

// Find duplicate emails
$emailCounts = array_count_values(array_column($contactList, 'email'));
$duplicates = array_filter($emailCounts, function($count) {
    return $count > 1;
});

// Output duplicate emails
echo "Duplicate emails: ";
print_r(array_keys($duplicates));

?>

<?php

// Input
$input = 0;

// Memeriksa apakah input adalah kelipatan 25
if ($input % 25 == 0) {
    echo "Ya, $input adalah angka kelipatan 25";
} else {
    echo "Tidak, $input bukan angka kelipatan 25";
}

?>