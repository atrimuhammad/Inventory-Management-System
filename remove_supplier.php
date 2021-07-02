<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Supplier Deletion</title>
    </head>
    <body>
        <h3> Enter Supplier ID of a Supplier, whom record you want to remove </h3>

        <table>
            <form method="post">
                <tr height="30">
                    <td width="90" align="left">
                        <label for="supplierid">Supplier ID: </label>
                    </td>
    
                    <td width="90" align="left">
                        <input type="text" id="supplierid" name="supplierid">
                    </td>
                </tr>

                <tr>
                    <td>
    
                    </td>
    
                    <td width="90" align="left"  height="30">
                        <input type="submit" name="submit" value="Remove">
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

    $SUPPLIERID = $_POST["supplierid"];

    $sql_select="DELETE FROM supplier WHERE supplier_id=$SUPPLIERID";

	$query_id3 = oci_parse($con, $sql_select);
    $runselect = oci_execute($query_id3);

    if(!$runselect)
    {
        echo "<br>";
        echo "Deletion Unsucessful";

        die();
    }
    else
    {
        echo "<br>";
        echo "Record Deleted";
    }
}
?>