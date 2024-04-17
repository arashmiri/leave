<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>مرخصی های تشویقی کاربر</h2>

    @foreach ($incentives as $incentive)
      
    <p>عنوان تشویقی</p>
    {{ $incentive->title }}<br>
    <p>تعداد روز تشویقی</p>
    {{ $incentive->days}}<br>

    <form action="{{route('incentive.destroy' , $incentive->id)}}" method="post">
        @csrf
        @method('DELETE')

    <a href=""
        class="flex items-center justify-center 
        bg-[conic-gradient(at_left,_var(--tw-gradient-stops))]  text-red w-24 h-10 rounded-md cursor-pointer">
        <input type="submit" value="حذف مرخصی تشویقی">
    </a>

    </form>
    
@endforeach
</body>
</html>