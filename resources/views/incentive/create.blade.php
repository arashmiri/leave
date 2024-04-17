<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    @include('errors.message')

    <h2>ثبت مرخصی تشویقی</h2>

    <form action="{{route('incentive.store')}}" method="POST">
        @csrf
        <label for="fname">کد کارگزینی</label><br>
        <input type="text" id="" name="code" value=""><br>
        <label for="fname">علت تشویقی</label><br>
        <input type="text" id="" name="title" value=""><br>
        <label for="fname">تعداد روز تشویقی</label><br>
        <input type="number" id="" name="days" value=""><br>
        <input type="submit" value="Submit">
    </form> 

    <p>-------------------------------------------------------------------</p><br>

    <h2>ثبت مرخصی برای همه افراد تیپ</h2>

    <form action="{{route('incentiveMany.store')}}" method="POST">
        @csrf
        <label for="fname">علت تشویقی</label><br>
        <input type="text" id="" name="title" value=""><br>
        <label for="fname">تعداد روز تشویقی</label><br>
        <input type="number" id="" name="days" value=""><br>
        <input type="submit" value="Submit">
    </form> 

</body>
</html>