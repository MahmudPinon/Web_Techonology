<?php  
require_once '../Model/Model.php';

function getName($username)
{
    $getname=providename($username);
    return $getname;
}


function fetchPerson($username)
{
    return provideindividualinfo($username);
}







?>