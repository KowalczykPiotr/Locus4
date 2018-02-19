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

    </style>

</head>
<body>


<h4>@lang('mail.title')</h4>
<p>@lang('mail.message')</p>


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