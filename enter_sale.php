<?php
   //session_unset();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sale Insertion</title>
    </head>
    <body>
        <h2> Enter Records of Sale </h2>

        <table>
            <form method="post">
                <tr height="30">
                    <td width="90" align="left">
                        <label for="empid">Employee ID: </label>
                    </td>
    
                    <td width="90" align="left">
                        <input type="text" id="empid" name="empid">
                    </td>
                </tr>

                <tr height="30">
                    <td width="90" align="left">
                        <label for="invid">Invoice ID: </label>
                    </td>
    
                    <td width="90" align="left">
                        <input type="text" id="invid" name="invid">
                    </td>
                </tr>

                <tr height="30">
                    <td width="90" align="left">
                        <label for="itemid">Item ID: </label>
                    </td>
    
                    <td width="90" align="left">
                        <input type="text" id="itemid" name="itemid">
                    </td>
                </tr>

                <tr height="30">                
                    <td width="160" align="left">
                        <label for="saleprice">Sale Price: </label>
                    </td>
    
                    <td width="90" align="left">
                        <input type="text" id="saleprice" name="saleprice">
                    </td>
                </tr>

                <tr height="30">                
                    <td width="160" align="left">
                        <label for="discount">Discount: </label>
                    </td>
    
                    <td width="90" align="left">
                        <input type="text" id="discount" name="discount">
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
session_start();

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

    $EMPID = $_POST["empid"];
    $INVID = $_POST["invid"];
    $ITEMID = $_POST["itemid"];
    $SALEPRICE = $_POST["saleprice"];
    $DISCOUNT = $_POST["discount"];
    $QUANTITY = $_POST["quantity"];

    //To add sold item quantity and price in invoice
    $sql_select3="SELECT count(invoice_id) FROM invoice WHERE invoice_id='$INVID'";

	$query_id3 = oci_parse($con, $sql_select3);
    $runselect3 = oci_execute($query_id3);

    $row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS);

    //echo $row[0];

    if(!$row[0])
    {
        echo "<br>";
        echo "Not Found";

        //To add sold item to invoice (New Invoice being created)
        $sql_select4="INSERT INTO invoice VALUES ('$INVID', ' ', '$EMPID', $SALEPRICE*$QUANTITY, $QUANTITY, $DISCOUNT, ($SALEPRICE*$QUANTITY)-$DISCOUNT, to_date(SYSDATE, 'DD/MM/YYYY'))";

        $query_id4 = oci_parse($con, $sql_select4);
        $runselec4 = oci_execute($query_id4);
    }
    else
    {
        echo "<br>";
        echo "Found";

        //To add sold item to previously created invoice
        $sql_select5="UPDATE invoice SET total_price=total_price+($SALEPRICE*$QUANTITY), total_items=total_items+$QUANTITY, discount=discount+$DISCOUNT, net_price=net_price+(($SALEPRICE*$QUANTITY)-$DISCOUNT) WHERE invoice_id='$INVID'";

        $query_id5 = oci_parse($con, $sql_select5);
        $runselect5 = oci_execute($query_id5);
    }

    $sql_select="INSERT INTO sold VALUES ('$INVID', '$ITEMID', $SALEPRICE, $QUANTITY)";

	$query_id = oci_parse($con, $sql_select);
    $runselect = oci_execute($query_id);

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

    //To decrease sold item quantity on shelf
    $sql_select2="UPDATE item SET total_quantity_on_shelf=total_quantity_on_shelf-$QUANTITY WHERE item_id='$ITEMID'";

	$query_id2 = oci_parse($con, $sql_select2);
    $runselect2 = oci_execute($query_id2);

    //To place automatic order
    $sql_select5="SELECT total_quantity_on_shelf, threshold, item_price, supplier_id".
                " FROM item".
                " WHERE item_id='$ITEMID'";

    $query_id5 = oci_parse($con, $sql_select5);
    $runselec5 = oci_execute($query_id5);

    $row1 = oci_fetch_array($query_id5, OCI_BOTH+OCI_RETURN_NULLS);

    $QUANTITY1 = $row1[0];
    $QUANTITY2 = $row1[1];

    if($QUANTITY1 <= $QUANTITY2)
    {
        echo "Less ho gayi hai";

        $_SESSION["count"];
        $_SESSION["date"];
        $_SESSION["shipid"] = 1;

        if (!isset($_SESSION["count"]))
        {
            $_SESSION["count"] = 0;
            $_SESSION["shipid"] = 1;
            echo $_SESSION["count"]."<br> <br>";
            $_SESSION["date"] = date("Y-m-d");
        }
        if (isset($_SESSION["count"]))
        {
            $_SESSION["count"]++;
            echo $_SESSION["count"]."<br> <br>";

            $timeDiff = abs(date("Y-m-d") - $_SESSION["date"]);

            $numberDays = $timeDiff/86400;

            $_SESSION["date"] = date("Y-m-d");

            if($numberDays != 0)
            {
                $_SESSION["shipid"]++;
            }
            //echo "Days Diff : ".$numberDays;
        }

        $SHIP_ID = $_SESSION["shipid"];

        //To add sold item quantity and price in invoice
        $sql_select7="SELECT count(ship_id) FROM shipment WHERE ship_id='$SHIP_ID'";

	    $query_id7 = oci_parse($con, $sql_select7);
        $runselect7 = oci_execute($query_id7);

        $row2 = oci_fetch_array($query_id7, OCI_BOTH+OCI_RETURN_NULLS);

        if(!$row2[0])
        {
            echo "<br>";
            echo "Not Found 2";

            //To add ordered items to newly created shipment
            $sql_select8="INSERT INTO shipment VALUES ($SHIP_ID, '$row1[3]', ' ', NULL, NULL, to_date(SYSDATE, 'DD/MM/YYYY'), NULL, 'E')";

            $query_id8 = oci_parse($con, $sql_select8);
            $runselec8 = oci_execute($query_id8);
        }

        $sql_select6="INSERT INTO contains VALUES ($SHIP_ID, '$ITEMID', $row1[2], $QUANTITY2+20)";

	    $query_id6 = oci_parse($con, $sql_select6);
        $runselect6 = oci_execute($query_id6);
    }
}
?>