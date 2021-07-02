<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Item Updation</title>
    </head>
    
    <body>
    <?php
        if(isset($_POST["search"]))
        {
            $ITEMID = $_POST["itemid"];

            echo
            "
                <hr>
    
                <form action=edit_items_2.php method=post>
                <tr height=30>
                    <td width=90 align=left>
                        <label for=itemid>Enter Item ID : </label>
                    </td>
    
                    <td width=90 align=left>
                        <input type=text id=itemid name=itemid value=$ITEMID>
                    </td>

                    <td width=90 align=left height=30>
                        <input type=submit name=search value='Search'>
                    </td>
                    </tr>
                </form>
    
                <hr>
    
                <br>
    
                <h2> Records of the Item </h2>
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
                
            $sql_select="SELECT *".
                        " FROM item".
                        " WHERE item_id=$ITEMID";
                
            $query_id3 = oci_parse($con, $sql_select);
            $runselect = oci_execute($query_id3);
                
            if(!($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS)))
            {
                echo "No item exists; having ITEM_ID '".$ITEMID."'";
                
                die();
            }

            echo
            "
                <table>
                    <form  action=edit_items_1.php method=post>
                <tr height=30>
                    <td width=90 align=left>
                        <label for=itemid>Item ID: </label>
                    </td>
    
                    <td width=90 align=left>
                        <input type=text id=itemid name=itemid value=$row[0]>
                    </td>
                </tr>

                <tr height=30>
                    <td width=90 align=left>
                        <label for=itemname>Item Name: </label>
                    </td>
    
                    <td width=90 align=left>
                        <input type=text id=itemname name=itemname value=$row[1]>
                    </td>
                </tr>

                <tr height=30>                
                    <td width=160 align=left>
                        <label for=price>Purchase Price (in Rs.): </label>
                    </td>
    
                    <td width=90 align=left>
                        <input type=text id=price name=price value=$row[2]>
                    </td>
                </tr>

                <tr height=30>
                    <td width=90 align=left>
                        <label for=threshold>Threshold: </label>
                    </td>
    
                    <td width=90 align=left>
                        <input type=text id=threshold name=threshold value=$row[7]>
                    </td>
                </tr>

                <tr height=30>                
                    <td width=90 align=left>
                        <label for=quantity>Quantity: </label>
                    </td>
    
                    <td width=90 align=left>
                        <input type=text id=quantity name=quantity value=$row[6]>
                    </td>
                </tr>

                <tr height=30>                
                    <td width=90 align=left>
                        <label for=shelfid>Shelf ID: </label>
                    </td>
    
                    <td width=90 align=left>
                        <input type=text id=shelfid name=shelfid value=$row[5]>
                    </td>
                </tr>

                <tr height=30>                
                    <td width=90 align=left>
                        <label for=categoryid>Category ID: </label>
                    </td>
    
                    <td width=90 align=left>
                        <input type=text id=categoryid name=categoryid value=$row[3]>
                    </td>
                </tr>
            
                <tr height=30>                
                    <td width=90 align=left>
                        <label for=supplierid>Supplier ID: </label>
                    </td>
    
                    <td width=90 align=left>
                        <input type=text id=supplierid name=supplierid value=$row[4]>
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