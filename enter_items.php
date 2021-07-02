<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Items Insertion</title>
    </head>
    <body>
        <h2> Enter Records of an Item </h2>

        <table>
            <form method="post">
                <tr height="30">
                    <td width="90" align="left">
                        <label for="itemid">Item ID: </label>
                    </td>
    
                    <td width="90" align="left">
                        <input type="text" id="itemid" name="itemid">
                    </td>
                </tr>

                <tr height="30">
                    <td width="90" align="left">
                        <label for="itemname">Item Name: </label>
                    </td>
    
                    <td width="90" align="left">
                        <input type="text" id="itemname" name="itemname">
                    </td>
                </tr>

                <tr height="30">                
                    <td width="160" align="left">
                        <label for="price">Purchase Price (in Rs.): </label>
                    </td>
    
                    <td width="90" align="left">
                        <input type="text" id="price" name="price">
                    </td>
                </tr>

                <tr height="30">
                    <td width="90" align="left">
                        <label for="threshold">Threshold: </label>
                    </td>
    
                    <td width="90" align="left">
                        <input type="text" id="threshold" name="threshold">
                    </td>
                </tr>

                <tr height="30">                
                    <td width="90" align="left">
                        <label for="quantity">Quantity: </label>
                    </td>
    
                    <td width="90" align="left">
                        <input type="text" id="quantity" name="quantity">
                    </td>
                </tr>

                <tr height="30">                
                    <td width="90" align="left">
                        <label for="shelfid">Shelf ID: </label>
                    </td>
    
                    <td width="90" align="left">
                        <input type="text" id="shelfid" name="shelfid">
                    </td>
                </tr>

                <tr height="30">                
                    <td width="90" align="left">
                        <label for="categoryid">Category ID: </label>
                    </td>
    
                    <td width="90" align="left">
                        <input type="text" id="categoryid" name="categoryid">
                    </td>
                </tr>
            
                <tr height="30">                
                    <td width="90" align="left">
                        <label for="supplierid">Supplier ID: </label>
                    </td>
    
                    <td width="90" align="left">
                        <input type="text" id="supplierid" name="supplierid">
                    </td>
                </tr>

                <tr>
                    <td>
    
                    </td>
    
                    <td width="90" align="left"  height="30">
                        <input type="submit" name="submit" value="Save">
                    </td>
                </tr>
            </form>
        </table>
    </body>
</html>

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

    $ITEMID = $_POST["itemid"];
    $ITEMNAME = $_POST["itemname"];
    $PRICE = $_POST["price"];
    $THRESHOLD = $_POST["threshold"];
    $QUANTITY = $_POST["quantity"];
    $SHELFID = $_POST["shelfid"];
    $CATEGORYID = $_POST["categoryid"];
    $SUPPLIERID = $_POST["supplierid"];

    $sql_select="INSERT INTO ITEM VALUES ('$ITEMID', '$ITEMNAME', $PRICE, '$CATEGORYID', '$SUPPLIERID', '$SHELFID', $QUANTITY, $THRESHOLD)";

	$query_id3 = oci_parse($con, $sql_select);
    $runselect = oci_execute($query_id3);

    if(!$runselect)
    {
        echo "<br>";
        echo "Insertion Unsucessful";

        die();
    }
    else
    {
        echo "<br>";
        echo "Insertion Successful";
    }
}
?>