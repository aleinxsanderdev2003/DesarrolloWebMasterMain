
<?php


$num_cart = 0;
if(isset($_SESSION['carrito']['productos'])){
    $num_cart = count($_SESSION['carrito']['productos']);
}

return [
    'key_token' => 'APR.wqc-354*',
    'MONEDA' => '$',
    'num_cart' => $num_cart,
    'CLIENT_ID' => 'AeZ5tlf0iMRYoXLghf91Ri8fBC5RpnnM8dkmis5O4xwikA_m4hp_jFsIomZrYvfkSSmi7nyw1_qru4DC',
    'CURRENCY' => 'USD',
    // 'PUBLIC_KEY'=>'TEST-f2387950-5164-43db-a9eb-5428b5896f90',
    // 'ACCESS_TOKEN'=>'TEST-8168582731554969-052415-ff3f6c994166e6e682f7caee817d10c3-1382425648',
    'PUBLIC_KEY'=>'TEST-41848978-318e-4a16-bcd0-9bbfa7b4d472',
    'ACCESS_TOKEN'=>'TEST-1691596106386517-052415-d46babf184c54996b3dc60038e079aee-1382425648',
];
