<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sale Record Updation</title>
    </head>
    
    <body>
    <?php
        echo
        "
            <hr>

            <form action=edit_sale_2.php method=post>
                <tr height=30>
                    <td width=90 align=left>
                        <label for=invid>Enter Invoice ID : </label>
                    </td>
    
                    <td width=90 align=left>
                        <input type=text id=invid name=invid>
                    </td>
                <tr>
                
                <tr height=30>
                    <td width=90 align=left>
                        <label for=itemid>Enter Item ID : </label>
                    </td>
    
                    <td width=90 align=left>
                        <input type=text id=itemid name=itemid>
                    </td>
                </tr>
                <tr height=30>
                <td width=90 align=left height=30>
                <input type=submit name=search value='Search'>
                </td>
                <tr>
            </form>

            <hr>

            <br>

            <h2> Records of the Sale </h2>
        
            <table>
                <form>
                <tr height=30>
                <td width=90 align=left>
                    <label for=invid>Invoice ID: </label>
                </td>

                <td width=90 align=left>
                    <input type=text id=invid name=invid>
                </td>
            </tr>

            <tr height=30>
                <td width=90 align=left>
                    <label for=itemname>Item ID: </label>
                </td>

                <td width=90 align=left>
                    <input type=text id=itemname name=itemname>
                </td>
            </tr>

            <tr height=30>                
                <td width=160 align=left>
                    <label for=sale>Sale Price: </label>
                </td>

                <td width=90 align=left>
                    <input type=text id=saleprice name=saleprice>
                </td>
            </tr>

            <tr height=30>
                <td width=90 align=left>
                    <label for=quantity>Quantity: </label>
                </td>

                <td width=90 align=left>
                    <input type=text id=quantity name=quantity>
                </td>
            </tr>
            
                    <tr>
                        <td>
                
                        </td>
                
                        <td width=90 align=left  height=30>
                            <input type=submit name=update value='Update the Record'>
                        </td>
                    </tr>
                </form>
            </table>
        ";
    ?>
    </body>
</html>

<?php
if(isset($_POST["update"]))
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

    $INVID = $_POST["invid"];
    $ITEMID = $_POST["itemid"];
    $SALEPRICE = $_POST["sale"];
    $QUANTITY = $_POST["quantity"];

    $sql_select="UPDATE sold SET invoice_id=$INVID, item_id='$ITEMID', sale_price='$SALEPRICE', sold_quantity=$QUANTITY WHERE item_id=$ITEMID and invoice_id=$INVID";

	$query_id3 = oci_parse($con, $sql_select);
    $runselect = oci_execute($query_id3);

    if(!$runselect)
    {
        echo "<br>";
        echo "Updation Unsucessful";

        die();
    }
    else
    {
        echo "<br>";
        echo "Record Updated";
    }
}
?>