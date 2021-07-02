<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sales Updation</title>
    </head>
    
    <body>
    <?php
        if(isset($_POST["search"]))
        {
            $INVID = $_POST["invid"];
            $ITEMID = $_POST["itemid"];

            echo
            "
                <hr>
    
                <form action=edit_sale_2.php method=post>
                <tr height=30>
                    <td width=90 align=left>
                        <label for=invid>Enter Invoice ID : </label>
                    </td>
    
                    <td width=90 align=left>
                        <input type=text id=invid name=invid value=$INVID>
                    </td>
                <tr>

                <tr height=30>
                    <td width=90 align=left>
                        <label for=itemid>Enter Item ID : </label>
                    </td>
    
                    <td width=90 align=left>
                        <input type=text id=itemid name=itemid value=$ITEMID>
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
    
                <h2> Records of the Sale </h2>
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
                        " FROM sold".
                        " WHERE item_id=$ITEMID and invoice_id=$INVID";
                
            $query_id3 = oci_parse($con, $sql_select);
            $runselect = oci_execute($query_id3);
                
            if(!($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS)))
            {
                echo "No employee exists; having EMPNO '".$EMPNUM."'";
                
                die();
            }

            echo
            "
                <table>
                    <form  action=edit_sale_1.php method=post>
                    <tr height=30>
                    <td width=90 align=left>
                        <label for=invid>Invoice ID: </label>
                    </td>
    
                    <td width=90 align=left>
                        <input type=text id=invid name=invid value=$row[0]>
                    </td>
                </tr>
    
                <tr height=30>
                    <td width=90 align=left>
                        <label for=itemid>Item ID: </label>
                    </td>
    
                    <td width=90 align=left>
                        <input type=text id=itemname name=itemid value=$row[1]>
                    </td>
                </tr>
    
                <tr height=30>                
                    <td width=160 align=left>
                        <label for=sale>Sale Price: </label>
                    </td>
    
                    <td width=90 align=left>
                        <input type=text id=sale name=sale value=$row[2]>
                    </td>
                </tr>
    
                <tr height=30>
                    <td width=90 align=left>
                        <label for=quantity>Quantity: </label>
                    </td>
    
                    <td width=90 align=left>
                        <input type=text id=quantity name=quantity value=$row[3]>
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