<!doctype html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>سامانه ثبت مرخصی پایوران</title>
    <link rel="stylesheet" href="{{ url('/css/output.css') }}" />
</head>

<body class="bg-gray-100">
    <div>
        <div class="flex items-center justify-between h-20 px-10 shadow-lg">
            <p class="font-medium text-lg">سامانه ثبت مرخصی پایوران</p>
            <a href="./" class="bg-white rounded-full p-2 shadow-lg">
                <img src="{{ url('/images/logo.png') }}" alt="logo" class="w-12" />
            </a>
        </div>

        <div class="my-10 max-w-7xl m-auto space-y-6">
            <div class="flex flex-col space-y-6">
                <div class="flex justify-between items-center space-x-3 space-x-reverse">
                    <div class="flex items-center">
                        <a href="./">
                            <span class="text-lg">صفحه اصلی</span>
                        </a>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                        </svg>
                        <a href="./user.html">
                            <span class="text-lg">مشاهده اطلاعات پایور</span>
                        </a>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                        </svg>
                        <a href="#">
                            <span class="font-semibold text-lg">تاریخچه مرخصی</span>
                        </a>
                    </div>
                    
                    <div class="flex items-center justify-end space-x-4 space-x-reverse">
                        <a href="{{route('employees.show' , $employee->id)}}" class="flex items-center justify-center 
                          bg-gradient-to-r from-red-500 to-red-700 text-white w-28 h-10 rounded-md cursor-pointer">
                            <span>بازگشت</span>
                        </a>
                    </div>
                </div>

                @include('errors.message')

                @foreach ($employee->vacations->reverse() as $vacation)

                <div class="my-6 w-full">

                    <div class="flex items-center space-x-4 space-x-reverse w-full">

                        <div
                            class="flex items-center space-x-6 space-x-reverse rounded-xl shadow-lg p-3 px-6 bg-white w-full">
                            
                            <div class="flex flex-wrap space-x-10 space-y-3">
                                <div class="flex items-center space-x-10 space-x-reverse">
                                    <span class="text-lg font-bold"> {{$vacation->employee->rank}}  {{$vacation->employee->name}} {{$vacation->employee->code}}</span>
                                    <span class="text-lg">تاریخ رفت: {{$vacation->start}}</span>
                                    <span class="text-lg">تاریخ برگشت:  {{$vacation->end}}</span>
                                    <span class="text-lg">آخرین حضور: {{$vacation->attendance}}</span>
                                </div>
                                <div class="flex items-center space-x-10 space-x-reverse">
                                    <span class="text-lg">استحقاق استفاده شده:  {{$vacation->entitlement}}</span>
                                    <span class="text-lg">تشویقی: {{$vacation->Incentive}} </span>
                                    <span class="text-lg">علت تشویقی:  {{$vacation->IncentiveDescription}}</span>
                                    <span class="text-lg">مسافت:  {{$vacation->distance}}</span>
                                    <span class="text-lg">جمع کل روزها:  {{$vacation->entitlement  + $vacation->Incentive + $vacation->distance }}</span>
                                </div>
                            </div>

                        </div>
                        @if(auth()->user()->isAdministrator())
                            <form action="{{route('vacations.destroy' , $vacation->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="حذف مرخصی">
                            </form>
                        @endif
                        <form action="{{route('vacations.print' , $vacation->id)}}" method="GET">
                            <input type="submit" value="چاپ برگه مرخصی">
                        </form>

                    </div>

                </div>

                @endforeach

            </div>

        </div>
    </div>

</body>

</html>