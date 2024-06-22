<?php

$db=pg_connect("host=viaduct.proxy.rlwy.net port=22002 dbname=railway user=postgres password=YgSvXTwuzCkRMatsdDXpUYQmGjDKbxwu");
/*$db=pg_connect("host=127.0.0.1 port=5432 dbname=AppReport user=postgres password=ANR123");  viaduct.proxy.rlwy.net*/

if($db)
{
    echo ("exito");
    $etName="Oscar1";
    $etNameFather="morales";
    $etNameMother="ponce";
    $etPassword="12345";
    $etEmail="oscar1@gmail.com";
    $etBirthday="17/06/1993";
    $etCel="5514253641";
    $acvDependence="opcion1";
    $acvSex="masculino";

    

    if(isset($_POST['etname']))
    {
        $etName=$_POST['etname'];
    }


    if(isset($_POST['etnamefather']))
    {
        $etNameFather=$_POST['etnamefather'];
    }


    if(isset($_POST['$etnamemother']))
    {
        $etNameMother=$_POST['$etnamemother'];
    }


    if(isset($_POST['etemail']))
    {
        $etEmail=$_POST['etemail'];
    }


    if(isset($_POST['etpassword']))
    {
        $etPassword=$_POST['etpassword'];
    }


    if(isset($_POST['etcel']))
    {
        $etCel=$_POST['etcel'];
    }


    if(isset($_POST['etbirthday']))
    {
        $etBirthday=$_POST['etbirthday'];
    }

    if(isset($_POST['acvbependence']))
    {
        $acvDependence=$_POST['acvbependence'];
    }

    if(isset($_POST['acvsex']))
    {
        $acvSex=$_POST['acvsex'];
    }

    

    $check =pg_query("select * from users where etname='$etName' and etemail='$etEmail'");
    if(pg_num_rows($check)>0)
    {
        
        $status="ok";
        $result_code=0;
        echo json_encode(array("status"=>$status,"result_code"=>$result_code));
    }
    else
    {
        
        $query="insert into users(etname, etnamefather, etnamemother, etemail, etpassword, etcel, etbirthday, acvdependence, acvsex) values('$etName' ,'$etNameFather', '$etNameMother' ,'$etEmail' ,'$etPassword' ,'$etCel' ,'$etBirthday', '$acvDependence' ,'$acvSex' )";
         
        if($result=pg_query($query)){
        
        $status="ok";
        $result_code=1;
        echo json_encode(array("status"=>$status,"result_code"=>$result_code));
        }
    }
}

?>