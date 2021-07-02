<html>
<head>
<title> All Suppliers and Shipments Report</title>
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

    //$SUPPLIERID = $_POST["supplierid"];

    $sql_select="select s.SUPPLIER_ID, s.SUPPLIER_NAME, sh.SHIP_ID, sh.SHIPMENT_DATE, sh.TOTAL_PRICE, (select count(item_id) as c from item i where i.supplier_id = s.supplier_id)".
                " from SUPPLIER s, SHIPMENT sh".
                " where s.SUPPLIER_ID=sh.SUPPLIER_ID".
                " order by s.SUPPLIER_ID";

	$query_id3 = oci_parse($con, $sql_select);
    $runselect = oci_execute($query_id3);

    if(!($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS)))
    {
        echo "Query Unsucessfull";

        die();
    }
    
    echo
    "
        <h2> All Suppliers and Shipments Information </h2>

        <hr>

        <table border=1>
            <tr height=30>
                <td width=150 align=right> SUPPLIER_ID </td>
                <td width=150 align=left> SUPPLIER_NAME </td>
                <td width=150 align=left> SHIP_ID </td>
                <td width=150 align=right> SHIPMENT_DATE </td>
                <td width=150 align=right> TOTAL_PRICE </td>
                <td width=150 align=right> ITEMS_COUNT </td>
            </tr>

            <tr height=30>
                <td width=150 align=right> $row[0] </td>
                <td width=150 align=left> $row[1] </td>
                <td width=150 align=left> $row[2] </td>
                <td width=150 align=right> $row[3] </td>
                <td width=150 align=right> $row[4] </td>
                <td width=150 align=right> $row[5] </td>
            </tr>
        </table>
    ";
    
    while($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS))
    {
        echo
        "
            <table border=1>
                <tr height=30>
                    <td width=150 align=right> $row[0] </td>
                    <td width=150 align=left> $row[1] </td>
                    <td width=150 align=left> $row[2] </td>
                    <td width=150 align=right> $row[3] </td>
                    <td width=150 align=right> $row[4] </td>
                    <td width=150 align=right> $row[5] </td>
                </tr>
            </table>
        ";
    }
?>
</body>
</html>
