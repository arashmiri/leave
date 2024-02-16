<!doctype html>
<html lang="en" dir="rtl">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>سامانه ثبت مرخصی پایوران</title>
  <!-- <link rel="stylesheet" href="{{ url('/css/output.css') }}" /> -->
  @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
  <div>
    <div class="flex items-center justify-between h-20 px-10 shadow-lg">
      <div class="flex items-center space-x-2 space-x-reverse">
        <p class="font-medium text-lg">سامانه ثبت مرخصی پایوران</p>

        <a href="http://leave.test/profile" class="flex items-center justify-center 
        bg-[conic-gradient(at_left,_var(--tw-gradient-stops))] from-indigo-500 to-indigo-800 
        w-20 h-8 text-white p-2 rounded-md cursor-pointer">
        <span>پروفایل</span>
      
      </a>
      </div>
      <a href="{{route('personnels.index')}}" class="bg-white rounded-full p-2 shadow-lg">
        <img src="{{ url('/images/logo.png') }}" alt="logo" class="w-12" />
      </a>
    </div>

    <div class="my-10 max-w-7xl m-auto">
      <div class="flex justify-between">
        <form class="w-80" action="{{route('personnels.index')}}" method="GET">
          <label for="default-search"
            class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
          <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center px-3 pointer-events-none">
              <svg class="w-4 h-4 text-gray-500 rotate-90" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
              </svg>
            </div>
            <input name="search" type="search" id="default-search" autocomplete="off"
              class="block w-full p-4 px-10 text-base text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none"
              placeholder="نام و نشان یا شماره پرسنلی..." required>
            <button type="submit"
              class="text-white absolute left-2.5 bottom-2.5 bg-gradient-to-r from-gray-800 via-gray-600 to-gray-800 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 ">جستجو</button>
          </div>
        </form>

      <div class="flex space-x-4 space-x-reverse">
        <div>
          <a href="{{ route('personnels.create') }}" class="flex items-center justify-center 
            bg-[conic-gradient(at_left,_var(--tw-gradient-stops))] from-lime-500 to-green-800 
            w-28 h-10 text-white p-2 rounded-md cursor-pointer">
            <span>ثبت پایور جدید</span>
          </a>
        </div>
        <div>
          <a href="{{ route('encouragement.create') }}" class="flex items-center justify-center 
            bg-[conic-gradient(at_left,_var(--tw-gradient-stops))] from-teal-500 to-teal-800 
            w-32 h-10 text-white p-2 rounded-md cursor-pointer">
            <span>مرخصی تشویقی</span>
          </a>
        </div>
      </div>

      </div>
      @foreach ($personnels as $personnel)
      <div class="my-6">
        <div class="flex items-center space-x-4 space-x-reverse">
          <div class="flex items-center space-x-6 space-x-reverse rounded-xl shadow-lg p-3 px-4 bg-white w-full">
            <div>
              <div class="flex items-center justify-center relative w-16 h-16 ">
                <img src="{{ asset("storage/$personnel->image"); }}" alt="" class="w-full h-full rounded-full p-1 bg-contain" />
                <span class="absolute top-0 border-[3px] border-green-600 w-16 h-16 rounded-full"></span>
              </div>
            </div>
                <div class="flex flex-wrap space-x-10 space-y-2 space-y-reverse">
                  <div class="w-72">
                    <span class="text-lg font-bold ml-10">نام و نشان: {{$personnel->name}}</span>
                  </div>
                  <span class="text-lg w-32">درجه: {{$personnel->rank}}</span>
                  <span class="text-lg w-56">شماره کارگزینی: {{$personnel->personnel_code}}</span>
                  <span class="text-lg">استحقاق باقی مانده: {{$personnel->entitlement}}</span>
                </div>
            </div><br/> 
          <div class="flex flex-col space-y-2">
            {{-- <form action="{{route('personnels.destroy' , $personnel->id)}}" method="post">
              @csrf
              @method('DELETE')
            <div
              class="flex items-center justify-center bg-gradient-to-r from-rose-500 via-red-400 to-red-500 text-white w-20 h-8 rounded-md cursor-pointer">
                  <input type="submit" value="حذف">
            </div>
            </form> --}}

            <div>
              <a href="{{ url("/vacation/$personnel->id") }}"
                class="flex items-center justify-center bg-[conic-gradient(at_left,_var(--tw-gradient-stops))] from-sky-400 to-blue-800 text-white w-24 h-8 rounded-md cursor-pointer">
                <span>ثبت مرخصی</span>
              </a>
            </div>

            <div>
              <a href="{{ url('personnels/' . $personnel->id ) }}"
                class="flex items-center justify-center bg-[conic-gradient(at_left,_var(--tw-gradient-stops))] from-orange-400 to-orange-700 text-white w-24 h-8 rounded-md cursor-pointer">
                <span>مشاهده</span>
              </a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
</body>

</html>