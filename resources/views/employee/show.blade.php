<!doctype html>
<html lang="en" dir="rtl">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>سامانه ثبت مرخصی پایوران</title>
  <link rel="stylesheet" href="{{ url('/css/flowbite.min.css') }}" />
  <script src="{{ url('/js/index.js') }}"></script>
  <script src="{{ url('/js/datepicker.min.js') }}"></script>
  @vite('resources/css/app.css')
  <script src="{{ url('/js/flowbite.min.js') }}"></script>
</head>

<body class="bg-gray-100">
  <div>
    <div class="flex items-center justify-between h-20 px-10 shadow-lg">
      <span class="font-medium text-lg">سامانه جامع ثبت مرخصی پایوران</span>
      <a href="{{ route('employees.index') }}" class="bg-white rounded-full p-2 shadow-lg">
        <img src="{{ url('/images/logo.png') }}" alt="" class="w-12" />
      </a>
    </div>

    <div class="my-8 max-w-7xl m-auto">
      <div class="flex flex-col space-y-6">
        <div class="flex items-center justify-between space-x-3 space-x-reverse">
          <div class="flex items-center space-x-3 space-x-reverse">
            <a href="{{ route('employees.index') }}">
              <span class="text-lg">صفحه اصلی</span>
            </a>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>
            <a href="">
              <span class="font-semibold text-lg">مشاهده اطلاعات پایور</span>
            </a>
          </div>

          <div class="flex items-center space-x-3 space-x-reverse">


            <a href="{{route('employees.edit' , $employee->id)}}"
              class="flex items-center justify-center
              bg-[conic-gradient(at_left,_var(--tw-gradient-stops))] from-orange-400 to-orange-700 text-white w-24 h-10 rounded-md text-md cursor-pointer">
                ویرایش
            </a>

            <form action="{{route('employees.destroy' , $employee->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="button" data-modal-target="popup-modal" data-modal-toggle="popup-modal" 
                    class="flex items-center justify-center text-md outline-none
                    bg-[conic-gradient(at_left,_var(--tw-gradient-stops))] from-red-500 to-red-800 text-white w-24 h-10 rounded-md cursor-pointer">
                  حذف کاربر
                </button>

                <div id="popup-modal" tabindex="-1" style="background-color: rgb(0 0 0 / 0.4);" class="hidden h-full overflow-y-auto overflow-x-hidden fixed top-0 left-0 z-50 justify-center items-center w-full md:inset-0 max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <div class="p-4 relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">بستن</span>
                            </button>
                            <div class="p-4 md:p-5 text-center">
                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                </svg>
                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">این کاربر بصورت کامل از سامانه حذف شود؟</h3>
                                <button type="submit" data-modal-hide="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                     حذف
                                </button>
                                <button data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">انصراف</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
          </div>
        </div>

        <div class="container w-full rounded-lg shadow-lg p-10 py-8 bg-white space-y-8">
          <div class="container-header flex items-center space-x-6 space-x-reverse">
            <div>
              <img src="{{ asset("storage/$employee->image"); }}" alt="" class="rounded-full shadow-xl border-2 w-44 h-44 bg-contain" />
            </div>

            <div class="flex flex-col space-y-3">
              <span class="font-bold text-2xl">{{$employee->name}}</span>
              <span class="text-lg">درجه: {{$employee->rank}}</span>
            </div>
          </div>

          <div class="container-body grid grid-cols-4 gap-12">
            <div class="flex flex-col items-center justify-center w-60 h-24 bg-gray-100 space-y-2 rounded-md shadow-lg">
              <span class="text-lg font-semibold">شماره کارگزینی:</span>
              <span class="text-lg">{{$employee->code}}</span>
            </div>

            <div class="flex flex-col items-center justify-center w-60 h-24 bg-gray-100 space-y-2 rounded-md shadow-lg">
              <span class="text-lg font-semibold">استحقاق باقی مانده:</span>
              <span class="text-lg">{{$employee->entitlement}} روز</span>
            </div>

            <div class="flex flex-col items-center justify-center w-60 h-24 bg-gray-100 space-y-2 rounded-md shadow-lg">
              <span class="text-lg font-semibold">یگان مربوطه:</span>
              <span class="text-lg">{{$employee->battalion}}</span>
            </div>

            <div class="flex flex-col items-center justify-center w-60 h-24 bg-gray-100 space-y-2 rounded-md shadow-lg">
              <span class="text-lg font-semibold">محاسبه بعد مسافت:</span>
              <span class="text-lg">{{$employee->distance}} روز</span>
            </div>

            <div class="flex flex-col items-center justify-center w-60 h-24 bg-gray-100 space-y-2 rounded-md shadow-lg">
              <span class="text-lg font-semibold">استفاده از بعد مسافت:</span>
              <span class="text-lg">{{$employee->useddistance}} مرتبه</span>
            </div>

            <div class="flex flex-col items-center justify-center w-60 h-24 bg-gray-100 space-y-2 rounded-md shadow-lg">
              <span class="text-lg font-semibold">استان محل سکونت:</span>
              <span class="text-lg">{{$employee->address}}</span>
            </div>
          </div>
        </div>

        <div class="flex items-center justify-between">
          <div class="flex items-center justify-center space-x-4 space-x-reverse">
          <a href="{{url("/employees/$employee->id/vacation")}} "  
              class="flex items-center justify-center text-md bg-[conic-gradient(at_left,_var(--tw-gradient-stops))] from-green-500 to-green-600 text-white w-36 h-10 rounded-md cursor-pointer">
                تاریخچه مرخصی ها
            </a>


            <a href="{{route('employee.insentive' , $employee->id)}}"
              class="flex items-center justify-center 
              bg-[conic-gradient(at_left,_var(--tw-gradient-stops))] from-amber-500 to-amber-600 text-white w-36 h-10 rounded-md text-md cursor-pointer">
              <span>مرخصی های ویژه</span>
            </a>
          </div>
          <div class="flex space-x-4 space-x-reverse">
            <a href="{{ route('employees.index') }}" class="flex items-center justify-center 
            bg-[conic-gradient(at_left,_var(--tw-gradient-stops))] from-red-600 to-orange-600 text-white w-28 h-10 rounded-md cursor-pointer">
              <span>بازگشت</span>
            </a>
          </div>
        </div>
      </div>
    </div>
</body>

</html>