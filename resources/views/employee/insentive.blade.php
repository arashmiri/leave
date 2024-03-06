<!doctype html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>سامانه ثبت مرخصی پایوران</title>
    <link rel="stylesheet" href="{{ url('/css/flowbite.min.css') }}" />
    <script src="{{ url('/js/index.js') }}"></script>
    @vite('resources/css/app.css')
    <script src="{{ url('/js/flowbite.min.js') }}"></script>
</head>

<body class="bg-gray-100">
    <div>
        <div class="flex items-center justify-between h-20 px-10 shadow-lg">
            <span class="font-medium text-lg">سامانه جامع ثبت مرخصی پایوران</span>
            <a href="{{ route('employees.index') }}" class="bg-white rounded-full p-2 shadow-lg">
                <img src="{{ url('/images/logo.png') }}" alt="logo" class="w-12" />
            </a>
        </div>

        <div class="my-10 max-w-7xl m-auto space-y-6">
            <div class="flex flex-col space-y-6">
                <div class="flex justify-between items-center space-x-3 space-x-reverse">
                    <div class="flex items-center space-x-3 space-x-reverse">
                        <a href="{{ route('employees.index') }}">
                            <span class="text-lg">صفحه اصلی</span>
                        </a>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                        </svg>
                        <a href="">
                            <span class="font-semibold text-lg">مرخصی های ویژه پایور</span>
                        </a>
                    </div>
                    <div class="flex items-center justify-end space-x-4 space-x-reverse">
                        <a href="{{ route('employees.index') }}"
                            class="flex items-center justify-center bg-[conic-gradient(at_left,_var(--tw-gradient-stops))] from-red-500 to-orange-700 text-white w-28 h-10 rounded-md cursor-pointer">
                            <span>بازگشت</span>
                        </a>
                    </div>
                </div>

            <div class="grid grid-cols-2 gap-14">
                @foreach ($incentives as $incentive)
                <div class="flex items-center justify-center">
                        <div class="flex flex-wrap items-center">
                            <div class="w-[500px] mx-2 bg-white p-4 rounded-t-lg">عنوان تشویقی: {{ $incentive->title }}</div>
                            <div class="w-[500px] mx-2 bg-white p-4 rounded-b-lg">تعداد روز تشویقی: {{ $incentive->days}} روز</div>
                        </div>

                            <button type="button" data-modal-target="popup-modal" data-modal-toggle="popup-modal" type="submit" class="outline-none bg-red-500 w-full text-white rounded-lg h-10">
                                <span class="text-sm font-bold">حذف مرخصی </span>
                            </button>


                            <form action="{{route('incentive.destroy' , $incentive->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <div id="popup-modal" tabindex="-1" style="background-color: rgb(0 0 0 / 0.4); height:100%" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
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
                                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">این مرخصی بصورت کامل از سامانه حذف شود؟</h3>
                                                <button type="submit" data-modal-hide="popup-modal" type="button" style="background-color: rgb(220 38 38);" class="text-white focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                                   حذف
                                                </button>
                                            <button data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">انصراف</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</body>
</html>