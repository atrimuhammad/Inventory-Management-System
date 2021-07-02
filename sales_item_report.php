<html>
<head>
<title> Sales of Specific Items Report</title>
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

    $ITEMID = $_POST["itemid"];

    $sql_select="select s.INVOICE_ID, s.ITEM_ID, s.SALE_PRICE, s.SOLD_QUANTITY".
                  " from SOLD s".
                  " where s.ITEM_ID=$ITEMID";

	$query_id3 = oci_parse($con, $sql_select);
    $runselect = oci_execute($query_id3);

    if(!($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS)))
    {
        echo "Query Unsucessfull";

        die();
    }
    
    echo
    "
        <h2> Sales of Choosen Item Report </h2>

        <hr>

        <table border=1>
            <tr height=30>
                <td width=90 align=right> INVOICE_ID </td>
                <td width=90 align=left> ITEM_ID </td>
                <td width=90 align=left> SALE_PRICE </td>
                <td width=90 align=right> SOLD_QUANTITY </td>
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
                    <td width=94 align=left> $row[2] </td>
                    <td width=134 align=right> $row[3] </td>
                </tr>
            </table>
        ";
    }
?>
</body>
</html>
