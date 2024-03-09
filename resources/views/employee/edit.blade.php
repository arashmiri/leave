<!doctype html>
<html lang="en" dir="rtl">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>سامانه ثبت مرخصی پایوران</title>
  <script src="{{ url('/js/index.js') }}"></script>
  @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 scrollbar-thumb-rounded-full scrollbar-thin scrollbar-thumb-blue-600 scrollbar-track-gray-100 h-32  overflow-y-scroll">
  <div>
    <div class="flex items-center justify-between h-20 px-10 shadow-lg">
      <span class="font-medium text-lg">سامانه جامع ثبت مرخصی پایوران</span>
      <a href="{{ route('employees.index') }}" class="bg-white rounded-full p-2 shadow-lg">
        <img src="{{ url('/images/logo.png') }}" alt="logo" class="w-12" />
      </a>
    </div>

    <div class="my-8 max-w-7xl m-auto">
      <div class="flex flex-col space-y-6">
        <div class="flex space-x-3 space-x-reverse">
          <a href="{{ route('employees.index') }}">
            <span class="text-lg">صفحه اصلی</span>
          </a>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
          </svg>
          <a href="{{ url('employees/' . $employee->id ) }}">
              <span class="text-lg">مشاهده اطلاعات پایور</span>
            </a>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
          </svg>
          <a href="">
            <span class="font-semibold text-lg">ویرایش اطلاعات پایور</span>
          </a>
        </div>

        @include('errors.message')

        <form action="{{route('employees.update' , $employee->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="w-full rounded-lg shadow-lg p-10 py-8 bg-white space-y-8">
          <div class="flex items-center space-x-6 space-x-reverse">
            <div class="flex items-start justify-center space-x-6 space-x-reverse my-6">
              <div class="flex items-center justify-center space-x-4 space-x-reverse">
                <label class="font-bold text-xl name-label">نام و نشان: </label>
                <input autocomplete="off" type="text" name="name" value="{{$employee->name}}" 
                class="h-12 w-60 p-2 outline-none border rounded-lg shadow-lg border-gray-400 address-input placeholder:text-gray-400 placeholder:text-sm focus:ring-1 focus:ring-blue-500 focus:border-blue-500"
                  placeholder="{{$employee->name}}" />
              </div>
              <div class="flex items-center justify-center space-x-4 space-x-reverse">
                <label class="font-bold text-xl badage-label">درجه: </label>
                <select name="rank" value="{{$employee->rank}}"
                class="h-12 w-60 form-select appearance-none outline-none bg-white border shadow-lg text-black rounded-lg border-gray-400 focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  <option selected>{{$employee->rank}}</option>
                  <option value="کارمند">کارمند</option>
                  <option value="گروهبانیکم">گروهبان یکم</option>
                  <option value="استواردوم">استوار دوم</option>
                  <option value="استواریکم">استوار یکم</option>
                  <option value="ستوانسوم">ستوانسوم</option>
                  <option value="ستواندوم">ستواندوم</option>
                  <option value="ستوانیکم">ستوانیکم</option>
                  <option value="سروان">سروان</option>
                  <option value="سرگرد">سرگرد</option>
                  <option value="سرهنگ دوم">سرهنگ دوم</option>
                  <option value="سرهنگ">سرهنگ</option>
                </select>
              </div>
            </div>
          </div>

          <div class="grid grid-cols-3 gap-8 space-y-4 space-y-reverse">
            <div class="flex flex-col items-center justify-center w-80 h-32 bg-gray-100 space-y-4 rounded-md shadow-lg placeholder:text-sm">
              <label class="font-semibold">شماره پرسنلی: </label>
              <div class="flex space-x-2 space-x-reverse">
                <input type="text" name="code" value="{{$employee->code}}" autocomplete="off"
                class="p-2 h-12 text-center w-60 outline-none border-[1px] rounded-lg border-1 shadow-lg border-gray-400 address-input placeholder:text-sm"
                  placeholder="{{$employee->code}}">
              </div>
            </div>

            <div class="flex flex-col items-center justify-center w-80 h-32 bg-gray-100 space-y-4 rounded-md shadow-lg">
              <label class="font-semibold">یگان مربوطه: </label>
              <div class="flex space-x-2 space-x-reverse">
                <input autocomplete="off" type="text" name="battalion" value="{{$employee->battalion}}" 
                  class="p-2 h-12 text-center w-60 outline-none border-[1px] rounded-lg border-1 shadow-lg border-gray-400 address-input placeholder:text-sm"
                  placeholder="{{$employee->battalion}}">
              </div>
            </div>

            <div class="flex flex-col items-center justify-center w-80 h-32 bg-gray-100 space-y-4 rounded-md shadow-lg">
              <label class="font-semibold">استحقاق: </label>
              <div class="flex space-x-2 space-x-reverse">
                <input autocomplete="off" type="text" name="entitlement" value="{{$employee->entitlement}}" 
                  class="p-2 h-12 text-center w-60 outline-none border-[1px] rounded-lg border-1 shadow-lg border-gray-400 address-input placeholder:text-sm"
                  placeholder="{{$employee->entitlement}}" />
              </div>
            </div>

            <div class="flex flex-col items-center justify-center w-80 h-32 bg-gray-100 space-y-4 rounded-md shadow-lg">
                <label class="font-semibold">استان محل سکونت: </label>
                <div class="flex space-x-2 space-x-reverse">
                <select name="address" autocomplete="off"
                class="h-12 w-60 bg-white outline-none border border-1 shadow-lg text-black text-md rounded-lg border-gray-400 focus:ring-blue-500 focus:border-blue-500 block form-select appearance-none">
                <option selected>{{$employee->address}}</option> 
                <option value="آذربایجان شرقی">آذربایجان شرقی</option> 
                <option value="آذربایجان غربی">آذربایجان غربی</option> 
                <option value="اردبیل">اردبیل</option> 
                <option value="اصفهان">اصفهان</option> 
                <option value="البرز">البرز</option> 
                <option value="ایلام">ایلام</option> 
                <option value="بوشهر">بوشهر</option> 
                <option value="تهران">تهران</option> 
                <option value="چهارمحال بختیاری">چهارمحال بختیاری</option> 
                <option value="خراسان جنوبی">خراسان جنوبی</option> 
                <option value="خراسان رضوی">خراسان رضوی</option> 
                <option value="خراسان شمالی">خراسان شمالی</option> 
                <option value="خوزستان">خوزستان</option> 
                <option value="زنجان">زنجان</option> 
                <option value="سمنان">سمنان</option> 
                <option value="سیستان و بلوچستان">سیستان و بلوچستان</option> 
                <option value="فارس">فارس</option> 
                <option value="قزوین">قزوین</option> 
                <option value="قم">قم</option> 
                <option value="کردستان">کردستان</option> 
                <option value="کرمان">کرمان</option> 
                <option value="کرمانشاه">کرمانشاه</option> 
                <option value="کهکیلویه و بویراحمد">کهکیلویه و بویراحمد</option> 
                <option value="گلستان">گلستان</option> 
                <option value="گیلان">گیلان</option> 
                <option value="لرستان">لرستان</option> 
                <option value="مازندران">مازندران</option> 
                <option value="مرکزی">مرکزی</option> 
                <option value="هرمزگان">هرمزگان</option> 
                <option value="همدان">همدان</option> 
                <option value="یزد">یزد</option>
              </select>
                </div>
              </div>
            
            <div class="flex flex-col items-center justify-center w-80 h-32 bg-gray-100 space-y-4 rounded-md shadow-lg">
              <label class="font-semibold">تعداد استفاده از بعد مسافت:</label>
              <div class="flex space-x-2 space-x-reverse">
                <select name="useddistance" value="{{$employee->useddistance}}"
                class="h-12 w-60 form-select appearance-none bg-white outline-none border border-1 shadow-lg text-black text-md rounded-lg border-gray-400 focus:ring-blue-500 focus:border-blue-500 block">
                  <option value="{{$employee->useddistance}}" selected>{{$employee->useddistance}} مرتبه</option>
                  <option value="0">0 مرتبه</option>
                  <option value="1">1 مرتبه</option>
                  <option value="2">2 مرتبه</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="flex items-center justify-end space-x-4 space-x-reverse" style="margin-top:30px">
              <input type="submit" value="ویرایش اطلاعات" class="flex items-center justify-center outline-none
                    bg-[conic-gradient(at_left,_var(--tw-gradient-stops))] from-lime-500 to-green-800 text-white w-32 h-10 rounded-md cursor-pointer" />


              <a href="{{ route('employees.index') }}" class="flex items-center justify-center 
                bg-[conic-gradient(at_left,_var(--tw-gradient-stops))] from-red-600 to-orange-600 text-white w-28 h-10 rounded-md cursor-pointer">
              <span>بازگشت</span>
            </a>
        </div>
      </form>

    <!-- <script src= "{{ url('/js/index.js') }}" ></script> -->
</body>

</html>