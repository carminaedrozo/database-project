<?php
require '../vendor/autoload.php';
require '../generated-conf/config.php';


$p = UserQuery::create()->filterByUserLogin("Rebekah22")->findOne();
$p->setPassword("1234");
$p->save();
echo "Username= " . $p->getUserLogin() . ". Hash is= " . $p->getUserPassword() . "</p>";
?>