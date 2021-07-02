<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Category Updation</title>
    </head>
    
    <body>
    <?php
        if(isset($_POST["search"]))
        {
            $CATID = $_POST["categoryid"];

            echo
            "
                <hr>
    
                <form action=edit_category_2.php method=post>
                <tr height=30>
                <td width=90 align=left>
                    <label for=categoryid>Enter Category ID : </label>
                </td>

                <td width=90 align=left>
                    <input type=text id=categoryid name=categoryid value=$CATID>
                </td>

                <td width=90 align=left height=30>
                    <input type=submit name=search value='Search'>
                </td>
                </tr>
                </form>
    
                <hr>
    
                <br>
    
                <h2> Records of the Category </h2>
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
                        " FROM category1".
                        " WHERE category_id=$CATID";
                
            $query_id3 = oci_parse($con, $sql_select);
            $runselect = oci_execute($query_id3);
                
            if(!($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS)))
            {
                echo "No Category exists; having Category ID '".$CATID."'";
                
                die();
            }

            echo
            "
                <table>
                <form  action=edit_category_1.php method=post>
                <form>
                <tr height=30>
                <td width=90 align=left>
                    <label for=categoryid>Category ID: </label>
                </td>

                <td width=90 align=left>
                    <input type=text id=categoryid name=categoryid value=$row[0]>
                </td>
                </tr>

                <tr height=30>                
                <td width=160 align=left>
                    <label for=categoryname>Category Name: </label>
                </td>

                <td width=90 align=left>
                    <input type=text id=categoryname name=categoryname value=$row[1]>
                </td>
                </tr>

                <tr height=30>                
                    <td width=160 align=left>
                        <label for=subcategoryname>Sub-Category Name: </label>
                    </td>
    
                    <td width=90 align=left>
                        <input type=text id=subcategoryname name=subcategoryname value=$row[2]>
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