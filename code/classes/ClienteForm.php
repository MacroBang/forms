<?php

require_once 'code\database\Cliente.php';

if (ConnectionDB::save($_POST)) {
    print "salvo com sucesso";
}
else {
    print "error";
    };
    


