<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shipment Insertion</title>
    </head>
    <body>
        <h2> Enter Records of Shipment </h2>

        <table>
            <form method="post">
                <tr height="30">
                    <td width="90" align="left">
                        <label for="empid">Employee ID: </label>
                    </td>
    
                    <td width="90" align="left">
                        <input type="text" id="empid" name="empid">
                    </td>
                </tr>

                <tr height="30">
                    <td width="90" align="left">
                        <label for="supplierid">Supplier ID: </label>
                    </td>
    
                    <td width="90" align="left">
                        <input type="text" id="supplierid" name="supplierid">
                    </td>
                </tr>

                <tr height="30">                
                    <td width="160" align="left">
                        <label for="shipmentid">Shipment ID: </label>
                    </td>
    
                    <td width="90" align="left">
                        <input type="text" id="shipmentid" name="shipmentid">
                    </td>
                </tr>

                <tr height="30">
                    <td width="90" align="left">
                        <label for="totalitems">Total Items: </label>
                    </td>
    
                    <td width="90" align="left">
                        <input type="text" id="totalitems" name="totalitems">
                    </td>
                </tr>

                <tr height="30">
                    <td width="90" align="left">
                        <label for="totalprice">Total Price: </label>
                    </td>
    
                    <td width="90" align="left">
                        <input type="text" id="totalprice" name="totalprice">
                    </td>
                </tr>

                <tr height="30">
                    <td width="90" align="left">
                        <label for="date">Shipment Date: </label>
                    </td>
    
                    <td width="90" align="left">
                        <input type="text" id="date" name="date">
                    </td>
                </tr>

                <tr>
                    <td>
    
                    </td>
    
                    <td width="90" align="left"  height="30">
                        <input type="submit" name="submit" value="Received">
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

    $EMPNO = $_POST["empid"];
    $EMPNAME = $_POST["supplierid"];
    $JOB = $_POST["shipmentid"];
    $MGR = $_POST["totalitems"];
    $HIREDATE = $_POST["totalprice"];
    $SAL = $_POST["date"];

    $sql_select="INSERT INTO emp VALUES ($EMPNO, '$EMPNAME_UPPER', '$JOB_UPPER', $MGR, TO_DATE('$HIREDATE', 'dd-MM-yyyy'), $SAL, $COMM, $DEPTNO)";

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