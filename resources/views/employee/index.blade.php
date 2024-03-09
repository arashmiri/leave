<!doctype html>
<html lang="en" dir="rtl">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>سامانه ثبت مرخصی پایوران</title>
  <script src="{{ url('/js/index.js') }}"></script>
  @vite('resources/css/app.css')

  <style>
    .lds-roller {
      display: inline-block;
      position: relative;
      width: 80px;
      height: 80px;
    }
    .lds-roller div {
      animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
      transform-origin: 40px 40px;
    }
    .lds-roller div:after {
      content: " ";
      display: block;
      position: absolute;
      width: 7px;
      height: 7px;
      border-radius: 50%;
      background: #1e40af;
      margin: -4px 0 0 -4px;
    }
    .lds-roller div:nth-child(1) {
      animation-delay: -0.036s;
    }
    .lds-roller div:nth-child(1):after {
      top: 63px;
      left: 63px;
    }
    .lds-roller div:nth-child(2) {
      animation-delay: -0.072s;
    }
    .lds-roller div:nth-child(2):after {
      top: 68px;
      left: 56px;
    }
    .lds-roller div:nth-child(3) {
      animation-delay: -0.108s;
    }
    .lds-roller div:nth-child(3):after {
      top: 71px;
      left: 48px;
    }
    .lds-roller div:nth-child(4) {
      animation-delay: -0.144s;
    }
    .lds-roller div:nth-child(4):after {
      top: 72px;
      left: 40px;
    }
    .lds-roller div:nth-child(5) {
      animation-delay: -0.18s;
    }
    .lds-roller div:nth-child(5):after {
      top: 71px;
      left: 32px;
    }
    .lds-roller div:nth-child(6) {
      animation-delay: -0.216s;
    }
    .lds-roller div:nth-child(6):after {
      top: 68px;
      left: 24px;
    }
    .lds-roller div:nth-child(7) {
      animation-delay: -0.252s;
    }
    .lds-roller div:nth-child(7):after {
      top: 63px;
      left: 17px;
    }
    .lds-roller div:nth-child(8) {
      animation-delay: -0.288s;
    }
    .lds-roller div:nth-child(8):after {
      top: 56px;
      left: 12px;
    }
    @keyframes lds-roller {
      0% {
        transform: rotate(0deg);
      }
      100% {
        transform: rotate(360deg);
      }
    }

    .loader {
      width: fit-content;
      font-weight: bold;
      font-family: Vazirmatn;
      font-size: 20px;
      clip-path: inset(0 0 0 100%);
      animation: l5 .8s steps(11) infinite;
      color: #1e40af
    }
    .loader:before {
      content:"درحال بارگذاری ....."
    }
    @keyframes l5 {to{clip-path: inset(0 -1ch 0 0)}}

  </style>
</head>

<body class="bg-gray-100 scrollbar-thumb-rounded-full scrollbar-thin scrollbar-thumb-blue-600 scrollbar-track-gray-100 h-32  overflow-y-scroll">
  <div id="loading" class="flex flex-col items-center space-y-6 justify-center text-2xl fixed z-20 h-screen w-full bg-gray-300/80">
    <!-- <span>درحال بارگذاری...</span> -->
    <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
    <div class="loader"></div> 

  </div>
  <div class="loader-body">
    <div class="flex items-center justify-between h-20 px-10 shadow-lg">
      <div class="flex items-center space-x-2 space-x-reverse">
      <span class="font-medium text-lg">سامانه جامع ثبت مرخصی پایوران</span>
    </div>
    <div class="flex items-center justify-center space-x-4 space-x-reverse">
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <input type="submit" class="flex items-center justify-center outline-none
            bg-[conic-gradient(at_left,_var(--tw-gradient-stops))] from-red-500 to-red-800 
            w-28 h-8 text-white rounded-md cursor-pointer" value="{{ __('خروج از سامانه') }}" />
      </form>
      <a href="{{route('employees.index')}}" class="bg-white rounded-full p-2 shadow-lg">
        <img src="{{ url('/images/logo.png') }}" alt="logo" class="w-12" />
      </a>
    </div>
  </div>

    <div class="my-10 max-w-7xl m-auto">
      <div class="flex justify-between">
        <form class="w-80" action="{{route('employees.index')}}" method="GET">
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
          <a href="{{ route('employees.create') }}" class="flex items-center justify-center 
            bg-[conic-gradient(at_left,_var(--tw-gradient-stops))] from-lime-500 to-green-800
            w-32 h-10 text-white p-2 rounded-md cursor-pointer">
            <span>ثبت پایور جدید</span>
          </a>
        </div>
        
        <div>
          <a href="{{ route('incentive.create') }}" class="flex items-center justify-center 
            bg-[conic-gradient(at_left,_var(--tw-gradient-stops))] from-teal-500 to-teal-800 
            w-32 h-10 text-white p-2 rounded-md cursor-pointer">
            <span>مرخصی های ویژه</span>
          </a>
        </div>
        
      </div>
    </div>
    @include('errors.message')
    @foreach ($employees as $employee)
      <div class="my-6">
        <div class="flex items-center space-x-4 space-x-reverse">
          <div class="flex items-center space-x-6 space-x-reverse rounded-xl shadow-lg p-3 px-4 bg-white w-full">
            <div>
              <div class="flex items-center justify-center relative w-16 h-16 ">
                <img src="{{ asset("storage/$employee->image"); }}" alt="" class="w-full h-full rounded-full p-1 bg-contain" />
                <span id="imageBorder" class="absolute top-0 border-[3px] border-green-600 w-16 h-16 rounded-full"></span>
              </div>
            </div>
                <div class="flex flex-wrap space-x-5 space-y-2 space-y-reverse">
                  <div class="w-72">
                    <span class="text-base font-bold ml-10">نام و نشان: {{$employee->name}}</span>
                  </div>
                  <span class="text-base w-36">درجه: {{$employee->rank}}</span>
                  <span class="text-base w-48">شماره کارگزینی: {{$employee->code}}</span>
                  <p class="text-base w-48">استحقاق باقی مانده: {{$employee->entitlement}}</p>
                  <span class="text-base">یگان: {{$employee->battalion}}</span>
                </div>
          </div>
          <div class="flex flex-col space-y-2">
            <div>
              <a href="{{ url("/vacation/$employee->id") }}"
                class="flex items-center justify-center bg-[conic-gradient(at_left,_var(--tw-gradient-stops))] from-sky-400 to-blue-800 text-white w-24 h-8 rounded-md cursor-pointer">
                <span>ثبت مرخصی</span>
              </a>
            </div>

            <div>
              <a href="{{ url('employees/' . $employee->id ) }}"
                class="flex disabled:bg-gray-500 items-center justify-center bg-[conic-gradient(at_left,_var(--tw-gradient-stops))] from-orange-400 to-orange-700 text-white w-24 h-8 rounded-md cursor-pointer">
                <span>مشاهده</span>
              </a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
      <div>
        {{ $employees->onEachSide(5)->links('vendor.pagination.tailwind') }}
      </div>
    </div>

    <script>
      setTimeout(() => {
        var loading = document.getElementById('loading')
        loading.classList.remove('flex')
        loading.classList.add('hidden')
      }, 1000);

      var entitlements = document.getElementsByTagName("p")
      var endEntitlements = []
      for(var i = 0; i < entitlements.length; i++){
        if(entitlements[i].nextElementSibling.innerHTML.includes("شیفت")){
          entitlements[i].innerHTML = "شیفت"
          entitlements[i].classList.add("text-orange-500","font-bold")
          entitlements[i].closest('div').parentNode.children[0].children[0].children[1].classList.remove("border-green-600")
          entitlements[i].closest('div').parentNode.children[0].children[0].children[1].classList.add("border-orange-500")
        } else if(entitlements[i].innerHTML.match(/(\d+)/)[1] == 0){
          entitlements[i].classList.add("text-red-500","font-bold")
          entitlements[i].innerHTML = "اتمام استحقاق پایور"
          entitlements[i].closest('div').parentNode.parentNode.children[1].children[0].classList.add("pointer-events-none")
          entitlements[i].closest('div').parentNode.children[0].children[0].children[1].classList.remove("border-green-600")
          entitlements[i].closest('div').parentNode.children[0].children[0].children[1].classList.add("border-red-500")
        }
      }
    </script>
</body>

</html>