<html>
<head>
<title> All Suppliers and Items Report</title>
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

    $sql_select="select s.SUPPLIER_ID, s.SUPPLIER_NAME, i.ITEM_ID, i.ITEM_NAME".
                " from SUPPLIER s, ITEM i".
                " where s.SUPPLIER_ID=i.SUPPLIER_ID";

	$query_id3 = oci_parse($con, $sql_select);
    $runselect = oci_execute($query_id3);

    if(!($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS)))
    {
        echo "Query Unsucessfull";

        die();
    }
    
    echo
    "
        <h2> All Suppliers and Items Information </h2>

        <hr>

        <table border=1>
            <tr height=30>
                <td width=90 align=right> SUPPLIER_ID </td>
                <td width=90 align=left> SUPPLIER_NAME </td>
                <td width=90 align=left> ITEM_ID </td>
                <td width=90 align=right> ITEM_NAME </td>
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
                    <td width=100 align=right> $row[0] </td>
                    <td width=130 align=left> $row[1] </td>
                    <td width=90 align=left> $row[2] </td>
                    <td width=90 align=right> $row[3] </td>
                </tr>
            </table>
        ";
    }
?>
</body>
</html>
