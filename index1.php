<html lang="en">
<body style="background-color:pink;">
<?php
if(isset($_POST["submit"]))
{
    $db_sid = "(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = Athar)(PORT = 1522))(CONNECT_DATA =(SERVER = DEDICATED)(SERVICE_NAME = atharr)))";
  
    $db_user = "scott";
    $db_pass = "1234";
    $con = oci_connect($db_user,$db_pass,$db_sid);

    if($con)
    {
    } 
    else
    {
        die('Could not connect to Oracle');
    } 

    $USERNAME = $_POST["username"];
    $PASSWORD = $_POST["password"];

    $sql_select="SELECT * FROM USER_CREDENTIALS";

	$query_id = oci_parse($con, $sql_select);
    $runselect = oci_execute($query_id);

    $row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS);

    if(($row[0] == $USERNAME) && ($row[1] == $PASSWORD))
    {
        echo "<center><h2> Forms </h2></center>";

        echo "<h3> Items Form </h3>";
        echo "<a href=enter_items.php>Enter Items Data</a><br>";
        echo "<a href=edit_items_1.php>Edit Items Data</a><br>";
        echo "<a href=remove_items.php>Remove Items Records</a>";

        echo "<h3> Category Form </h3>";
        echo "<a href=enter_category.php>Enter Item's Categories Data</a><br>";
        echo "<a href=edit_category_1.php>Edit Item's Categories Data</a><br>";
        echo "<a href=remove_category.php>Remove Item's Categories Records</a>";

        echo "<h3> Supplier Form </h3>";
        echo "<a href=enter_supplier.php>Enter Item's Supplier Data</a><br>";
        echo "<a href=edit_supplier_1.php>Edit Item's Supplier Data</a><br>";
        echo "<a href=remove_supplier.php>Remove Item's Supplier Records</a>";

        echo "<h3> Shipment Form </h3>";
        echo "<a href=edit_shipment_1.php>Edit Item's Shipments Data</a><br>";
        echo "<a href=remove_shipment.php>Remove Item's Shipments Records</a>";

        echo "<h3> Assign Items Form </h3>";
        echo "<a href=Assign_items.php>Assign/Remove Items</a><br>";

        echo "<h3> Point of Sale Form </h3>";
        echo "<a href=enter_sale.php>Add Item's (being sold to Customer) Data </a><br>";
        echo "<a href=edit_sale_1.php>Edit Item's (sold to Customer) Data</a><br>";
        echo "<a href=remove_sale.php>Remove Item's (sold to Customer) Records</a>";
        
        echo "<center><h2> Reports </h2></center>";

        echo "<h3> Items Report </h3>";
        echo "<a href=list_items.php>List Items</a><br>";

        echo "<h3> Suppliers Report </h3>";
        echo "<a href=list_suppliers.php>List Suppliers</a><br>";

        echo "<h3> Shipments Report </h3>";
        echo "<a href=list_shipment.php>Lists Shipments</a><br>";

        echo "<h3> Sales Report </h3>";
        echo "<a href=list_sales.php>List Sales</a><br>";
    }
    else
    {
        echo "NOT MATCHED";
    }
}
?>
</body>
</html>