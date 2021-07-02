<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shipment Record Updation</title>
    </head>
    
    <body>
    <?php
        echo
        "
            <hr>

            <form action=edit_shipment_2.php method=post>
            <tr height=30>                
            <td width=160 align=left>
                <label for=shipmentid>Shipment ID: </label>
            </td>

            <td width=90 align=left>
                <input type=text id=shipmentid name=shipmentid>
            </td>
            </tr>
                
                <td width=90 align=left height=30>
                <input type=submit name=search value='Search'>
                </td>
                <tr>
            </form>

            <hr>

            <br>

            <h2> Records of the Shipment </h2>
        
            <table>
                <form>
                <tr height=30>
                    <td width=90 align=left>
                        <label for=empid>Employee ID: </label>
                    </td>
    
                    <td width=90 align=left>
                        <input type=text id=empid name=empid>
                    </td>
                </tr>

                <tr height=30>
                    <td width=90 align=left>
                        <label for=supplierid>Supplier ID: </label>
                    </td>
    
                    <td width=90 align=left>
                        <input type=text id=supplierid name=supplierid>
                    </td>
                </tr>
                
                <tr height=30>               
                    <td width=160 align=left>
                        <label for=shipmentid>Shipment ID: </label>
                    </td>
    
                    <td width=90 align=left>
                        <input type=text id=shipmentid name=shipmentid>
                    </td>
                </tr>

                <tr height=30>
                    <td width=90 align=left>
                        <label for=totalitems>Total Items: </label>
                    </td>
    
                    <td width=90 align=left>
                        <input type=text id=totalitems name=totalitems>
                    </td>
                </tr>

                <tr height=30>
                    <td width=90 align=left>
                        <label for=totalprice>Total Price: </label>
                    </td>
    
                    <td width=90 align=left>
                        <input type=text id=totalprice name=totalprice>
                    </td>
                </tr>
            
                    <tr>
                        <td>
                
                        </td>
                
                        <td width=90 align=left  height=30>
                            <input type=submit name=update value='Received'>
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

    $EMPID = $_POST["empid"];
    $SHIPID = $_POST["shipmentid"];
    $TOTALITEMS = $_POST["totalitems"];
    $TOTALPRICE = $_POST["totalprice"];
    $SUPPLIERID = $_POST["supplierid"];

    $sql_select="UPDATE shipment SET supplier_id='$SUPPLIERID', emp_id='$EMPID', total_price=$TOTALPRICE, total_items=$TOTALITEMS, shipment_date=TO_DATE(SYSDATE, 'dd-MM-yyyy'), Status='C' WHERE ship_id='$SHIPID'";

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