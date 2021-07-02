<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Suppliers</title>
</head>
<body>
    <h2> Search Suppliers </h2>

    <table>
        <form action="all_suppliers_report.php" method="post">
            <tr height="30">
                <td></td>
                <td>
                    <select name="allsome" id="allsome">
                        <option value="all">All</option>
                    </select>
                </td>
                <td width="100" align="left">
                    <input type="Submit" value="List All Suppliers">
                </td>
            </tr>
        </form>

        <form action="supplier_item_report.php" method="post">
            <tr height="30">
                <td width="110" align="left">
                   
                </td>

                <td width="100" align="left">
                    
                </td>

                <td width="100" align="left">
                    <input type="Submit" value="Supplement all Items Information Suppliers are Responsible For">
                </td>
            </tr>
        </form>

        <form action="supplier_shipment_report.php" method="post">
            <tr height="30">
                <td width="110" align="left">
                
                </td>

                <td width="100" align="left">
                    
                </td>

                <td width="100" align="left">
                    <input type="Submit" value="Supplement all Shipments supplied all Supplier">
                </td>
            </tr>
        </form>
    </table>    
</body>
</html>