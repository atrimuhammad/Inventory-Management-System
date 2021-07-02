<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Shipments</title>
</head>
<body>
    <h2> Search Shipments, Shipments Suppliers and Shipments Cargo Details </h2>

    <table>
        <form action="shipments_report.php" method="post">
            <tr height="30">
                <td width="110" align="left">
                    <label for="shipmentstatus">Shipments:</label>
                </td>

                <td width="100" align="left">
                    <select name="shipmentstatus" id="shipmentstatus">
                        <option value="all">All Shipments</option>
                        <option value="enroute">En-Route Shipments</option>
                        <option value="completed">Completed Shipments</option>
                        <option value="late">Late Shipments</option>
                    </select>
                </td>

                <td width="100" align="left">
                    <input type="Submit" value="List Shipments">
                </td>
            </tr>
        </form>

        <form action="shipment_supplier_report.php" method="post">
            <tr height="30">
                <td width="110" align="left">
                    <label for="shipmentid">Shipment ID:</label>
                </td>

                <td width="100" align="left">
                    <input type="text" id="shipmentid" name="shipmentid">
                </td>

                <td width="100" align="left">
                    <input type="Submit" value="List Shipment's Supplier Detail">
                </td>
            </tr>
        </form>

        <form action="shipment_cargo_report.php" method="post">
            <tr height="30">
                <td width="110" align="left">
                    <label for="shipmentid">Shipment ID:</label>
                </td>

                <td width="100" align="left">
                    <input type="text" id="shipmentid" name="shipmentid">
                </td>

                <td width="100" align="left">
                    <input type="Submit" value="List Shipment's Cargo Details">
                </td>
            </tr>
        </form>
    </table>    
</body>
</html>