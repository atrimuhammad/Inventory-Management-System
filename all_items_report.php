<html>
<head>
<title> All Items Report</title>
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

    $ALLSOME = $_POST["allsome"];

    $sql_select="select ITEM_ID, CATEGORY_ID, SUPPLIER_ID, SHELF_ID, ITEM_NAME, ITEM_PRICE, TOTAL_QUANTITY_ON_SHELF".
                  " from ITEM";

	$query_id3 = oci_parse($con, $sql_select);
    $runselect = oci_execute($query_id3);

    if(!($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS)))
    {
        echo "Query Unsucessfull";

        die();
    }
    
    echo
    "
        <h2> All Items Information </h2>

        <hr>

        <table border=1>
            <tr height=30>
                <td width=90 align=right> ITEM_ID </td>
                <td width=90 align=left> CATEGORY_ID </td>
                <td width=90 align=left> SUPPLIER_ID </td>
                <td width=90 align=right> SHELF_ID </td>
                <td width=90 align=left> ITEM_NAME </td>
                <td width=90 align=right> ITEM_PRICE </td>
                <td width=90 align=left> TOTAL_QUANTITY_ON_SHELF </td>
            </tr>

            <tr height=30>
                <td width=90 align=right> $row[0] </td>
                <td width=90 align=left> $row[1] </td>
                <td width=90 align=left> $row[2] </td>
                <td width=90 align=right> $row[3] </td>
                <td width=90 align=left> $row[4] </td>
                <td width=90 align=right> $row[5] </td>
                <td width=90 align=right> $row[6] </td>
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
                    <td width=110 align=left> $row[1] </td>
                    <td width=100 align=left> $row[2] </td>
                    <td width=90 align=right> $row[3] </td>
                    <td width=94 align=left> $row[4] </td>
                    <td width=93 align=right> $row[5] </td>
                    <td width=230 align=right> $row[6] </td>
                </tr>
            </table>
        ";
    }
?>
</body>
</html>
