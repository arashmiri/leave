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
      <a href="" class="bg-white rounded-full p-2 shadow-lg">
        <img src="{{ url('/images/logo.png') }}" alt="logo" class="w-12" />
      </a>
    </div>

    <div class="my-8 max-w-7xl m-auto">
      <div class="flex flex-col space-y-6">
        <div class="flex space-x-3 space-x-reverse">
          <a href="">
            <span class="text-lg">صفحه اصلی</span>
          </a>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
          </svg>
          <a href="#">
            <span class="font-semibold text-lg">ویرایش اطلاعات پایور</span>
          </a>
        </div>

        @include('errors.message')

        <form action="{{route('employees.update' , $employee->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="w-full rounded-lg shadow-lg p-10 py-8 bg-white space-y-8">
          <div class="flex items-center space-x-6 space-x-reverse">

            {{-- <div class="flex flex-col items-center justify-center space-y-4">
              <div class="choose-img relative preview-img flex items-center justify-center cursor-pointer">
                <span
                  class="absolute top-0 w-44 h-44 bg-black opacity-50 rounded-full flex items-center justify-center"></span>
                <label class="flex flex-col items-center justify-center absolute font-bold text-white text-lg">اضافه
                  کردن تصویر
                  <div class="w-9 h-9 my-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                      stroke="currentColor" className="w-6 h-6">
                      <path strokeLinecap="round" strokeLinejoin="round"
                        d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                    </svg>
                  </div>
                </label>
                <img src="" alt="" class="rounded-full shadow-xl border-2 w-44 h-44" />
              </div>
              <input type="file" class="file-input" accept="image/*" hidden>
            </div> --}}

            <div class="flex flex-col items-start space-y-3">
              <div class="flex items-center justify-center space-x-4 space-x-reverse">
                <label class="font-bold text-2xl name-label">نام و نشان: </label>
                <input type="text" name="name" value="{{$employee->name}}" class="rounded-lg border-1 shadow-lg border-gray-400 name-input placeholder:text-sm"
                  placeholder="{{$employee->name}}">
              </div>
              <div class="flex items-center justify-center space-x-4 space-x-reverse">
                <label class="text-lg badage-label">درجه: </label>
                <select name="rank" value="{{$employee->rank}}"
                  class="w-44 bg-white border border-1 shadow-lg text-gray-600 text-sm rounded-lg border-gray-400 focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  <option selected>{{$employee->rank}}</option>
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

          <div class="grid grid-cols-3 gap-8">
            <div class="flex flex-col items-center justify-center w-64 h-28 bg-gray-100 space-y-2 rounded-md shadow-lg placeholder:text-sm">
              <label class="font-semibold">شماره پرسنلی:</label>
              <div class="flex space-x-2 space-x-reverse">
                <input type="text" name="code" value="{{$employee->code}}"
                  class="rounded-lg border-1 shadow-lg personnelId-input placeholder:text-sm border-gray-400"
                  placeholder="{{$employee->code}}">
              </div>
            </div>

            <div class="flex flex-col items-center justify-center w-72 h-28 bg-gray-100 space-y-2 rounded-md shadow-lg">
              <label class="font-semibold">'گردان' : </label>
              <div class="flex space-x-2 space-x-reverse">
                <input type="text" name="battalion" value="{{$employee->battalion}}" class="rounded-lg border-1 shadow-lg border-gray-400 address-input placeholder:text-sm"
                  placeholder="{{$employee->battalion}}">
              </div>
            </div>

            <div class="flex flex-col items-center justify-center w-72 h-28 bg-gray-100 space-y-2 rounded-md shadow-lg">
              <label class="font-semibold">استان محل سکونت : </label>
              <select name="address"
                class="w-44 bg-white border border-1 shadow-lg text-gray-600 text-sm rounded-lg border-gray-400 focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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

            <div class="flex flex-col items-center justify-center w-64 h-28 bg-gray-100 space-y-2 rounded-md shadow-lg">
              <label class="font-semibold">تعداد دفعات استفاده از بعد مسافت:</label>
              <div class="flex space-x-2 space-x-reverse">
                <select name="useddistance" value="{{$employee->useddistance}}"
                  class="w-44 bg-white border border-1 shadow-lg text-gray-600 text-sm rounded-lg border-gray-400 focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  <option value="{{$employee->useddistance}}" selected>{{$employee->useddistance}}</option>
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                </select>
              </div>
            </div>

            <div class="flex flex-col items-center justify-center w-64 h-28 bg-gray-100 space-y-2 rounded-md shadow-lg">
              <label class="font-semibold">استحقاق : </label>
              <div class="flex space-x-2 space-x-reverse">
                <input type="text" name="entitlement" value="{{$employee->entitlement}}" class="rounded-lg border-1 shadow-lg border-gray-400 address-input placeholder:text-sm"
                  placeholder="{{$employee->entitlement}}">
              </div>
            </div>
        <input type="submit" value="ویرایش اطلاعات">
      </form>
      </div>
    </div>

    <script src= "{{ url('/js/index.js') }}" ></script>
</body>

</html>