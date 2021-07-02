<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Category Record Updation</title>
    </head>
    
    <body>
    <?php
        echo
        "
            <hr>

            <form action=edit_category_2.php method=post>
                <tr height=30>
                    <td width=90 align=left>
                        <label for=categoryid>Enter Category ID : </label>
                    </td>
    
                    <td width=90 align=left>
                        <input type=text id=categoryid name=categoryid>
                    </td>

                    <td width=90 align=left height=30>
                        <input type=submit name=search value='Search'>
                    </td>
                </tr>
            </form>

            <hr>

            <br>

            <h2> Records of the Category </h2>
        
            <table>
                <form>
                <tr height=30>
                <td width=90 align=left>
                    <label for=categoryid>Category ID: </label>
                </td>

                <td width=90 align=left>
                    <input type=text id=categoryid name=categoryid>
                </td>
                </tr>

                <tr height=30>                
                <td width=160 align=left>
                    <label for=categoryname>Category Name: </label>
                </td>

                <td width=90 align=left>
                    <input type=text id=categoryname name=categoryname>
                </td>
                </tr>

                <tr height=30>                
                    <td width=160 align=left>
                        <label for=subcategoryname>Sub-Category Name: </label>
                    </td>
    
                    <td width=90 align=left>
                        <input type=text id=subcategoryname name=subcategoryname>
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

    $CATID = $_POST["categoryid"];
    $CATNAME = $_POST["categoryname"];
    $SUBCATNAME = $_POST["subcategoryname"];

    $sql_select="UPDATE category1 SET category_id='$CATID', category_name='$CATNAME', sub_category_name='$SUBCATNAME'";

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