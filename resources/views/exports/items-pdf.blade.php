<!DOCTYPE html>
<html>
<head>
    <title>Items Report</title>

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
        }

        th {
            background: #dddddd;
        }
    </style>
</head>
<body>

    <h1>Lost and Found Items Report</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Item</th>
            <th>Description</th>
            <th>Status</th>
        </tr>

        @foreach($items as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->item_name }}</td>
            <td>{{ $item->description }}</td>
            <td>{{ $item->status }}</td>
        </tr>
        @endforeach

    </table>

</body>
</html>