<!doctype html>
<html lang="en" dir="rtl">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>سامانه ثبت مرخصی پایوران</title>
  <link rel="stylesheet" href="{{ url('/css/output.css') }}" />
  <script src="{{ url('/js/datepicker.min.js') }}"></script>
  <script src="{{ url('/js/flowbite.min.js') }}"></script>
</head>

<body class="bg-gray-100">
  <div>
    <div class="flex items-center justify-between h-20 px-10 shadow-lg">
      <p class="font-medium text-lg">سامانه ثبت مرخصی پایوران</p>
      <a href="./" class="bg-white rounded-full p-2 shadow-lg">
        <img src="{{ url('/images/logo.png') }}" alt="logo" class="w-12" />
      </a>
    </div>

    <div class="my-8 max-w-7xl m-auto">
      <div class="flex flex-col space-y-6">
        <div class="flex items-center justify-between space-x-3 space-x-reverse">
          <div class="flex items-center">
            <a href="./">
              <span class="text-lg">صفحه اصلی</span>
            </a>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>
            <a href="#">
              <span class="font-semibold text-lg">مشاهده اطلاعات پایور</span>
            </a>
          </div>

          <div class="flex items-center space-x-3 space-x-reverse">

            <a href="{{route('personnel.encouragement' , $personnel->id)}}"
              class="flex items-center justify-center 
              bg-[conic-gradient(at_left,_var(--tw-gradient-stops))] from-green-400 to-green-700 text-white w-24 h-10 rounded-md cursor-pointer">
              <span>مرخصی های تشویقی</span>
            </a>

            <a href="{{route('personnels.edit' , $personnel->id)}}"
              class="flex items-center justify-center 
              bg-[conic-gradient(at_left,_var(--tw-gradient-stops))] from-orange-400 to-orange-700 text-white w-24 h-10 rounded-md cursor-pointer">
              <span>ویرایش</span>
            </a>

            <form action="{{route('personnels.destroy' , $personnel->id)}}" method="post">
                @csrf
                @method('DELETE')

            <a href=""
                class="flex items-center justify-center 
                bg-[conic-gradient(at_left,_var(--tw-gradient-stops))]  text-red w-24 h-10 rounded-md cursor-pointer">
                <input type="submit" value="حذف کاربر">
            </a>

            </form>

            <a href="{{ url("/personnels/$personnel->id/vacation") }}" class="flex items-center justify-center 
            bg-gradient-to-r from-green-400 to-green-500 text-white w-36 h-10 rounded-md cursor-pointer">
              <span>تاریخچه مرخصی ها</span>
            </a>
          </div>

        </div>

        <div class="container w-full rounded-lg shadow-lg p-10 py-8 bg-white space-y-8">
          <div class="container-header flex items-center space-x-6 space-x-reverse">
            <div>
              <img src="./images/user.jpg" alt="logo" class="rounded-full shadow-xl border-2 w-44 h-44" />
            </div>

            <div class="flex flex-col space-y-3">
              <span class="font-bold text-2xl">{{$personnel->name}}</span>
              <span class="text-lg"> درجه : {{$personnel->rank}}</span>
            </div>
          </div>

          <div class="container-body grid grid-cols-5 gap-8">
            <div class="flex flex-col items-center justify-center w-48 h-20 bg-gray-100 space-y-2 rounded-md shadow-lg">
              <span class="font-semibold">شماره کارگزینی:</span>
              <span class="text-lg">{{$personnel->personnel_code}}</span>
            </div>

            <div class="flex flex-col items-center justify-center w-48 h-20 bg-gray-100 space-y-2 rounded-md shadow-lg">
              <span class="font-semibold">استحقاق باقی مانده:</span>
              <span class="text-lg">{{$personnel->entitlement}}</span>
            </div>

            <div class="flex flex-col items-center justify-center w-48 h-20 bg-gray-100 space-y-2 rounded-md shadow-lg">
              <span class="font-semibold">گردان :</span>
              <span class="text-lg">{{$personnel->battalion}}</span>
            </div>

            <div class="flex flex-col items-center justify-center w-48 h-20 bg-gray-100 space-y-2 rounded-md shadow-lg">
              <span class="font-semibold">محاسبه بعد مسافت:</span>
              <span class="text-lg">{{$personnel->distance}}</span>
            </div>

            <div class="flex flex-col items-center justify-center w-52 h-20 bg-gray-100 space-y-2 rounded-md shadow-lg">
              <span class="font-semibold">استفاده از بعد مسافت:</span>
              <span class="text-lg">{{$personnel->useddistance}}</span>
            </div>

            <div class="flex flex-col items-center justify-center w-72 h-20 bg-gray-100 space-y-2 rounded-md shadow-lg">
              <span class="font-semibold">آدرس:</span>
              <span class="text-lg">{{$personnel->address}}</span>
            </div>
          </div>
        </div>

        <div class="flex items-center justify-end">
          <div class="flex space-x-4 space-x-reverse">
            <a href="./" class="flex items-center justify-center 
              bg-gradient-to-r from-red-500 to-red-700 text-white w-28 h-10 rounded-md cursor-pointer">
              <span>بازگشت</span>
            </a>
          </div>
        </div>
      </div>
    </div>


    <!-- <script>
      async function fetchUserData() {
        try {
          const response = await fetch('http://leave.test/api/personnels/1');
          const users = await response.json();
          return users.data;

        } catch (error) {
          console.error('Error fetching data:',error)
        }
      }

      async function renderData() {
        const containerHeader = document.querySelector('.container-header')
        const containerBody = document.querySelector('.container-body')
        const data = await fetchUserData();
        console.log(data)

        if(!data){
          return
        }

        // data.forEach(item => {
          const containerHeaderImage = document.createElement('div')
          const headerImage = document.createElement('img')
          headerImage.classList.add('rounded-full','shadow-xl','border-2','w-44','h-44')
          // headerImage.src = data.image
          const containerHeaderName = document.createElement('div')
          containerHeaderName.classList.add('flex','flex-col','space-y-3')
          const HeaderName = document.createElement('span')
          HeaderName.classList.add('font-bold','text-2xl')
          HeaderName.textContent = `${data.name}`
          const HeaderRank = document.createElement('span')
          HeaderRank.classList.add('text-lg')
          HeaderRank.textContent = `درجه: ${data.rank}`
          
          //personnelCode
          const containerBodyPersonnelCode = document.createElement('div')
          containerBodyPersonnelCode.classList.add('flex','flex-col','items-center','justify-center','w-48','h-20','bg-gray-100','space-y-2','rounded-md','shadow-lg')
          const personnelCodeLabel = document.createElement('span')
          personnelCodeLabel.classList.add('font-semibold')
          personnelCodeLabel.textContent = "شماره کارگزینی:"
          const personnelCode = document.createElement('span')
          personnelCode.classList.add('text-lg')
          personnelCode.textContent = `${data.personnel_code}`

          //entitlement
          const containerBodyEntitlement = document.createElement('div')
          containerBodyEntitlement.classList.add('flex','flex-col','items-center','justify-center','w-48','h-20','bg-gray-100','space-y-2','rounded-md','shadow-lg')
          const entitlementLabel = document.createElement('span')
          entitlementLabel.classList.add('font-semibold')
          entitlementLabel.textContent = "استحقاق باقی مانده:"
          const entitlement = document.createElement('span')
          entitlement.classList.add('text-lg')
          entitlement.textContent = `${data.entitlement}`

          //distance
          const containerBodyDistance = document.createElement('div')
          containerBodyDistance.classList.add('flex','flex-col','items-center','justify-center','w-48','h-20','bg-gray-100','space-y-2','rounded-md','shadow-lg')
          const distanceLabel = document.createElement('span')
          distanceLabel.classList.add('font-semibold')
          distanceLabel.textContent = "محاسبه بعد مسافت:"
          const distance = document.createElement('span')
          distance.classList.add('text-lg')
          distance.textContent = `${data.distance}`

          //useddistance
          const containerBodyUseddistance = document.createElement('div')
          containerBodyUseddistance.classList.add('flex','flex-col','items-center','justify-center','w-48','h-20','bg-gray-100','space-y-2','rounded-md','shadow-lg')
          const useddistanceLabel = document.createElement('span')
          useddistanceLabel.classList.add('font-semibold')
          useddistanceLabel.textContent = "استفاده از بعد مسافت:"
          const useddistance = document.createElement('span')
          useddistance.classList.add('text-lg')
          useddistance.textContent = `${data.useddistance}`

          //address
          const containerBodyAddress = document.createElement('div')
          containerBodyAddress.classList.add('flex','flex-col','items-center','justify-center','w-48','h-20','bg-gray-100','space-y-2','rounded-md','shadow-lg')
          const addressLabel = document.createElement('span')
          addressLabel.classList.add('font-semibold')
          addressLabel.textContent = "آدرس:"
          const address = document.createElement('span')
          address.classList.add('text-lg')
          address.textContent = `${data.address}`

          containerHeaderImage.appendChild(headerImage)
          containerHeader.appendChild(containerHeaderImage)
          containerHeaderName.appendChild(HeaderName)
          containerHeaderName.appendChild(HeaderRank)
          containerHeader.appendChild(containerHeaderName)

          // containerHeaderImage.appendChild(headerImage)
          // containerHeader.appendChild(containerHeaderImage)
          containerBodyPersonnelCode.appendChild(personnelCodeLabel)
          containerBodyPersonnelCode.appendChild(personnelCode)
          containerBody.appendChild(containerBodyPersonnelCode)

          containerBodyEntitlement.appendChild(entitlementLabel)
          containerBodyEntitlement.appendChild(entitlement)
          containerBody.appendChild(containerBodyEntitlement)

          containerBodyDistance.appendChild(distanceLabel)
          containerBodyDistance.appendChild(distance)
          containerBody.appendChild(containerBodyDistance)

          containerBodyUseddistance.appendChild(useddistanceLabel)
          containerBodyUseddistance.appendChild(useddistance)
          containerBody.appendChild(containerBodyUseddistance)

          containerBodyAddress.appendChild(addressLabel)
          containerBodyAddress.appendChild(address)
          containerBody.appendChild(containerBodyAddress)
        // });
      }

      renderData()
    </script> -->

</body>

</html>