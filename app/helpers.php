<?php

//makes things global ??
function flash($title=null,  $message=null )
{

    $flash = app('App\Http\Flash');

    if(func_num_args() == 0){
        return $flash;
    }
    return $flash->message($title, $message);
}

/*
function sortMax($thearray)
{
    $mydata[]=$thearray;
    foreach ($thearray as $key => $row) {
        $lastupdate[$key]  = $row['updated_at'];
    }


    var_dump($mydata[0]);
    return $thearray;
}*/