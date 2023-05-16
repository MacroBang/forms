<?php

require_once '../database/Cliente.php';

if (ConnectionDB::save($_POST)) {
    print "salvo com sucesso";
}
else {
    print "error";
    };
    


