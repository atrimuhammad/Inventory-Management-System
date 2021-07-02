<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Assign Items</title>
    </head>
    <body>
        <h2> Assign Items to Suppliers </h2>

        <table>
            <form method="post">
                <tr height="30">
                    <td width="90" align="left">
                        <label for="suppID">Supplier ID : </label>
                    </td>
    
                    <td width="90" align="left">
                        <input type="text" id="suppID" name="suppID">
                    </td>

                    <td width="90" align="left">
                        <label for="itemID">Item ID : </label>
                    </td>
    
                    <td width="90" align="left">
                        <input type="text" id="itemID" name="itemID">
                    </td>
					
					<td width="90" align="left">
						<label for="task">Choose a task:</label>
					</td>

					<td width="90" align="left">
						<select id="task" name="task">
						  <option value="assign">Assign</option>
						  <option value="remove">Remove</option>
						</select>
					</td>
                </tr>
                <tr>
                    <td>
    
                    </td>
    
                    <td width="90" align="left"  height="30">
                        <input type="submit" name="submit" value="Save to Database">
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
    
    $task =  $_POST["task"];
	$supp_ID = $_POST["suppID"];
	$item_ID = $_POST["itemID"];
	
	if($task == 'assign')
	{
		$sql_select="UPDATE item
					SET supplier_id = '$supp_ID'
                    WHERE item_id = '$item_ID'";
                    
        $query_id3 = oci_parse($con, $sql_select);
        $runselect = oci_execute($query_id3);

        if(!$runselect)
        {
            echo "<br>";
            echo "Task Unsuccessful";
    
            die();
        }
        else
        {
            echo "<br>";
            echo "Task Successful";
        }
	}
	if($task == 'remove')
	{
		$sql_select="UPDATE item
					SET supplier_id = NULL
					WHERE item_id = '$item_ID'
                    AND supplier_id = '$supp_ID'";

	    $query_id3 = oci_parse($con, $sql_select);
        $runselect = oci_execute($query_id3);

        if(!$runselect)
        {
            echo "<br>";
            echo "Task Unsuccessful";
    
            die();
        }
        else
        {
            echo "<br>";
            echo "Task Successful";
        }
	}
}
?>	