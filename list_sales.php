<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Sales</title>
</head>
<body>
    <h2> Search Sales </h2>

    <table>
        <form action="all_sales_report.php" method="post">
            <tr height="30">
                <td></td>
                <td>
                    <select name="allsome" id="allsome">
                        <option value="all">All</option>
                    </select>
                </td>
                <td width="100" align="left">
                    <input type="Submit" value="List All Sales">
                </td>
            </tr>
        </form>

        <form action="sales_item_report.php" method="post">
            <tr height="30">
                <td width="110" align="left">
                    <label for="itemid">Item ID: </label>
                </td>

                <td width="100" align="left">
                    <input type="text" id="itemid" name="itemid">
                </td>

                <td width="100" align="left">
                    <input type="Submit" value="List Sales of this Item">
                </td>
            </tr>
        </form>
    </table>    
</body>
</html>