<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List User</title>
    <style>
        /* Simple CSS styles for the table */
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</head>

<body>
    <h1>Users</h1>
    <h2>Hello Deploy</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody id="table-body">
            
        </tbody>
    </table>
</body>

<script type="application/javascript">
    $(document).ready(function() {
        $.ajax({
            type: 'GET',
            url: '/api/users',
            success: function(data) {
                // console.log(data);
                $("#table-body").empty();
                $.each(data.users, function(index, user) {
                    $("#table-body").append(
                        '<tr>' +
                        '<td>' + user.id + '</td>' +
                        '<td>' + user.name + '</td>' +
                        '<td>' + user.email + '</td>' +
                        '</tr>'
                    );
                });
            },
            error: function(error) {
                console.log("error: ", error);
            },
        })
    });
</script>

</html>