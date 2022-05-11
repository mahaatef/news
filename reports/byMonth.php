<?php 
// Load the database configuration file 
require("../handlers/connect.php");
 

//WHERE MONTH(happened_at) = 1 AND YEAR(happened_at) = 2009

//Get Month and year
(int)$month=1;
(int)$year=2022;



// Filter the excel data 
function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
} 
 
// Excel file name for download 
$fileName = "Monthly Report_" . date('Y-m-d') . ".xls"; 
 
// Column names 
$fields = array('Order ID', 'Invoice ID', 'Status', 'Customer', 'Category', 'Newsuct Name', 'Unit Cost Price in Dollar',
'Cost in Lira','Profit Rate %','selling Price','Qty','exchanged On','Total Price','Added By','Supplier',
'Date of Sale','Date and Time of Sale'); 
 
// Display column names as first row 
$excelData = implode("\t", array_values($fields)) . "\n"; 
 
// Fetch records from database 
$sql="SELECT
DISTINCT invoices.invoID AS orderID,
invoices.invoNum AS invoID,
invoices.status AS  Paid_1,
custumers.name AS customer ,
category.name AS category,
News.name AS News,
News.unitCostPrice AS unitCostPrice,
News.LbCost AS Cost_in_Lira,
News.percentage As Profit_Rate,
News.sellingPrice AS sellingPrice,
 invoices.qty AS Qty,
 invoices.exchangeOn AS exchanged_On,
 invoices.totalPrice As Total_Price,
 users.name As addedBy,
 suppliers.companyName AS Supplier,
 invoices.date AS Date_of_Sale,
 invoices.created_at AS DateTime_of_Sale
 
 FROM invoices
JOIN custumers  ON  invoices.custID=custumers.custID 
JOIN News  ON invoices.NewsID=News.NewsID 
  JOIN category ON News.catID=category.catID
  JOIN users ON invoices.addedBy=users.userID
  JOIN suppliers ON News.supID=suppliers.supID


  WHERE MONTH(invoices.date) = $month AND YEAR(invoices.date) = $year
  ";

$get=mysqli_query($conn,$sql);

$count=mysqli_num_rows($get);

if($count> 0){ 
    // Output each row of the data 
    while($row=mysqli_fetch_assoc($get)){ 
       $status = ($row['Paid_1'] == 1)?'Paid':'Not Paid'; 
      


        $lineData = array($row['orderID'], $row['invoID'], $status, $row['customer'], $row['category'],
         $row['News'], $row['unitCostPrice'],$row['Cost_in_Lira'],$row['Profit_Rate'],$row['sellingPrice'],
         $row['Qty'],$row['exchanged_On'],$row['Total_Price'],$row['addedBy'],
         $row['Supplier'],$row['Date_of_Sale'],$row['DateTime_of_Sale']); 
         
        array_walk($lineData, 'filterData'); 
        $excelData .= implode("\t", array_values($lineData)) . "\n"; 
    } 
}else{ 
    $excelData .= 'No records found...'. "\n"; 
} 
 
// Headers for download 
header("Content-Encoding: UTF-16LE");

header("Content-Type: application/vnd.ms-excel; charset=UTF-16LE"); 
header("Content-Disposition: attachment; filename=\"$fileName\""); 
 
// Render excel data 
echo $excelData; 
 
exit;
?>