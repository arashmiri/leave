<!doctype html>
<html lang="en" dir="rtl">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>سامانه ثبت مرخصی پایوران</title>
  <link rel="stylesheet" href="{{ url('/css/output.css') }}" />
  <script src="{{ url('/js/datepicker.min.js') }}"></script>
  <script src="{{ url('/js/flowbite.min.js') }}"></script>
</head>

<body class="bg-gray-100">
  <div>
    <div class="flex items-center justify-between h-20 px-10 shadow-lg">
      <p class="font-medium text-lg">سامانه ثبت مرخصی پایوران</p>
      <a href="./" class="bg-white rounded-full p-2 shadow-lg">
        <img src="{{ url('/images/logo.png') }}" alt="logo" class="w-12" />
      </a>
    </div>

    <div class="my-8 max-w-7xl m-auto">
      <div class="flex flex-col space-y-6">
        <div class="flex items-center justify-between space-x-3 space-x-reverse">
          <div class="flex items-center">
            <a href="./">
              <span class="text-lg">صفحه اصلی</span>
            </a>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>
            <a href="#">
              <span class="font-semibold text-lg">مشاهده اطلاعات پایور</span>
            </a>
          </div>

          <div class="flex items-center space-x-3 space-x-reverse">

            <a href="{{route('employee.insentive' , $employee->id)}}"
              class="flex items-center justify-center 
              bg-[conic-gradient(at_left,_var(--tw-gradient-stops))] from-green-400 to-green-700 text-white w-24 h-10 rounded-md cursor-pointer">
              <span>مرخصی های تشویقی</span>
            </a>

            <a href="{{route('employees.edit' , $employee->id)}}"
              class="flex items-center justify-center 
              bg-[conic-gradient(at_left,_var(--tw-gradient-stops))] from-orange-400 to-orange-700 text-white w-24 h-10 rounded-md cursor-pointer">
              <span>ویرایش</span>
            </a>

            <form action="{{route('employees.destroy' , $employee->id)}}" method="post">
                @csrf
                @method('DELETE')
                <input type="submit" value="حذف کاربر">
            </form>

            <a href="{{ url("/employees/$employee->id/vacation") }}" class="flex items-center justify-center 
            bg-gradient-to-r from-green-400 to-green-500 text-white w-36 h-10 rounded-md cursor-pointer">
              <span>تاریخچه مرخصی ها</span>
            </a>
          </div>

        </div>

        @include('errors.message')

        <div class="container w-full rounded-lg shadow-lg p-10 py-8 bg-white space-y-8">
          <div class="container-header flex items-center space-x-6 space-x-reverse">
            <div>
              <img src="./images/user.jpg" alt="logo" class="rounded-full shadow-xl border-2 w-44 h-44" />
            </div>

            <div class="flex flex-col space-y-3">
              <span class="font-bold text-2xl">{{$employee->name}}</span>
              <span class="text-lg"> درجه : {{$employee->rank}}</span>
            </div>
          </div>

          <div class="container-body grid grid-cols-5 gap-8">
            <div class="flex flex-col items-center justify-center w-48 h-20 bg-gray-100 space-y-2 rounded-md shadow-lg">
              <span class="font-semibold">شماره کارگزینی:</span>
              <span class="text-lg">{{$employee->code}}</span>
            </div>

            <div class="flex flex-col items-center justify-center w-48 h-20 bg-gray-100 space-y-2 rounded-md shadow-lg">
              <span class="font-semibold">استحقاق باقی مانده:</span>
              <span class="text-lg">{{$employee->entitlement}}</span>
            </div>

            <div class="flex flex-col items-center justify-center w-48 h-20 bg-gray-100 space-y-2 rounded-md shadow-lg">
              <span class="font-semibold">گردان :</span>
              <span class="text-lg">{{$employee->battalion}}</span>
            </div>

            <div class="flex flex-col items-center justify-center w-48 h-20 bg-gray-100 space-y-2 rounded-md shadow-lg">
              <span class="font-semibold">محاسبه بعد مسافت:</span>
              <span class="text-lg">{{$employee->distance}}</span>
            </div>

            <div class="flex flex-col items-center justify-center w-52 h-20 bg-gray-100 space-y-2 rounded-md shadow-lg">
              <span class="font-semibold">استفاده از بعد مسافت:</span>
              <span class="text-lg">{{$employee->useddistance}}</span>
            </div>

            <div class="flex flex-col items-center justify-center w-72 h-20 bg-gray-100 space-y-2 rounded-md shadow-lg">
              <span class="font-semibold">استان محل سکونت:</span>
              <span class="text-lg">{{$employee->address}}</span>
            </div>
          </div>
        </div>

        <div class="flex items-center justify-end">
          <div class="flex space-x-4 space-x-reverse">
            <a href="./" class="flex items-center justify-center 
              bg-gradient-to-r from-red-500 to-red-700 text-white w-28 h-10 rounded-md cursor-pointer">
              <span>بازگشت</span>
            </a>
          </div>
        </div>
      </div>
    </div>
</body>

</html>