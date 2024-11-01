<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Sign in</title>
</head>
<body class="h-screen bg-black w-full flex items-center justify-center overflow-hidden">

  <header class="fixed top-0 w-full text-center mt-5">
    <img src="./images/reedulogo.svg" alt="Logo" class="mx-auto" />
  </header>

  <div class="flex flex-col items-center gap-10 mt-20">
    <img src="./images/blueline.svg" alt="" class="hidden md:block absolute md:right-[-150px] md:top-1/2 2xl:right-[-5%] xl:right-[5%] xl:top-[40%]" />
    <img src="./images/orangeline.svg" alt="" class="hidden md:block absolute md:left-[-200px] md:top-[55%] 2xl:left-[10%] xl:left-[5%]" />
    <img src="./images/mobileorange.svg" alt="" class="absolute left-[-20px] top-[40%] md:hidden" />
    <img src="./images/mobileblue.svg" alt="" class="absolute right-[-20px] top-[27%] md:hidden" />
    <img src="./images/man.png" alt="" class="hidden md:block absolute md:top-[25%] md:left-0 md:w-[150px] xl:w-[200px] 2xl:left-[15%] xl:left-[10%]" />

    <div class="w-full max-w-xl mx-4 md:mx-auto p-5 rounded-lg">
      <div class="bg-transparent border border-white rounded-lg grid grid-cols-2 gap-4 text-white mb-5">
        <button onclick="window.location.href='{{ route('registration') }}'" class="flex items-center justify-center h-full px-4 py-2 text-center text-[16px] md:text-[20px] text-white rounded-lg">
          რეგისტრაცია
        </button>

        <button onclick="window.location.href='{{ route('login') }}'" class="flex items-center justify-center h-full px-4 py-2 text-center text-[16px] md:text-[20px] font-medium rounded-lg bg-[#91c6ea]">
          ავტორიზაცია
        </button>
      </div>

      <form id="loginForm" method="post" action="{{ route('login') }}">
        @csrf
        <div class="mb-6">
          <label for="email" class="block mb-2 text-base font-normal leading-none uppercase text-white mt-6">ელ.ფოსტა</label>
          <input type="email" name="email" id="email" class="bg-black outline-none border border-white text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required value="" />
          @error('email')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>
        
        <div>
          <label for="password" class="block mb-2 text-base font-normal leading-none uppercase text-white">პაროლი</label>
          <input type="password" name="password" id="password" class="bg-black border outline-none border-white text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
          @error('password')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        <button type="submit" class="text-white bg-[#91c6ea] mt-8 focus:outline-none font-semibold rounded-lg text-[20px] w-full px-5 py-2.5 text-center border border-white hover:bg-black hover:text-white hover:border-white transition-all duration-300">
          ავტორიზაცია
        </button>

        <a href="{{ route('auth.google') }}" class="text-white flex justify-center gap-2 items-center border border-white mt-8 focus:outline-none font-semibold rounded-lg text-[20px] w-full px-5 py-2.5 text-center">
          <svg xmlns="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" width="32" height="32">
            <defs>
              <path id="A" d="M44.5 20H24v8.5h11.8C34.7 33.9 30.1 37 24 37c-7.2 0-13-5.8-13-13s5.8-13 13-13c3.1 0 5.9 1.1 8.1 2.9l6.4-6.4C34.6 4.1 29.6 2 24 2 11.8 2 2 11.8 2 24s9.8 22 22 22c11 0 21-8 21-22 0-1.3-.2-2.7-.5-4z"/>
            </defs>
            <clipPath id="B"><use xlink:href="#A" /></clipPath>
            <g transform="matrix(.727273 0 0 .727273 -.954545 -1.45455)">
              <path d="M0 37V11l17 13z" clip-path="url(#B)" fill="#fbbc05" />
              <path d="M0 11l17 13 7-6.1L48 14V0H0z" clip-path="url(#B)" fill="#ea4335" />
              <path d="M0 37l30-23 7.9 1L48 0v48H0z" clip-path="url(#B)" fill="#34a853" />
              <path d="M48 48L17 24l-4-3 35-10z" clip-path="url(#B)" fill="#4285f4" />
            </g>
          </svg>
          Google-ით ავტორიზაცია
        </a>
      </form>
    </div>
  </div>
</body>
</html>
