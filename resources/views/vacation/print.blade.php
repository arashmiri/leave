<!doctype html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>چاپ برگه مرخصی {{$vacation->employee->name}}</title>
    <link rel="stylesheet" href="{{url('/css/output.css')}}" />
</head>

<body>

    <div class="flex items-center justify-center relative w-16 h-16 ">
        <img src="{{ asset("storage/"  .   $vacation->employee->image); }}" alt="logo" class="w-full h-full rounded-full p-1" />
        <span class="absolute top-0 border-[3px] border-green-600 w-16 h-16 rounded-full"></span>
      </div>
    <div class="relative max-w-2xl m-auto my-2">
        <!-- <div class="absolute top-48 left-10 flex items-center justify-center bg-backgroundLogo bg-no-repeat bg-cover object-cover grayscale  w-[600px] h-[600px]"> -->
        <div class="absolute top-48 -z-10 opacity-10">
            {{-- <img src="" alt="logo" class=" grayscale" /> --}}
        </div>
        <div class="flex items-end my-1">
            <div class="w-72">
                <p class="my-6 text-sm">* فرم درخواست مرخصی *</p>
            </div>
            <div>
                {{-- <img src="" alt="logo" class="w-20 grayscale" /> --}}
            </div>
        </div>
        <div class="border-[1px] border-b-0 border-black">
            <table class="border-0">
                <thead class="my-2">
                    <tr>
                        <td class="text-xs w-72 px-2 py-[6px]">
                            <span>جمع مدت مرخصی درخواستی (روز):</span>
                            <span>{{$vacation->entitlement + $vacation->Incentive + $vacation->distance + $vacation->holiday}}</span>
                            <span>روز</span>
                        </td>
                        <td class="text-xs w-44 border-r-[1px] border-black px-2">
                            <span>نوع مرخصی:</span>
                            <span>بلند مدت</span>
                        </td>
                        <td class="text-xs w-44 border-r-[1px] border-black px-2">
                            <span>علت مرخصی:</span>
                            <span></span>
                        </td>
                        <td class="text-xs w-52 border-r-[1px] border-black px-2">
                            <span>تاریخ درخواست:</span>
                            <span>{{$vacation->start}}</span>
                        </td>
                    </tr>
                </thead>
            </table>
            <div class="flex items-center border-t-[1px] border-b-[1px] border-black">
                <span class="text-xs px-2">آدرس محل استفاده از مرخصی:</span>
                <div class="w-16">
                    <span class="text-xs">استان:</span>
                    <span>{{$vacation->employee->address}}</span>
                </div>
                <div class="w-24">
                    <span class="text-xs">خیابان:</span>
                    <span></span>
                </div>
                <div class="w-24">
                    <span class="text-xs">کوچه:</span>
                    <span></span>
                </div>
                <div class="w-24">
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
                        <td class="text-xs border-r-[1px] border-black px-2">رسته/تخصص</td>
                        <td class="text-xs border-r-[1px] border-black px-2">نام و نشان</td>
                        <td class="text-xs border-r-[1px] border-black px-2">شماره پرسنلی</td>
                        <td class="text-xs border-r-[1px] border-black px-2">قسمت</td>
                        <td class="text-xs border-r-[1px] border-black px-2">امضاء</td>
                    </tr>
                </thead>
                <tbody>
                    <tr class="flex space-x-10 space-x-reverse h-8 w-full">
                        <td class="text-xs w-[62px] py-3">{{$vacation->employee->rank}}</td>
                        <td class="text-xs w-[83px] border-r-[1px] border-black px-2 py-3"></td>
                        <td class="text-xs w-[67px] border-r-[1px] border-black px-2 py-3">{{$vacation->employee->name}}</td>
                        <td class="text-xs w-[82px] border-r-[1px] border-black px-2 py-3">{{$vacation->employee->code}}</td>
                        <td class="text-xs w-[50px] border-r-[1px] border-black px-2 py-3">{{$vacation->employee->battalion}}</td>
                        <td class="text-xs w-[126px] border-r-[1px] border-black px-2 py-3"></td>
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


            <!-- <div class="border-b-[1px] border-black">
                <div class="flex items-center px-2">
                    <div class="space-x-2 space-x-reverse">
                        <span class="text-xs">نظریه فرمانده یگان:</span>
                        <span class="text-xs px-2">تاریخ شروع مرخصی:</span>
                    </div>
                    <div class="text-xs">
                        <span class="px-2">/</span>
                        <span class="px-2">/</span>
                        <span>1402</span>
                    </div>
                    <div class="flex space-x-2 space-x-reverse">
                        <span class="text-xs px-2">تاریخ حضور در یگان:</span>
                        <div class="text-xs">
                            <span class="px-2">/</span>
                            <span class="px-2">/</span>
                            <span>1402</span>
                        </div>
                    </div>
                    <div class="px-2">
                        <span class="text-xs">مدت مرخصی:</span>
                        <span class="text-xs">..........روز</span>
                    </div>
                </div>

                <div class="flex items-center justify-center space-x-16 space-x-reverse py-1">
                    <span class="text-xs">نام و نام خانوادگی:</span>
                    <span class="text-xs">سمت:</span>
                    <span class="text-xs font-bold">امضا و مهر یگان:</span>
                </div>
                <div class="flex flex-col px-2 text-[9px] font-semibold space-y-1">
                    <span>*تاریخ شروع مرخصی تاریخی می باشد که شخص به مرخصی اعزام و در یگان حضور ندارد.</span>
                    <span>*تاریخ حضور در یگان تاریخی می باشد که شخص در یگان حضور داشته و خدمت نماید. روز پنجشنبه و جمعه
                        و ایام تعطیل غیرقابل قبول می باشد. مگر در مواردی که فرد نگهبان باشد.</span>
                    <span class="leading-[2]">*فرمانده یگان و مسئول اداری موظف می باشند. پیگیری لازم را در خصوص امضاء و
                        تایید برگ مرخصی توسط هیئت رییسه محترم تیپ را بعمل آورند. و از اعزام کارکنان بدون برگه مرخصی یا
                        قبل از امضاء آن خودداری نمایند. ضمنا بایستی پیگیری لازم در خصوص نسخه یگان خدمتی صورت گرفته و
                        حتما در سوابق کارکنان بایگانی گردد.</span>
                </div>
            </div> -->

            <div class="space-y-1 text-xs py-1 px-2">
                <pre>1) یاد شده در طول سال جاری (  {{$vacation->employee->entitlement}}  ) مرخصی استحقاقی دارد و از (  {{$vacation->employee->useddistance * $vacation->employee->distance}}  ) روز مرخصی بین راهی استفاده نموده است.</pre>
                <pre>2) اکنون از تاریخ ({{$vacation->start}}) تقاضای    {{$vacation->entitlement + $vacation->Incentive + $vacation->distance + $vacation->holiday}}    روز مرخصی به شرح زیر را دارد:</pre>
                <div class="flex">
                    <span class="w-44">استحقاقی: {{$vacation->entitlement}} روز</span>
                    <span class="w-44">تشویقی: {{$vacation->Incentive}} روز</span>
                    <span>بین راهی: {{$vacation->distance}} روز</span>
                </div>
                <div class="flex">
                    <span class="w-44">تعطیلات رسمی: {{$vacation->holiday}} روز</span>
                    <!-- <span class="w-44">انتقالی: ........... روز</span>
                    <span>سایر: ........... روز</span> -->
                </div>
                <div class="flex">
                    <pre class="w-[348px]">3) تاریخ آخرین حضور نامبرده  : {{$lastAttendence[0]->attendance ?? '-'}} </pre>
                    <!-- <pre> تاریخ حضور در یگان     /    / 1402</pre> -->
                </div>
                <div class="flex justify-end space-x-1 space-x-reverse text-[11px] px-4 py-3">
                    <span class="font-extrabold">رئیس شعبه عملیات نیروی انسانی تیپ:</span>
                    <span>سرگرد روح الله حسنی</span>
                </div>
            </div>

            <div class="space-y-1 text-xs py-1 px-2 border-b-[1px] border-black">
                <pre>اوامره صادره:     الف)  برابر نظریه شعبه عملیات نیروی انسانی اقدام گردد.
                          ب)  نیروی انسانی به شرح ذیل جهت نامبرده پروانه مرخصی صادر گردد:</pre>
                <pre>از تاریخ     /   / 1402 تا پایان مورخه:     /   / 1402 به مدت......روز مرخصی اعطاء میگردد،</pre>
                <div class="flex">
                    <span class="w-44">استحقاقی: ........... روز</span>
                    <span class="w-44">تشویقی: ........... روز</span>
                    <span>بین راهی: ........... روز</span>
                </div>
                <div class="flex">
                    <span class="w-44">تعطیلات رسمی: ........... روز</span>
                    <!-- <span class="w-44">انتقالی: ........... روز</span>
                    <span>سایر: ........... روز</span> -->
                </div>
                <!-- <div>
                    <pre> تاریخ حضور در یگان     /    / 1402</pre>
                </div> -->
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
                    <div class="w-44">
                        <span>بدینوسیله به درجه:</span>
                        <span></span>
                    </div>
                    <div class="w-56">
                        <span>نام و نام خانوادگی:</span>
                        <span></span>
                    </div>
                    <div class="w-40">
                        <span>ش ک:</span>
                        <span></span>
                    </div>
                    <div class="w-44">
                        <span>جمعی:</span>
                        <span></span>
                    </div>
                </div>
                <div>
                    <pre>از تاریخ:    /    / 1402  تا پایان مورخه:      /     / 1402  به مدت ...... روز مرخصی شهرستان            اعطاء میگردد.</pre>
                </div>
                <div>
                    <span>شرح مرخصی استفاده شده:</span>
                </div>
                <div class="flex">
                    <span class="w-44">استحقاقی: ........... روز</span>
                    <span class="w-44">تشویقی: ........... روز</span>
                    <span>بین راهی: ........... روز</span>
                </div>
                <div class="flex">
                    <span class="w-44">تعطیلات رسمی: ........... روز</span>
                    <!-- <span class="w-44">انتقالی: ........... روز</span>
                    <span>سایر: ........... روز</span> -->
                </div>
                <!-- <div class="flex">
                    <pre class="w-[348px]">3) تاریخ حضور در یگان     /    / 1402</pre>
                </div> -->
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
                    <div class="w-44">
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
                    <pre>از تاریخ: {{$vacation->start}}  تا پایان مورخه:    {{$vacation->end}} به مدت {{$vacation->entitlement + $vacation->Incentive + $vacation->distance}} روز مرخصی شهرستان      {{$vacation->employee->address}}      اعطاء میگردد.</pre>
                </div>
                <div>
                    <span>شرح مرخصی استفاده شده:</span>
                </div>
                <div class="flex">
                    <span class="w-44">استحقاقی: {{$vacation->entitlement}} روز</span>
                    <span class="w-44">تشویقی: {{$vacation->Incentive}} روز</span>
                    <span>بین راهی: {{$vacation->useddistance > 0 ? $vacation->distance : 0}} روز</span>
                </div>
                <div class="flex">
                    <span class="w-44">تعطیلات رسمی: {{$vacation->holiday}} روز</span>
                    <span class="w-44">انتقالی: ........... روز</span>
                    <span>سایر: ........... روز</span>
                </div>
                <!-- <div class="flex">
                    <pre class="w-[348px]">3) تاریخ حضور در یگان     /    / 1402</pre>
                </div> -->
                <div class="w-full flex justify-end">
                    <div class="flex flex-col items-center space-y-1 text-sm py-3 font-extrabold w-[330px]">
                        <span>فرمانده تیپ 388 مکا هجومی شهید حیدر شهرکی ایرانشهر</span>
                        <span>سرتیپ دوم ستاد محمدرضانژادسروری</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>