
<!doctype html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>سامانه ثبت مرخصی پایوران</title>
    <link rel="stylesheet" href="./css/output.css" />
</head>

<body>
    <div class="relative h-screen bg-background bg-cover object-cover">
        <div class="absolute bg-black/50 dark:bg-gray-900/50 w-full h-full transition-all duration-500">
            <div class="flex justify-center items-center h-full max-w-7xl mx-auto">
                <div class="bg-white/70 h-[600px] w-[600px] rounded-2xl shadow-lg flex justify-center items-center backdrop-blur-[6px]">
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form class="flex flex-col space-y-6 w-1/2" method="POST" action="{{ route('login') }}">
                        @csrf
                        <img src="./images/logo.png" alt="logo" class=" w-52 self-center" />
                        <h2 class="text-lg text-center text-gray-800 font-bold">
                            سامانه ثبت مرخصی پایوران
                        </h2>
                        <!-- Email Address -->
                            <!-- <x-input-label for="email" :value="__('Email')" /> -->
                            <x-text-input placeholder="نام کاربری" class="p-2 bg-white shadow-md outline-none rounded-lg text-gray-800 px-4 border-none" id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="off" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />

                        <!-- Password -->
                            <!-- <x-input-label for="password" :value="__('Password')" /> -->

                        <x-text-input placeholder="رمز عبور" id="password" class="p-2 bg-white shadow-md outline-none rounded-lg text-gray-800 px-4 border-none"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" value="رمز عبور یا نام کاربری اشتباه است" />
                        <!-- <input type="email" name="" id="" placeholder="نام کاربری"
                            class="p-2 bg-white shadow-md outline-none rounded-lg text-gray-800 px-4 border-none" />
                        <input type="password" name="" id="" placeholder="رمز عبور"
                        class="p-2 bg-white shadow-md outline-none rounded-lg text-gray-800 px-4 border-none" /> -->

                        <!-- Remember Me -->
                        <!-- <div class="flex items-start justify-start mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded-md border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                <span class="ms-2 text-sm text-gray-600">{{ __('ذخیره نام کاربری و رمز عبور!') }}</span>
                            </label>
                        </div> -->

                        <input type="submit" name="" id="" value="ورود به سامانه"
                            class="bg-gradient-to-r from-sky-400 to-blue-500 rounded-lg p-2 text-white cursor-pointer shadow-md disabled:from-gray-400 disabled:to-gray-400 disabled:pointer-events-none" />
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
