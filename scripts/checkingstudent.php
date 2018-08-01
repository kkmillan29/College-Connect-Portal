<?php
/* Web Intersect Social Network Template System and CMS v1.34
 * Copyright (c) 2011 Adam Khoury
 * Licensed under the GNU General Public License version 3.0 (GPLv3)
 * http://www.webintersect.com/license.php
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.

 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  
 * See the GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * Date: February 9, 2010
 *------------------------------------------------------------------------------------------------*/
// Force script errors and warnings to show on page in case php.ini file is set to not display them
error_reporting(E_ALL);
ini_set('display_errors', '1');
//-----------------------------------------------------------------------------------------------------------------------------------
include_once "conn.php"; // <<---- Connect to database here
$username = $_POST['username']; // filter
$sql ="SELECT Reg_No FROM student WHERE Reg_No='$username' LIMIT 1"; 
$result=mysqli_query($con,$sql);
$row_cnt = $result->num_rows;

if (strlen($username) <> 10) {
		echo '<p class="palette-paragraph">Your USN Number must be 10 digit.</p>';

	exit();
}


if ($row_cnt < 1) {
	echo '<p class="palette-paragraph">Sorry,USN <strong> '. $username . '.</strong> not yet Verified by Admin! <a href="usnrequest.php"> Verication Request</a></p>';
	exit();
} else {
	echo '<p class="palette-paragraph">Hurray, USN <strong>'.$username.' </strong> has been accepted,now you can create your account</p>';
	exit();
}

?>