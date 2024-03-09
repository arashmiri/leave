<!doctype html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>.</title>
    <link rel="stylesheet" href="{{ url('/css/output.css') }}" />
    <script src="{{ url('/js/index.js') }}"></script>
  </head>

  <body class="scrollbar-thumb-rounded-full scrollbar-thin scrollbar-thumb-blue-600 scrollbar-track-gray-100 h-32  overflow-y-scroll">
    <div class="relative max-w-2xl m-auto my-2">
        <div style="opacity: 0.1; z-index: -10; position: absolute; top: 12rem">
        <img src="{{ url('/images/logo.png') }}" alt="logo" class=" grayscale" />
            <!-- <img src="{{ asset('storage/$vacation->employee->image'); }}" alt="logo" class=" grayscale" /> -->
        </div>
        <div class="flex items-end my-1">
            <div class="w-72">
                <p class="my-6 text-sm">* فرم درخواست مرخصی *</p>
            </div>
            <div>
            <a href="{{ route('employees.index') }}">
                <img src="{{ url('/images/logo.png') }}" alt="logo" class="w-20 grayscale" />
            </a>
            </div>
        </div>
        <div class="border-[1px] border-b-0 border-black">
            <table class="border-0">
                <thead class="my-2">
                    <tr>
                        <td class="text-xs w-72 px-2 py-[6px]">
                            <span>جمع مدت مرخصی درخواستی:</span>
                            <span>{{$vacation->entitlement + $vacation->Incentive + $vacation->distance + $vacation->holiday}}</span>
                            <span>روز</span>
                        </td>
                        <td class="text-xs w-44 border-r-[1px] border-black px-2">
                            <span>نوع مرخصی:</span>
                            <span>استحقاقی</span>
                        </td>
                        <td class="text-xs w-52 border-r-[1px] border-black px-2">
                            <span>علت مرخصی:</span>
                            <span>مشکل شخصی</span>
                        </td>
                        <td class="text-xs w-52 border-r-[1px] border-black px-2">
                            <span>تاریخ درخواست:</span>
                            <span dir="ltr">{{$vacation->start}}</span>
                        </td>
                    </tr>
                </thead>
            </table>
            <div class="flex items-center border-t-[1px] border-b-[1px] border-black">
                <span class="text-xs px-2">آدرس محل استفاده از مرخصی:</span>
                <div class="w-36">
                    <span class="text-xs">استان:</span>
                    <span class="text-xs">{{$vacation->employee->address}}</span>
                </div>
                <div class="w-20">
                    <span class="text-xs">خیابان:</span>
                    <span></span>
                </div>
                <div class="w-20">
                    <span class="text-xs">کوچه:</span>
                    <span></span>
                </div>
                <div class="w-20">
                    <span class="text-xs">پلاک:</span>
                    <span></span>
                </div>
                <div>
                    <span class="text-xs">تلفن:</span>
                    <span></span>
                </div>
            </div>
            <table>
                <thead class="my-2 border-b-[1px] border-black">
                    <tr class="flex space-x-10 space-x-reverse">
                        <td class="text-xs px-2">درجه/رتبه</td>
                        <td class="text-xs border-r-[1px] border-black px-4">رسته/تخصص</td>
                        <td class="text-xs border-r-[1px] border-black px-4">نام و نشان</td>
                        <td class="text-xs border-r-[1px] border-black px-4">شماره پرسنلی</td>
                        <td class="text-xs border-r-[1px] border-black px-4">قسمت</td>
                        <td class="text-xs border-r-[1px] border-black px-4">امضاء</td>
                    </tr>
                </thead>
                <tbody>
                    <tr class="flex space-x-10 space-x-reverse h-8 w-full">
                        <td class="text-xs w-[62px] py-3">{{$vacation->employee->rank}}</td>
                        <td class="text-xs w-[83px] border-r-[1px] border-black px-2 py-3"></td>
                        <td class="text-xs w-[140px] border-r-[1px] border-black px-1 py-3">{{$vacation->employee->name}}</td>
                        <td class="text-xs w-[82px] border-r-[1px] border-black px-2 py-3">{{$vacation->employee->code}}</td>
                        <td class="text-xs w-[50px] border-r-[1px] border-black px-2 py-3">{{$vacation->employee->battalion}}</td>
                        <td class="text-xs w-[60px] border-r-[1px] border-black px-2 py-3"></td>
                    </tr>
                </tbody>
            </table>
            <div class="flex items-center justify-center border-t-[1px] border-b-[1px] border-black text-xs py-1">
                <span>(مشخصات جانشین درخواست کننده)</span>
            </div>
            <table class="border-b-[1px] border-black">
                <thead class="my-2 border-b-[1px] border-black">
                    <tr class="flex space-x-10 space-x-reverse">
                        <td class="text-xs px-2">درجه/رتبه</td>
                        <td class="text-xs border-r-[1px] border-black px-2">رسته/تخصص</td>
                        <td class="text-xs border-r-[1px] border-black px-2">نام و نشان</td>
                        <td class="text-xs border-r-[1px] border-black px-2">شماره پرسنلی</td>
                        <td class="text-xs border-r-[1px] border-black px-2">قسمت</td>
                        <td class="text-xs border-r-[1px] border-black px-2">امضاء</td>
                    </tr>
                </thead>
                <tbody>
                    <tr class="flex space-x-10 space-x-reverse h-8 w-full">
                        <td class="text-xs w-[62px] py-3"></td>
                        <td class="text-xs w-[83px] border-r-[1px] border-black px-2 py-3"></td>
                        <td class="text-xs w-[67px] border-r-[1px] border-black px-2 py-3"></td>
                        <td class="text-xs w-[82px] border-r-[1px] border-black px-2 py-3"></td>
                        <td class="text-xs w-[50px] border-r-[1px] border-black px-2 py-3"></td>
                        <td class="text-xs w-[126px] border-r-[1px] border-black px-2 py-3"></td>
                    </tr>
                </tbody>
            </table>

            <div class="space-y-1 text-xs py-1 px-2">
                <pre class="font-bold">1) یاد شده در طول سال جاری ( {{$vacation->employee->entitlement + $vacation->entitlement }} ) روز مرخصی استحقاقی دارد.</pre>
                <pre>2) اکنون از تاریخ ( <span dir="ltr">{{$vacation->start}}</span> ) تقاضای {{$vacation->entitlement + $vacation->Incentive + $vacation->distance + $vacation->holiday}} روز مرخصی به شرح زیر را دارد:</pre>
                <div class="flex">
                    <span class="w-44">استحقاقی: {{$vacation->entitlement}} روز</span>
                    <span class="w-44">تشویقی: {{$vacation->Incentive}} روز</span>
                    <span class="w-44">بین راهی: {{$vacation->distance}} روز</span>
                    <span class="w-44">تعطیلات رسمی: {{$vacation->holiday}} روز</span>
                </div>
                <div class="flex">
                </div>
                <div class="flex">
                <pre class="w-[348px] font-bold">3) تاریخ آخرین حضور نامبرده :  <span dir="ltr">{{$lastAttendence[0]->attendance ?? '-'}}</span> </pre>
                </div>
                <div class="flex justify-end space-x-1 space-x-reverse text-[11px] px-4 py-3">
                    <span class="font-extrabold">رئیس شعبه عملیات نیروی انسانی تیپ:</span>
                    <span>سرهنگ دوم روح الله حسنی</span>
                </div>
            </div>

            <div class="space-y-1 text-xs py-1 px-2 border-b-[1px] border-black">
                <pre>اوامره صادره:     الف)  برابر نظریه شعبه عملیات نیروی انسانی اقدام گردد.
                          ب)  نیروی انسانی به شرح ذیل جهت نامبرده پروانه مرخصی صادر گردد:</pre>
                <pre>از تاریخ ( <span dir="ltr">{{$vacation->start}}</span> ) تا پایان مورخه: ( <span dir="ltr">{{$vacation->end}}</span> ) به مدت <span>{{$vacation->entitlement + $vacation->Incentive + $vacation->distance + $vacation->holiday}}</span> روز مرخصی اعطاء میگردد.</pre>
                <div class="flex">
                <span class="w-44">استحقاقی: {{$vacation->entitlement}} روز</span>
                    <span class="w-44">تشویقی: {{$vacation->Incentive}} روز</span>
                    <span class="w-44">بین راهی: {{$vacation->distance}} روز</span>
                    <span class="w-44">تعطیلات رسمی: {{$vacation->holiday}} روز</span>
                </div>
                <div class="flex">
                </div>
                <div>
                    <pre> تاریخ حضور در یگان <span dir="ltr">{{$vacation->attendance}}</span></pre>
                </div>
                <div class="w-full flex justify-end">
                    <div class="flex flex-col items-center space-y-1 text-sm py-3 font-extrabold w-[330px]">
                        <span>فرمانده تیپ 388 مکا هجومی شهید حیدر شهرکی ایرانشهر</span>
                        <span>سرتیپ دوم ستاد محمدرضانژادسروری</span>
                    </div>
                </div>
            </div>

            <div class="space-y-1 text-xs pt-1 px-2 border-b-[1px] border-black">
                <span class="font-bold text-sm">نسخه بایگانی یگان خدمتی</span>
                <div class="flex">
                    <div class="w-52">
                        <span>بدینوسیله به درجه:</span>
                        <span>{{$vacation->employee->rank}}</span>
                    </div>
                    <div class="w-56">
                        <span>نام و نام خانوادگی:</span>
                        <span>{{$vacation->employee->name}}</span>
                    </div>
                    <div class="w-40">
                        <span>ش ک:</span>
                        <span>{{$vacation->employee->code}}</span>
                    </div>
                    <div class="w-44">
                        <span>جمعی:</span>
                        <span>{{$vacation->employee->battalion}}</span>
                    </div>
                </div>
                <div>
                    <pre>از تاریخ: ( <span dir="ltr">{{$vacation->start}}</span> ) تا پایان مورخه: ( <span dir="ltr">{{$vacation->end}}</span> ) به مدت {{$vacation->entitlement + $vacation->Incentive + $vacation->distance + $vacation->holiday}}  روز مرخصی شهرستان  {{$vacation->employee->address}} اعطاء میگردد.</pre>
                </div>
                <div>
                    <span>شرح مرخصی استفاده شده:</span>
                </div>
                <div class="flex">
                    <span class="w-44">استحقاقی: {{$vacation->entitlement}} روز</span>
                    <span class="w-44">تشویقی: {{$vacation->Incentive}} روز</span>
                    <span class="w-44">بین راهی: {{$vacation->distance}} روز</span>
                    <span class="w-44">تعطیلات رسمی: {{$vacation->holiday}} روز</span>
                </div>
                <div class="flex">
                </div>
                <div>
                    <pre> تاریخ حضور در یگان <span dir="ltr">{{$vacation->attendance}}</span></pre>
                </div>
                <div class="w-full flex justify-end">
                    <div class="flex flex-col items-center space-y-1 text-sm py-3 font-extrabold w-[330px]">
                        <span>فرمانده تیپ 388 مکا هجومی شهید حیدر شهرکی ایرانشهر</span>
                        <span>سرتیپ دوم ستاد محمدرضانژادسروری</span>
                    </div>
                </div>
            </div>

            <div class="space-y-1 text-xs pt-1 px-2 border-b-[1px] border-black">
                <span class="font-bold text-sm">نسخه تحویلی به استفاده کننده</span>
                <div class="flex">
                    <div class="w-52">
                        <span>بدینوسیله به درجه:</span>
                        <span>{{$vacation->employee->rank}}</span>
                    </div>
                    <div class="w-56">
                        <span>نام و نام خانوادگی:</span>
                        <span>{{$vacation->employee->name}}</span>
                    </div>
                    <div class="w-40">
                        <span>ش ک:</span>
                        <span>{{$vacation->employee->code}}</span>
                    </div>
                    <div class="w-44">
                        <span>جمعی:</span>
                        <span>{{$vacation->employee->battalion}}</span>
                    </div>
                </div>
                <div>
                    <pre>از تاریخ: ( <span dir="ltr">{{$vacation->start}}</span> ) تا پایان مورخه: ( <span dir="ltr">{{$vacation->end}}</span> ) به مدت {{$vacation->entitlement + $vacation->Incentive + $vacation->distance + $vacation->holiday}}  روز مرخصی شهرستان  {{$vacation->employee->address}} اعطاء میگردد.</pre>
                </div>
                <div>
                    <span>شرح مرخصی استفاده شده:</span>
                </div>
                <div class="flex">
                    <span class="w-44">استحقاقی: {{$vacation->entitlement}} روز</span>
                    <span class="w-44">تشویقی: {{$vacation->Incentive}} روز</span>
                    <span class="w-44">بین راهی: {{$vacation->distance}} روز</span>
                    <span class="w-44">تعطیلات رسمی: {{$vacation->holiday}} روز</span>
                </div>
                <div class="flex">
                </div>
                <div>
                    <pre> تاریخ حضور در یگان <span dir="ltr">{{$vacation->attendance}}</span></pre>
                </div>
                <div class="w-full flex justify-end">
                    <div class="flex flex-col items-center space-y-1 text-sm py-3 font-extrabold w-[330px]">
                        <span>فرمانده تیپ 388 مکا هجومی شهید حیدر شهرکی ایرانشهر</span>
                        <span>سرتیپ دوم ستاد محمدرضانژادسروری</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    </script>
</body>

</html>