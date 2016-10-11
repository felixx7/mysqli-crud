<?php

include_once 'db.php';

/* code for biodata insert */
if(isset($_POST['save']))
{

     $nama_depan = $MySQLiconn->real_escape_string($_POST['nama_depan']);
     $nama_belakang = $MySQLiconn->real_escape_string($_POST['nama_belakang']);
 
  $SQL = $MySQLiconn->query("INSERT INTO biodata(nama_depan,nama_belakang) VALUES('$nama_depan','$nama_belakang')");
  
  if(!$SQL)
  {
   echo $MySQLiconn->error;
  } 
}
/* code for biodata insert */


/* code for biodata delete */
if(isset($_GET['del']))
{
 $SQL = $MySQLiconn->query("DELETE FROM biodata WHERE id=".$_GET['del']);
 header("Location: index.php");
}
/* code for biodata delete */



/* code for biodata update */
if(isset($_GET['edit']))
{
 $SQL = $MySQLiconn->query("SELECT * FROM biodata WHERE id=".$_GET['edit']);
 $getROW = $SQL->fetch_array(); //mengeluarkan data dengan array
}

if(isset($_POST['update']))
{
 $SQL = $MySQLiconn->query("UPDATE biodata SET nama_depan='".$_POST['nama_depan']."', nama_belakang='".$_POST['nama_belakang']."' WHERE id=".$_GET['edit']);
 header("Location: index.php");
}
/* code for biodata update */

?>