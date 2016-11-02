<?php
/////////////////////////////////////////////////////////////
//*** Select วันที่ในตาราง Counter ว่าปัจจุบันเก็บของวันที่เท่าไหร่  ***//
//*** ถ้าเป็นของเมื่อวานให้ทำการ Update Counter ไปยังตาราง daily และลบข้อมูล เพื่อเก็บของวันปัจจุบัน ***//
$strSQL = " SELECT DATE FROM counter LIMIT 0,1";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
if ($objResult["DATE"] != date("Y-m-d")) {
    //*** บันทึกข้อมูลของเมื่อวานไปยังตาราง daily ***//
    $strSQL = " INSERT INTO daily (DATE,NUM) SELECT '" . date('Y-m-d', strtotime("-1 day")) . "',COUNT(*) AS intYesterday FROM  counter WHERE 1 AND DATE = '" . date('Y-m-d', strtotime("-1 day")) . "'";
    mysql_query($strSQL);

    //*** ลบข้อมูลของเมื่อวานในตาราง counter ***//
    $strSQL = " DELETE FROM counter WHERE DATE != '" . date("Y-m-d") . "' ";
    mysql_query($strSQL);
}

//*** Insert Counter ปัจจุบัน ***//
$strSQL = " INSERT INTO counter (DATE,IP) VALUES ('" . date("Y-m-d") . "','" . $_SERVER["REMOTE_ADDR"] . "') ";
mysql_query($strSQL);

//******************** Get Counter ************************//
// Today //
$strSQL = " SELECT COUNT(DATE) AS CounterToday FROM counter WHERE DATE = '" . date("Y-m-d") . "' ";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
$strToday = $objResult["CounterToday"];

// Yesterday //
$strSQL = " SELECT NUM FROM daily WHERE DATE = '" . date('Y-m-d', strtotime("-1 day")) . "' ";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
$strYesterday = $objResult["NUM"];

// This Month //
$strSQL = " SELECT SUM(NUM) AS CountMonth FROM daily WHERE DATE_FORMAT(DATE,'%Y-%m')  = '" . date('Y-m') . "' ";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
$strThisMonth = $objResult["CountMonth"];

// Last Month //
$strSQL = " SELECT SUM(NUM) AS CountMonth FROM daily WHERE DATE_FORMAT(DATE,'%Y-%m')  = '" . date('Y-m', strtotime("-1 month")) . "' ";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
$strLastMonth = $objResult["CountMonth"];

// This Year //
$strSQL = " SELECT SUM(NUM) AS CountYear FROM daily WHERE DATE_FORMAT(DATE,'%Y')  = '" . date('Y') . "' ";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
$strThisYear = $objResult["CountYear"];

// Last Year //
$strSQL = " SELECT SUM(NUM) AS CountYear FROM daily WHERE DATE_FORMAT(DATE,'%Y')  = '" . date('Y', strtotime("-1 year")) . "' ";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
$strLastYear = $objResult["CountYear"];

//*** Close MySQL ***//
//mysql_close();
////////////////////////////////////////////////////////////////
?>