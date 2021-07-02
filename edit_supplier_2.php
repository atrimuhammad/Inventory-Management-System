<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Supplier Updation</title>
    </head>
    
    <body>
    <?php
        if(isset($_POST["search"]))
        {
            $SUPPLIERID = $_POST["supplierid"];

            echo
            "
                <hr>
    
                <form action=edit_supplier_2.php method=post>
                <tr height=30>
                    <td width=90 align=left>
                        <label for=supplierid>Enter Supplier ID : </label>
                    </td>
    
                    <td width=90 align=left>
                        <input type=text id=supplierid name=supplierid value=$SUPPLIERID>
                    </td>

                    <td width=90 align=left height=30>
                        <input type=submit name=search value='Search'>
                    </td>
                </tr>
                </form>
    
                <hr>
    
                <br>
    
                <h2> Records of the Supplier </h2>
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
                        " FROM supplier".
                        " WHERE supplier_id=$SUPPLIERID";
                
            $query_id3 = oci_parse($con, $sql_select);
            $runselect = oci_execute($query_id3);
                
            if(!($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS)))
            {
                echo "No supplier exists; having SUPPLIER ID '".$SUPPLIERID."'";
                
                die();
            }

            echo
            "
                <table>
                    <form  action=edit_supplier_1.php method=post>
                    <tr height=30>
                    <td width=90 align=left>
                        <label for=supplierid>Supplier ID: </label>
                    </td>
    
                    <td width=90 align=left>
                        <input type=text id=supplierid name=supplierid value=$row[0]>
                    </td>
                </tr>
    
                <tr height=30>
                    <td width=90 align=left>
                        <label for=suppliername>Supplier Name: </label>
                    </td>
    
                    <td width=90 align=left>
                        <input type=text id=suppliername name=suppliername value=$row[1]>
                    </td>
                </tr>
    
                <tr height=30>                
                    <td width=160 align=left>
                        <label for=contactno>Contact No.: </label>
                    </td>
    
                    <td width=90 align=left>
                        <input type=text id=contactno name=contactno value=$row[2]>
                    </td>
                </tr>
    
                <tr height=30>
                    <td width=90 align=left>
                        <label for=email>Email: </label>
                    </td>
    
                    <td width=90 align=left>
                        <input type=text id=email name=email value=$row[3]>
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