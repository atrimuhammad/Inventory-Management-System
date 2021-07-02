<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Category Insertion</title>
    </head>
    <body>
        <h2> Enter New Category </h2>

        <table>
            <form method="post">
                <tr height="30">
                    <td width="90" align="left">
                        <label for="categoryid">Category ID: </label>
                    </td>
    
                    <td width="90" align="left">
                        <input type="text" id="categoryid" name="categoryid">
                    </td>
                </tr>

                <tr height="30">                
                    <td width="160" align="left">
                        <label for="categoryname">Category Name: </label>
                    </td>
    
                    <td width="90" align="left">
                        <input type="text" id="categoryname" name="categoryname">
                    </td>
                </tr>

                <tr height="30">                
                    <td width="160" align="left">
                        <label for="subcategoryname">Sub-Category Name: </label>
                    </td>
    
                    <td width="90" align="left">
                        <input type="text" id="subcategoryname" name="subcategoryname">
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

    $CATID = $_POST["categoryid"];
    $CATNAME = $_POST["categoryname"];
    $SUBCATNAME = $_POST["subcategoryname"];

    $sql_select="INSERT INTO category1 VALUES ('$CATID', '$CATNAME', '$SUBCATNAME')";

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