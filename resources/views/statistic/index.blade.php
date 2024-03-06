<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('/css/jalalidatepicker.min.css') }}" />
    <script src="{{ url('/js/jalalidatepicker.min.js') }}"></script>
    <script src="{{ url('/js/farvardin.min.js') }}"></script>
    <script src="{{ url('/js/index.js') }}"></script>
  @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body>
    <h2>آمار آخرین حضور</h2>
    <form method="POST" action="{{ route('statistics.attendance') }}">
        @csrf

        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center px-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                </svg>
            </div>
            <input autocomplete="off" data-jdp name="attendance" type="text"
                class="bg-gray-50 h-10 shadow-lg text-gray-900 border-[1px] border-gray-400 text-sm rounded-lg outline-none block w-full px-10"
                placeholder="تاریخ حضور">
        </div>

        <input type="submit" value="بررسی آمار" class="flex items-center justify-center outline-none
            bg-[conic-gradient(at_left,_var(--tw-gradient-stops))] from-lime-500 to-green-800 text-white w-24 h-9 rounded-md cursor-pointer">
    </form>

    @if (isset($vacations))
        @foreach ($vacations as $vacation)
            <div class="flex flex-col">
            <span class="text-red-500">{{$vacation}}</span>
            </div>
        @endforeach
        
    @endif


    <h2>Vacation</h2>

    <form method="POST" action="{{ route('statistics.ends') }}">
        @csrf

        <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center px-3 pointer-events-none">
                  <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                      d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                  </svg>
                </div>
                <input autocomplete="off" data-jdp name="endDate" type="text"
                  class="bg-gray-50 h-10 shadow-lg text-gray-900 border-[1px] border-gray-400 text-sm rounded-lg outline-none block w-full px-10"
                  placeholder="تاریخ برگشت">
        </div>

        <input type="submit" value="Submit">
    </form>
    <br><br>


    <table>
        <thead>
            <tr>
                <th>Province</th>
                <th>Number of Personnel</th>
            </tr>
        </thead>
        <tbody>
         @foreach ($personnelCounts as $count)
                <tr>
                    <td>{{ $count->address }}</td>
                    <td>{{ $count->personnel_count }}</td>
                </tr>
            @endforeach 
        </tbody>
    </table>
    
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
    </script>

</body>
</html>