<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <title>Live Prices</title>
    </head>

    <body>
        <div class="container">
            <nav class="navbar justify-content-end">
                <button id="refreshBtn" class="btn btn-primary">
                    Обновить
                </button>
            </nav>
            <table class="table">
                <thead>
                    <tr>
                        <th>Название</th>
                        <th>Цена</th>
                        <th>Количество</th>
                    </tr>
                </thead>
                <tbody id="data">
                </tbody>
            </table>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>
            function refreshData() {
                $.getJSON('/api/stocks', function (res) {
                    $data = $('#data').empty();
                    res.data.forEach(function (item) {
                        $tr = $data.append('<tr></tr>');
                        $tr.append('<td>' + item.name + '</td>');
                        $tr.append('<td>' + item.amount + '</td>');
                        $tr.append('<td>' + item.volume + '</td>');
                    });
                });
            }
            $(function () {
                refreshData();
                setInterval(refreshData, 15000);
                $('#refreshBtn').on('click', function () {
                    refreshData();
                });
            });
        </script>
    </body>
</html>
