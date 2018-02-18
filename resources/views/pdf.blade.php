<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <style type="text/css">

        table.customer tr td:nth-child(1) {

            width: 400px;
            font-weight: bold;
            text-align: left;
        }


        .letters tr>th {

            border-bottom: 1px solid #555;
        }

        table.letters tr th:nth-child(1) { width: 100px; }
        table.letters tr th:nth-child(2) { width: 500px; }
        table.letters tr th:nth-child(3) { width: 200px; }
        table.letters tr th:nth-child(4) { width: 200px; }


        body {

            font-family: DejaVu Sans;
            /*font-family: FreeSans;*/
            font-style: normal;
            font-weight: normal;
            font-size: 18px;
        }

    </style>
</head>
<body>


    <h1>Potwierdzenie przekazania korespondencji</h1>
    <h2>Dane Klienta:</h2>

    <table class="customer">

        <tr>
            <td>Nazwa</td>
            <td>{{$customer->name}}</td>
        </tr>
        <tr>
            <td>E-mail</td>
            <td>{{$customer->email}}</td>
        </tr>
        <tr>
            <td>Telefon</td>
            <td>{{$customer->phone}}</td>
        </tr>

    </table>


    <table class="letters">
        <tr>
            <th>id</th>
            <th>Nadawna</th>
            <th>Typ</th>
            <th>Otrzymano</th>
        </tr>

        @foreach ($print as $item)
        <tr>
            <td>{{$item['id']}}</td>
            <td>{{$item['name']}}</td>
            <td>{{$item['type']}}</td>
            <td>{{$item['date']}}</td>
        </tr>
        @endforeach
    </table>

</body>
</html>