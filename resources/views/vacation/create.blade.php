<!doctype html>
<html lang="en" dir="rtl">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>سامانه ثبت مرخصی پایوران</title>
  <link rel="stylesheet" href="{{ url('/css/jalalidatepicker.min.css') }}" />
  <script src="{{ url('/js/jalalidatepicker.min.js') }}"></script>
  <script src="{{ url('/js/farvardin.min.js') }}"></script>
  <script src="{{ url('/js/index.js') }}"></script>
  @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
  <div>
    <div class="flex items-center justify-between h-20 px-10 shadow-lg">
      <span class="font-medium text-lg">سامانه جامع ثبت مرخصی پایوران</span>
      <a  href="{{ route('employees.index') }}" class="bg-white rounded-full p-2 shadow-lg">
        <img src="{{ url('/images/logo.png') }}" alt="logo" class="w-12" />
      </a>
    </div>

    <div class="my-8 max-w-md sm:max-w-xl md:max-w-2xl lg:max-w-7xl m-auto">
      <form action="{{route('vacation.store')}}" method="POST" >
        @csrf
        <div class="flex flex-col space-y-6">
          <div class="flex space-x-3 space-x-reverse">
            <a href="{{ route('employees.index') }}">
              <span class="text-lg">صفحه اصلی</span>
            </a>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>
            <a href="#">
              <span class="font-semibold text-lg">ثبت مرخصی پایور</span>
            </a>
          </div>


          <div class="w-full rounded-lg shadow-lg p-10 py-8 bg-white">

            <div class="flex flex-col items-start justify-center">
              <span class="text-xl font-bold">ثبت مرخصی برای:</span>
            </div>


            <div class="flex items-center justify-start space-x-10 space-x-reverse my-6 text-lg">
              <div>
                <span class="text-lg font-bold">نام و نشان:</span>
                <span>{{ $employee->name }} </span>
              </div>
              <div>
                <span class="text-lg font-bold">درجه:</span>
                <span>{{ $employee->rank }} </span>
              </div>
              <div>
                <span class="text-lg font-bold">شماره کارگزینی:</span>
                <span>{{ $employee->code }}</span>
              </div>
              <div>
                <span class="text-lg font-bold">استحقاق باقی مانده :</span>
                <span>{{ $employee->entitlement }} روز</span>
              </div>
              <div id="distanceShow">
                <span class="text-lg font-bold">استفاده از بعد مسافت:</span>
                <span>{{ $employee->useddistance }} مرتبه</span>
              </div>
            </div>
            <div>
              <span class="text-lg font-bold">یگان:</span>
              <span>{{ $employee->battalion }} </span>
            </div>


            <div class="flex flex-col my-6">
              <span class="font-semibold text-lg">انتخاب تاریخ مرخصی:</span>
              <div class="flex items-center space-x-6 space-x-reverse my-3 mb-10">
                <div class="relative">
                  <div class="absolute inset-y-0 start-0 flex items-center px-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                      fill="currentColor" viewBox="0 0 20 20">
                      <path
                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                    </svg>
                  </div>
                  <!-- <button disabled class="absolute inset-y-0 left-0 text-sm bg-gray-500 text-white rounded-lg px-3 outline-none m-1">ثبت</button> -->
                  <input id="start" autocomplete="off" data-jdp name="start" type="text"
                    class="bg-gray-50 h-10 shadow-lg text-gray-900 border-[1px] border-gray-400 text-sm rounded-lg outline-none block w-full px-10"
                    placeholder="تاریخ رفت">
                </div>

                  <span class="mx-4 text-gray-500 hidden lg:block">تا</span>
          
                <div class="relative">
                  <div class="absolute inset-y-0 start-0 flex items-center px-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                      fill="currentColor" viewBox="0 0 20 20">
                      <path
                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                    </svg>
                  </div>
                  <!-- <button disabled class="absolute inset-y-0 left-0 text-sm bg-gray-500 text-white rounded-lg px-3 outline-none m-1">ثبت</button> -->
                  <input id="end" autocomplete="off" data-jdp name="end" type="text"
                    class="bg-gray-50 h-10 shadow-lg text-gray-900 border-[1px] border-gray-400 text-sm rounded-lg outline-none block w-full px-10"
                    placeholder="تاریخ برگشت">
                </div>


                <div class="relative">
                  <div class="absolute inset-y-0 start-0 flex items-center px-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                      fill="currentColor" viewBox="0 0 20 20">
                      <path
                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                    </svg>
                  </div>
                  <!-- <button disabled class="absolute inset-y-0 left-0 text-sm bg-gray-500 text-white rounded-lg px-3 outline-none m-1">ثبت</button> -->
                  <input autocomplete="off" data-jdp name="attendance" type="text"
                    class="bg-gray-50 h-10 shadow-lg text-gray-900 border-[1px] border-gray-400 text-sm rounded-lg outline-none block w-full px-10"
                    placeholder="تاریخ حضور">
                </div>

              </div>
            </div>


            <div class="flex items-center">
        <div class="flex items-center space-x-6 space-x-reverse ">
        <div class="hidden items-center justify-center space-x-4 space-x-reverse">
          <input class="entitlement w-64 bg-gray-50 border-1 shadow-lg text-gray-900 border-[1px] border-gray-400 text-sm rounded-lg block"
          type="number" id="" name="entitlement" placeholder=" استحقاق...">
        </div>
      </div>

      <div class="flex items-center">
        <div class="flex items-center space-x-6 space-x-reverse ">
        <div class="hidden items-center justify-center space-x-4 space-x-reverse">
          <input class="holiday w-64 bg-gray-50 border-1 shadow-lg text-gray-900 border-[1px] border-gray-400 text-sm rounded-lg block"
          type="number" id="" name="holiday" placeholder=" مجموعه روزهای تعطیل...">
        </div>
      </div>

      <input type="checkbox" id="distance" name="distance" class="hidden">          
    </div>

    <div class="flex flex-col space-y-2">
          <span class="font-semibold text-lg block">مرخصی های ویژه:</span>
          <label id="notIncentive" class="text-red-500 font-semibold">برای این شخص مرخصی ویژه ثبت نشده است.</label>
          @foreach ($incentives as $incentive)
          <div class="flex items-center space-x-2 space-x-reverse">
            <input id="incentive" type="checkbox" id="" name="incentive[]" value="{{$incentive->id}}">
            <label>{{$incentive->title}} {{$incentive->days}} روز</label>
          </div>
          @endforeach
        </div>

          <input type="hidden" id="custId" name="employee_id" value="{{$employee->id}}">
      </div>
      
        <div id="show-text" class="flex items-center space-x-8 space-x-reverse my-6 font-bold text-lg text-red-500"></div>

          </div>

          <div class="flex items-center justify-between sm:justify-end space-x-4 space-x-reverse">
            <button type="button" id="calculate"
              class="flex items-center justify-center
              bg-[conic-gradient(at_left,_var(--tw-gradient-stops))] from-sky-400 to-blue-800 text-white w-36 h-10 rounded-md cursor-pointer focus:outline-none">
              <span>محاسبه تعداد روز</span>
            </button>
            <button id="submitLeave" disabled class="flex items-center justify-center outline-none bg-[conic-gradient(at_left,_var(--tw-gradient-stops))] from-lime-500 to-green-800 text-white w-28 h-10 rounded-md cursor-pointer">
              <span>ثبت مرخصی</span>
            </button>
            <a href="{{ route('employees.index') }}" class="flex items-center justify-center outline-none
                bg-[conic-gradient(at_left,_var(--tw-gradient-stops))] from-red-600 to-orange-600 text-white w-28 h-10 rounded-md cursor-pointer">
                <span>بازگشت</span>
            </a>
        </div>
      </form>
    </div>


    <script>
      jalaliDatepicker.startWatch({
        minDate: "attr",
        maxDate: "attr",
        minTime: "attr",
        maxTime: "attr",
        hideAfterChange: false,
        autoHide: true,
        showTodayBtn: true,
        showEmptyBtn: true,
        topSpace: 10,
        bottomSpace: 30,
        dayRendering(opt, input) {
          return {
            isHollyDay: opt.day == 1
          }
        }
      });

      if(document.getElementById("incentive")){
        document.getElementById("notIncentive").style.display = "none";
      }

      var holidaysCollection = ['1402,11,5', '1402,11,6', '1402,11,13', '1402,11,19', '1402,11,20', '1402,11,22', '1402,11,27', '1402,12,4',
       '1402,12,6', '1402,12,11', '1402,12,18', '1402,12,25', '1402,12,29', '1403,1,1', '1403,1,2', '1403,1,3', '1403,1,4',
       '1403,1,10', '1403,1,12', '1403,1,13', '1403,1,17', '1403,1,22', '1403,1,23', '1403,1,24', '1403,1,31', '1403,2,7',
        '1403,2,14', '1403,2,15', '1403,2,21', '1403,2,28', '1403,3,4', '1403,3,11', '1403,3,14', '1403,3,15', '1403,3,18',
        '1403,3,25', '1403,3,28', '1403,4,1', '1403,4,5', '1403,4,8', '1403,4,15', '1403,4,22', '1403,4,25', '1403,4,26',
        '1403,4,29', '1403,5,5', '1403,5,12', '1403,5,19', '1403,5,26', '1403,6,2', '1403,6,4', '1403,6,9', '1403,6,12', '1403,6,14',
        '1403,6,16', '1403,6,22', '1403,6,23', '1403,6,30', '1403,6,31', '1403,7,6', '1403,7,13', '1403,7,20', '1403,7,27', '1403,8,4',
         '1403,8,11', '1403,8,18', '1403,8,25', '1403,9,2', '1403,9,9', '1403,9,15', '1403,9,16', '1403,9,23', '1403,9,30', '1403,10,7',
         '1403,10,14', '1403,10,21', '1403,10,25', '1403,10,28', '1403,11,5', '1403,11,9', '1403,11,12', '1403,11,19', '1403,11,22',
         '1403,11,26', '1403,12,3', '1403,12,10', '1403,12,17', '1403,12,24', '1403,12,29', '1403,12,30']
      var numberArray = []
      for (i = 0; i < holidaysCollection.length; i++) {
        numberArray.push(holidaysCollection[i].split(','))
      }

      var holidays = []
      for (j = 0; j < numberArray.length; j++) {
        holidays.push(farvardin.solarToGregorian(Number(numberArray[j][0]), Number(numberArray[j][1]), Number(numberArray[j][2]), 'string').split('-'))
      }

      var startDate
      var endtDate
      var date1
      var date2
      var getDateTime1
      var getDateTime2

      document.getElementById("start").addEventListener("jdp:change", function (e) {
        startDate = e.target.value.split("/")
        date1 = farvardin.solarToGregorian(Number(startDate[0]), Number(startDate[1]), Number(startDate[2]), "string")
        getDateTime1 = new Date(date1).getTime()
      })

      document.getElementById("end").addEventListener("jdp:change", function (e) {
        endDate = e.target.value.split("/")
        date2 = farvardin.solarToGregorian(Number(endDate[0]), Number(endDate[1]), Number(endDate[2]), "string")
        getDateTime2 = new Date(date2).getTime()
      })

      var showText = document.getElementById("show-text")
      var title = document.createElement('span')
      var claculateDate = document.createElement('span')
      var holidaysCountShow = document.createElement('span')
      var distance = document.createElement('span')
      var incentive = document.createElement('span')
      var workingDays = document.createElement('span')
      var selectDaysError = document.createElement('span')
      

      
      if({{$employee->useddistance}} === 2){
        document.getElementById("distanceShow").style.color = 'red';
        document.getElementById("distanceShow").style.textDecoration = 'line-through';
      }

      var distanceInput  = document.getElementById("distance")
      var inputs = document.getElementsByTagName("input")
      var extension = []
      for (var i = 0; i < inputs.length; i++) {
        if(inputs[i].type == "checkbox" && inputs[i] != distanceInput) {
          console.log(inputs[i].nextElementSibling.innerHTML.includes('تمدید'))
          if(inputs[i].nextElementSibling.innerHTML.includes('تمدید') == true){
            extension.push(inputs[i].nextElementSibling.innerHTML)
            if(extension.length > 1){
              showText.innerHTML = 'شما مجاز به ثبت بیشتر از یک تمدید مرخصی در سال نیستید.'
              inputs[i].nextElementSibling.style.textDecoration = 'line-through'
              inputs[i].disabled = true
            }
            inputs[i].nextElementSibling.style.color = 'red'
          }
        }
      }

      
      checkDifferenceDates = () => {
        showText.innerHTML = " "

        var incentiveDays = []
        var incentiveSum = 0

        for (var i = 0; i < inputs.length; i++) {
          if(inputs[i].type == "checkbox" && inputs[i] != distanceInput) {
            if(inputs[i].checked == true && inputs[i].nextElementSibling.innerHTML.includes('تمدید') == false){
              incentiveDays.push(Number(inputs[i].nextElementSibling.innerHTML.match(/(\d+)/)[1]))
            }
          }
        }
        for (var i = 0; i < incentiveDays.length; i++){
          incentiveSum += incentiveDays[i]
        }
        
        if (date1 && date2) {
          if (getDateTime2 > getDateTime1) {
            Difference_In_Time = getDateTime2 - getDateTime1
            Difference_In_Days = Math.round(Difference_In_Time / (1000 * 3600 * 24))
            
            var d1 = date1.split("-")
            var d2 = date2.split("-")
            var from = new Date(d1[0], parseInt(d1[1]) - 1, d1[2]);  // -1 because months are from 0 to 11
            var to = new Date(d2[0], parseInt(d2[1]) - 1, d2[2]);
            var holidaysCount = []
            for (i = 0; i < holidays.length; i++) {
              var check = new Date(holidays[i][0], parseInt(holidays[i][1]) - 1, holidays[i][2])
              if (check >= from && check < to) {
                holidaysCount.push(holidays[i])
              }
            }
            title.innerHTML = "محاسبه تعداد روز مرخصی:"
            title.classList.add("font-semibold", "text-lg","my-8","block","text-black")
            claculateDate.innerHTML = "کل روزها:" + " " + Difference_In_Days + " " + "روز"
            holidaysCountShow.innerHTML = "تعطیلات:" + " " + holidaysCount.length + " " + "روز"
            
            var entitlement
            var holiday
            if('{{ $employee->battalion }}'.includes("شیفت")){
              // workingDays.innerHTML = 'کسر استحقاق:' + " " + 0 + " " + 'روز'
              incentive.innerHTML = 'استراحت نگهبانی:' + " " + (incentiveSum + {{ $employee->distance }}) + " " + 'روز'
              entitlement = document.querySelector('.entitlement').value = 0
              holiday = document.querySelector('.holiday').value = holidaysCount.length
              showText.appendChild(title)
              showText.appendChild(claculateDate)
              showText.appendChild(holidaysCountShow)
              if({{$employee->useddistance}} < 2){
                document.getElementById("distance").checked = true
                distance.innerHTML = "بین راهی:" + " " + {{ $employee->distance }} + " " + "روز"
                document.querySelector('.entitlement').value = 0
                // workingDays.innerHTML = 'کسر استحقاق:' + " " + 0 + " " + 'روز'
              } else {
                document.getElementById("distance").checked = false
              }
              showText.appendChild(distance)
              showText.appendChild(incentive)
              showText.appendChild(workingDays)
            } else {
              workingDays.innerHTML = 'کسر استحقاق:' + " " + (Difference_In_Days - holidaysCount.length - incentiveSum) + " " + 'روز'
              incentive.innerHTML = 'مرخصی ویژه:' + " " + incentiveSum + " " + 'روز'
              entitlement = document.querySelector('.entitlement').value = Difference_In_Days - holidaysCount.length - incentiveSum
              holiday = document.querySelector('.holiday').value = holidaysCount.length
              showText.appendChild(title)
              showText.appendChild(claculateDate)
              showText.appendChild(holidaysCountShow)
              if({{$employee->useddistance}} < 2){
                document.getElementById("distance").checked = true
                distance.innerHTML = "بین راهی:" + " " + {{ $employee->distance }} + " " + "روز"
                document.querySelector('.entitlement').value = entitlement - {{ $employee->distance }}
                workingDays.innerHTML = 'کسر استحقاق:' + " " + (entitlement - {{ $employee->distance }}) + " " + 'روز'
              } else {
                document.getElementById("distance").checked = false
              }
              showText.appendChild(distance)
              showText.appendChild(incentive)
              showText.appendChild(workingDays)
            }
            
          } else {
            claculateDate.remove()
            selectDaysError.innerHTML = "تاریخ وارد شده اشتباه است!"
            showText.appendChild(selectDaysError)
          }
          
        } else {
          selectDaysError.innerHTML = "تاریخ ها را درست وارد نمایید!"
          showText.appendChild(selectDaysError)
        }
        
        if(entitlement < 0) {
          showText.innerHTML = "بدلیل وارد کردن تعداد تشویقی زیاد امکان ثبت این مرخصی وجود ندارد!"
        } else if(entitlement > {{ $employee->entitlement }} ) {
          showText.innerHTML = `مقدار مرخصی وارد شده از استحقاق باقی مانده شما بیشتر است! مقدار استحقاق باقی مانده: ${ ({{ $employee->entitlement }}) } روز مقدار استحقاق انتخاب شده: ${entitlement} روز `
        } else {
          document.getElementById("submitLeave").removeAttribute('disabled','')
        }
      }
      
      document.getElementById('calculate').addEventListener("click", () => checkDifferenceDates())
      
    </script>
</body>

</html>