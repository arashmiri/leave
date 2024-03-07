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

<body class="bg-gray-100">
    <div>
        <div class="flex items-center justify-between h-20 px-10 shadow-lg">
            <span class="font-medium text-lg">سامانه جامع ثبت مرخصی پایوران</span>
            <a href="{{route('employees.index')}}" class="bg-white rounded-full p-2 shadow-lg">
                <img src="{{ url('/images/logo.png') }}" alt="logo" class="w-12" />
            </a>
        </div>

        <div class="my-8 max-w-7xl m-auto">
            <div class="flex flex-col space-y-6">
                <div class="flex space-x-3 space-x-reverse justify-between">
                    <div class="flex space-x-3 space-x-reverse">
                        <a href="{{ route('employees.index') }}">
                            <span class="text-lg">صفحه اصلی</span>
                        </a>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                        </svg>
                        <a href="#">
                            <span class="font-semibold text-lg">مرخصی تشویقی</span>
                        </a>
                    </div>

                    <div>
                        <a href="{{ route('employees.index') }}"
                            class="flex items-center justify-center 
                    bg-[conic-gradient(at_left,_var(--tw-gradient-stops))] from-red-600 to-orange-600 text-white w-28 h-10 rounded-md cursor-pointer">
                            <span>بازگشت</span>
                        </a>
                    </div>
                </div>

                @include('errors.message')


                <form action="{{route('incentive.store')}}" method="POST">
                    @csrf
                    <div class="w-full rounded-lg shadow-lg p-10 py-8 bg-white space-y-8 my-6">
                        <div class="flex flex-col justify-center space-y-3">
                            <span class="font-bold text-2xl name-label">مرخصی ویژه:</span>
                            <span class="font-bold">این قسمت اختصاص داده شده برای ثبت مرخصی های تشویقی یگانی، استراحت شیفت
                                نگهبانی و تمدید مرخصی ها.</span>
                        </div>
                        <div class="grid grid-cols-3 gap-10">
                            <div
                                class="flex flex-col items-center justify-center w-80 h-28 bg-gray-100 space-y-2 rounded-md shadow-lg placeholder:text-sm">
                                <label class="font-semibold">شماره کارگزینی: </label>
                                <div class="flex space-x-2 space-x-reverse w-full items-center justify-center">
                                    <input autocomplete="off" type="text" id="" name="code" value=""
                                        class="p-2 w-[70%] outline-none border-[1px] rounded-lg border-1 shadow-lg border-gray-400 address-input placeholder:text-sm"
                                        placeholder="شماره کارگزینی را وارد نمایید:" />
                                </div>
                            </div>

                            <div
                                class="flex flex-col items-center justify-center w-80 h-28 bg-gray-100 space-y-2 rounded-md shadow-lg">
                                <label class="font-semibold">تعداد روز مرخصی: </label>
                                <div class="flex space-x-2 space-x-reverse w-full items-center justify-center">
                                    <input autocomplete="off" type="number" id="" name="days" value=""
                                        class="p-2 w-[70%] outline-none border-[1px] rounded-lg border-1 shadow-lg border-gray-400 address-input placeholder:text-sm"
                                        placeholder="تعداد روز مرخصی را وارد نمایید:" />
                                </div>
                            </div>

                            <div
                                class="flex flex-col items-center justify-center w-80 h-28 bg-gray-100 space-y-2 rounded-md shadow-lg placeholder:text-sm">
                                <label class="font-semibold">علت مرخصی: </label>
                                <div class="flex space-x-2 space-x-reverse w-full items-center justify-center">
                                    <input autocomplete="off" type="text" id="" name="title" value=""
                                        class="p-2 w-[70%] outline-none border-[1px] rounded-lg border-1 shadow-lg border-gray-400 address-input placeholder:text-sm"
                                        placeholder="علت مرخصی را وارد نمایید:" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-end space-x-4 space-x-reverse mt-6">
                        <input type="submit" value="ثبت مرخصی" class="flex items-center justify-center outline-none
                          bg-[conic-gradient(at_left,_var(--tw-gradient-stops))] from-lime-500 to-green-800 text-white w-28 h-10 rounded-md cursor-pointer" />
                    </div>
                </form>

                <hr class="border-gray-600 border-dashed" />

                <form action="{{route('incentiveMany.store')}}" method="POST">
                    @csrf
                    <div class="w-full rounded-lg shadow-lg p-10 py-8 bg-white space-y-8">
                        <div class="flex flex-col justify-center space-y-3">
                            <span class="font-bold text-2xl name-label">تشویقی تیپی:</span>
                            <span class="font-bold">این قسمت اختصاص داده شده برای ثبت مرخصی های تشویقی که <span
                                    class="text-red-500 underline">فقط توسط امیر فرماندهی محترم تیپ</span> به همه پایوران
                                    داده می شود.</span>
                        </div>
                        <div class="grid grid-cols-3 gap-10">
                            <div class="flex flex-col items-center justify-center w-80 h-28 bg-gray-100 space-y-2 rounded-md shadow-lg">
                                <label class="font-semibold">تعداد روز مرخصی: </label>
                                <div class="flex space-x-2 space-x-reverse w-full items-center justify-center">
                                    <input autocomplete="off" type="number" id="" name="days" value=""
                                        class="p-2 w-[70%] outline-none border-[1px] rounded-lg border-1 shadow-lg border-gray-400 address-input placeholder:text-sm"
                                        placeholder="تعداد روز مرخصی را وارد نمایید:" />
                                </div>
                            </div>

                            <div class="flex flex-col items-center justify-center w-80 h-28 bg-gray-100 space-y-2 rounded-md shadow-lg placeholder:text-sm">
                                <label class="font-semibold">علت مرخصی: </label>
                                <div class="flex space-x-2 space-x-reverse w-full items-center justify-center">
                                    <input autocomplete="off" type="text" id="" name="title" value=""
                                        class="p-2 w-[70%] outline-none border-[1px] rounded-lg border-1 shadow-lg border-gray-400 address-input placeholder:text-sm"
                                        placeholder="علت مرخصی را وارد نمایید:" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-end space-x-4 space-x-reverse mt-6">
                        <input type="submit" value="ثبت مرخصی"
                            class="flex items-center justify-center outline-none bg-[conic-gradient(at_left,_var(--tw-gradient-stops))] from-lime-500 to-green-800 text-white w-28 h-10 rounded-md cursor-pointer" />
                    </div>
                </form>
            </div>
        </div>

        <script src="{{ url('/js/index.js') }}"></script>
</body>

</html>