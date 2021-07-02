<html>
<head>
<title> Shipments Information </title>
</head>

<body>
<?php
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

    $SHIPMENTSTATUS = $_POST["shipmentstatus"];

    if($SHIPMENTSTATUS == 'all')
    {
        $sql_select="select ship_id, issue_date, shipment_date, total_items, total_price, status".
                  " from shipment";

	    $query_id3 = oci_parse($con, $sql_select);
        $runselect = oci_execute($query_id3);

        if(!($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS)))
        {
            echo "No Shipment exists";

            die();
        }
    
        echo
        "
            <h2> Shipments Information </h2>

            <hr>

            <table border=1>
                <tr height=30>
                    <td width=150 align=right> SHIPMENT_ID </td>
                    <td width=150 align=left> ISSUE_DATE </td>
                    <td width=150 align=left> SHIPMENT_DATE </td>
                    <td width=150 align=right> TOTAL_ITEMS </td>
                    <td width=150 align=left> TOTAL_PRICE </td>
                    <td width=150 align=left> STATUS </td>
                </tr>

                <tr height=30>
                    <td width=150 align=right> $row[0] </td>
                    <td width=150 align=left> $row[1] </td>
                    <td width=150 align=left> $row[2] </td>
                    <td width=150 align=right> $row[3] </td>
                    <td width=150 align=left> $row[4] </td>
                    <td width=150 align=left> $row[5] </td>
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
                        <td width=150 align=left> $row[4] </td>
                        <td width=150 align=left> $row[5] </td>
                    </tr>
                </table>
            ";
        }
    }
    if($SHIPMENTSTATUS == 'enroute')
    {
        $sql_select="select ship_id, issue_date, shipment_date, total_items, total_price, status".
                  " from shipment".
                  " where status='E'";

	    $query_id3 = oci_parse($con, $sql_select);
        $runselect = oci_execute($query_id3);

        if(!($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS)))
        {
            echo "No Shipment exists";

            die();
        }
    
        echo
        "
            <h2> Shipments Information </h2>

            <hr>

            <table border=1>
                <tr height=30>
                    <td width=150 align=right> SHIPMENT_ID </td>
                    <td width=150 align=left> ISSUE_DATE </td>
                    <td width=150 align=left> SHIPMENT_DATE </td>
                    <td width=150 align=right> TOTAL_ITEMS </td>
                    <td width=150 align=left> TOTAL_PRICE </td>
                    <td width=150 align=left> STATUS </td>
                </tr>

                <tr height=30>
                    <td width=150 align=right> $row[0] </td>
                    <td width=150 align=left> $row[1] </td>
                    <td width=150 align=left> $row[2] </td>
                    <td width=150 align=right> $row[3] </td>
                    <td width=150 align=left> $row[4] </td>
                    <td width=150 align=left> $row[5] </td>
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
                        <td width=150 align=left> $row[4] </td>
                        <td width=150 align=left> $row[5] </td>
                    </tr>
                </table>
            ";
        }
    }

    if($SHIPMENTSTATUS == 'completed')
    {
        $sql_select="select ship_id, issue_date, shipment_date, total_items, total_price, status".
                  " from shipment".
                  " where status='C'";

	    $query_id3 = oci_parse($con, $sql_select);
        $runselect = oci_execute($query_id3);

        if(!($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS)))
        {
            echo "No Shipment exists";

            die();
        }
    
        echo
        "
            <h2> Shipments Information </h2>

            <hr>

            <table border=1>
                <tr height=30>
                    <td width=150 align=right> SHIPMENT_ID </td>
                    <td width=150 align=left> ISSUE_DATE </td>
                    <td width=150 align=left> SHIPMENT_DATE </td>
                    <td width=150 align=right> TOTAL_ITEMS </td>
                    <td width=150 align=left> TOTAL_PRICE </td>
                    <td width=150 align=left> STATUS </td>
                </tr>

                <tr height=30>
                    <td width=150 align=right> $row[0] </td>
                    <td width=150 align=left> $row[1] </td>
                    <td width=150 align=left> $row[2] </td>
                    <td width=150 align=right> $row[3] </td>
                    <td width=150 align=left> $row[4] </td>
                    <td width=150 align=left> $row[5] </td>
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
                        <td width=150 align=left> $row[4] </td>
                        <td width=150 align=left> $row[5] </td>
                    </tr>
                </table>
            ";
        }
    }
    if($SHIPMENTSTATUS == 'late')
    {
        $sql_select="select ship_id, issue_date, shipment_date, total_items, total_price, status".
                  " from shipment".
                  " where status='L'";

	    $query_id3 = oci_parse($con, $sql_select);
        $runselect = oci_execute($query_id3);

        if(!($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS)))
        {
            echo "No Shipment exists";

            die();
        }
    
        echo
        "
            <h2> Shipments Information </h2>

            <hr>

            <table border=1>
                <tr height=30>
                    <td width=150 align=right> SHIPMENT_ID </td>
                    <td width=150 align=left> ISSUE_DATE </td>
                    <td width=150 align=left> SHIPMENT_DATE </td>
                    <td width=150 align=right> TOTAL_ITEMS </td>
                    <td width=150 align=left> TOTAL_PRICE </td>
                    <td width=150 align=left> STATUS </td>
                </tr>

                <tr height=30>
                    <td width=150 align=right> $row[0] </td>
                    <td width=150 align=left> $row[1] </td>
                    <td width=150 align=left> $row[2] </td>
                    <td width=150 align=right> $row[3] </td>
                    <td width=150 align=left> $row[4] </td>
                    <td width=150 align=left> $row[5] </td>
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
                        <td width=150 align=left> $row[4] </td>
                        <td width=150 align=left> $row[5] </td>
                    </tr>
                </table>
            ";
        }
    }
?>
</body>
</html>
