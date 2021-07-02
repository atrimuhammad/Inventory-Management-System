<html>
<head>
<title> All Sales Report</title>
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

    $sql_select="select s.INVOICE_ID, s.ITEM_ID, s.SALE_PRICE, s.SOLD_QUANTITY, i.INVOICE_DATE".
                  " from SOLD s, INVOICE i".
                  " where s.INVOICE_ID=i.INVOICE_ID".
                  " order by i.INVOICE_DATE desc";

	$query_id3 = oci_parse($con, $sql_select);
    $runselect = oci_execute($query_id3);

    if(!($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS)))
    {
        echo "Query Unsucessfull";

        die();
    }
    
    echo
    "
        <h2> All Sales Information </h2>

        <hr>

        <table border=1>
            <tr height=30>
                <td width=90 align=right> INVOICE_ID </td>
                <td width=90 align=left> ITEM_ID </td>
                <td width=90 align=left> SALE_PRICE </td>
                <td width=90 align=right> SOLD_QUANTITY </td>
                <td width=90 align=right> INVOICE_DATE </td>
            </tr>

            <tr height=30>
                <td width=90 align=right> $row[0] </td>
                <td width=90 align=left> $row[1] </td>
                <td width=90 align=left> $row[2] </td>
                <td width=90 align=right> $row[3] </td>
                <td width=90 align=right> $row[4] </td>
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
                    <td width=95 align=left> $row[2] </td>
                    <td width=134 align=right> $row[3] </td>
                    <td width=115 align=right> $row[4] </td>
                </tr>
            </table>
        ";
    }
?>
</body>
</html>
