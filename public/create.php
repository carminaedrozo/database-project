<?php
require '../vendor/autoload.php';
require '../generated-conf/config.php';


$p = UserQuery::create()->filterByEmail("rebekah14@gmail.com")->findOne();
$p->setPasswordHash("1234");
$p->save();
echo "Email= " . $p->getEmail() . ". Hash is= " . $p->getPassword() . "</p>";
?>