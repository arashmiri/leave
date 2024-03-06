<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ثبت مرخصی</title>
  <script src="{{ url('/js/index.js') }}"></script>
  @vite('resources/css/app.css')
</head>
<body>

    <p>ثبت مرخصی برای: {{ $personnel->rank }} {{ $personnel->name }}</p>
    <p>استحقاق باقی مانده: {{ $personnel->entitlement }}</p>
    <p>کد کار گزینی: {{ $personnel->personnel_code }}</p>

    <form action="{{route('vacation.store')}}" method="POST">
        @csrf

        <label>تاریخ رفت:</label><br>
        <input type="date" id="" name="start"><br>

        <label >تاریخ پایان:</label><br>
        <input type="date" id="" name="end"><br>

        <label >تاریخ حضور:</label><br>
        <input type="date" id="" name="attendance"><br>

        <label >استحقاق:</label><br>
        <input type="number" id="" name="entitlement"><br>

        <label >تشویقی:</label><br>
        <input type="number" id="" name="encouragement"><br>
        
        <label >در صورت ثبت مرخصی تشویقی علت آن را در کادر زیر بنویسید.</label><br>
        <input type="text" id="" name="encouragementDescription"><br>

        <label >استفاده از بعد مسافت</label><br>
        <input type="checkbox" id="" name="distance"><br>

        <input type="hidden" value="{{$personnel->id}}" name="PersonnelID">

        <input type="submit">

    </form>
</body>
</html>