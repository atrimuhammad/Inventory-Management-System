<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Supplier Insertion</title>
    </head>
    <body>
        <h2> Enter Records of Supplier </h2>

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

                <tr height="30">
                    <td width="90" align="left">
                        <label for="suppliername">Supplier Name: </label>
                    </td>
    
                    <td width="90" align="left">
                        <input type="text" id="suppliername" name="suppliername">
                    </td>
                </tr>

                <tr height="30">                
                    <td width="160" align="left">
                        <label for="contactno">Contact No.: </label>
                    </td>
    
                    <td width="90" align="left">
                        <input type="text" id="contactno" name="contactno">
                    </td>
                </tr>

                <tr height="30">
                    <td width="90" align="left">
                        <label for="email">Email: </label>
                    </td>
    
                    <td width="90" align="left">
                        <input type="text" id="email" name="email">
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

    $SUPPLIERID = $_POST["supplierid"];
    $SUPPLIERNAME = $_POST["suppliername"];
    $CONTACTNO = $_POST["contactno"];
    $EMAIL = $_POST["email"];

    $sql_select="INSERT INTO supplier VALUES ('$SUPPLIERID', '$SUPPLIERNAME', '$CONTACTNO', '$EMAIL')";

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