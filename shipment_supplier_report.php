<html>
<head>
<title> Shipment's Supplier Information </title>
</head>

<body>
<?php
    $db_sid = "(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = Athar)(PORT = 1522))(CONNECT_DATA =(SERVER = DEDICATED)(SERVICE_NAME = atharr)))";
  
    $db_user = "scott";
    $db_pass = "1234";
    $con = oci_connect($db_user,$db_pass,$db_sid);

    if($con) {
        
    } 
    else 
    {
        die('Could not connect to Oracle');
    }

    $SHIP_ID = $_POST["shipmentid"];

    $sql_select="select SUPPLIER_ID, SUPPLIER_NAME, SUPPLIER_CONTACT_NO, SUPPLIER_EMAIL".
                  " from SUPPLIER".
                  " where SUPPLIER_ID=
                                    (
                                    SELECT SUPPLIER_ID
                                    FROM SHIPMENT
                                    WHERE SHIP_ID=$SHIP_ID
                                    )";

	$query_id3 = oci_parse($con, $sql_select);
    $runselect = oci_execute($query_id3);

    if(!($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS)))
    {
        echo "Query Unsucessfull";

        die();
    }
    
    echo
    "
        <h2> Shipment's Supplier Information </h2>

        <hr>

        <table border=1>
            <tr height=30>
                <td width=90 align=right> SUPPLIER_ID </td>
                <td width=90 align=left> SUPPLIER_NAME </td>
                <td width=90 align=left> SUPPLIER_CONTACT_NO </td>
                <td width=90 align=right> SUPPLIER_EMAIL </td>
            </tr>

            <tr height=30>
                <td width=90 align=right> $row[0] </td>
                <td width=90 align=left> $row[1] </td>
                <td width=90 align=left> $row[2] </td>
                <td width=90 align=right> $row[3] </td>
            </tr>
        </table>
    ";
    
    while($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS))
    {
        echo
        "
            <table border=1>
                <tr height=30>
                    <td width=90 align=right> $row[0] </td>
                    <td width=90 align=left> $row[1] </td>
                    <td width=90 align=left> $row[2] </td>
                    <td width=90 align=right> $row[3] </td>
                </tr>
            </table>
        ";
    }
?>
</body>
</html>
