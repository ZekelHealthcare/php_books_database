<!---
//
// Scott Hendrickson
// 2013-11-30
// https://github.com/DrSkippy27/php_books_database
//
--->
<?php include('header.php');?>
	
<h1>Last 100 Days</h1>
<?php
$debug = 0;
include './db_header.php';

##########################################
# Find the record and populate the fields
$dt = mktime(0, 0, 0, date("m")-3, date("d")-10, date("Y"));
$search_str = 'SELECT * FROM `book collection` WHERE LastRead > "'.date("Y-m-d",$dt).'" ORDER BY LastRead';
if ($debug) echo $search_str;
$result = @mysql_query($search_str);
	
if (!$result) {
	exit('<p>'.$search_str.'</p><p>Error performing query: ' . mysql_error() . '</p>');
       	}

while ($row = mysql_fetch_array($result)) {
echo '&lt;a href="'.'http://www.amazon.com/exec/obidos/ASIN/'.
	$row['ISBNNumber'].'/" target="_blank"&gt;'.
	substr($row['Title'],0,28).'...&lt;/a&gt;&lt;br&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
	.substr($row['Author'],0,23).'&lt;br&gt;<br>';
}

?>
</body>
</html>
