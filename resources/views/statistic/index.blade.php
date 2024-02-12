<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h2>Attendance</h2>
    <form method="POST" action="{{ route('statistics.attendance') }}">
        @csrf
        <input type="text"  name="attendance" ><br><br>
        <input type="submit" value="Submit">
    </form>

    @if (isset($vacations))
    {
        @foreach ($vacations as $vacation)
            {{$vacation}}
        @endforeach
    }
        
    @endif


    <h2>Vacation</h2>

    <form method="POST" action="{{ route('statistics.ends') }}">
        @csrf
        <input type="text"  name="endDate" ><br><br>
        <input type="submit" value="Submit">
    </form>
    <br><br>


    <table>
        <thead>
            <tr>
                <th>Province</th>
                <th>Number of Personnel</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($personnelCounts as $count)
                <tr>
                    <td>{{ $count->address }}</td>
                    <td>{{ $count->personnel_count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    

</body>
</html>