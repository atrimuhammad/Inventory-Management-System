<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shipment Updation</title>
    </head>
    
    <body>
    <?php
        if(isset($_POST["search"]))
        {
            $SHIPID = $_POST["shipmentid"];

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
                <tr height>
                <td width=90 align=left height=30>
                <input type=submit name=search value='Search'>
                </td>
                <tr>
                </form>
    
                <hr>
    
                <br>
    
                <h2> Records of the Shipment </h2>
            ";

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
                
            $sql_select="SELECT ship_id".
                        " FROM shipment".
                        " WHERE ship_id=$SHIPID";
                
            $query_id3 = oci_parse($con, $sql_select);
            $runselect = oci_execute($query_id3);
                
            if(!($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS)))
            {
                echo "No shipment exists; having SHIP_ID '".$SHIPID."'";
                
                die();
            }

            echo
            "
                <table>
                    <form  action=edit_shipment_1.php method=post>
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
                        <input type=text id=shipmentid name=shipmentid value=$row[0]>
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
                                <input type=submit name=update value=Update the Record>
                            </td>
                        </tr>
                    </form>
                    </table>
                ";
        }
    ?>
    </body>
</html>