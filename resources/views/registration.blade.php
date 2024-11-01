<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Sign Up</title>
</head>
<body class="bg-black min-h-screen flex flex-col items-center justify-center overflow-hidden">

  <header class="fixed top-0 w-full text-center mt-5">
    <img src="./images/reedulogo.svg" alt="Logo" class="mx-auto" />
  </header>

  <div class="flex flex-col items-center gap-10 mt-20">
    <img src="./images/blueline.svg" alt="" class="hidden md:block absolute md:right-[-150px] md:top-1/2 2xl:right-[-5%] xl:right-[5%] xl:top-[40%]" />
    <img src="./images/orangeline.svg" alt="" class="hidden md:block absolute md:left-[-200px] md:top-[55%] 2xl:left-[10%] xl:left-[5%]" />
    <img src="./images/mobileorange.svg" alt="" class="absolute left-[-20px] top-[40%] md:hidden" />
    <img src="./images/mobileblue.svg" alt="" class="absolute right-[-20px] top-[27%] md:hidden" />
    <img src="./images/man.png" alt="" class="hidden md:block absolute md:top-[25%] md:left-0 md:w-[150px] xl:w-[200px] 2xl:left-[15%] xl:left-[10%]" />

    <div class="w-full max-w-xl mx-4 md:mx-auto p-12 rounded-lg">
      <div class="bg-transparent rounded-lg grid grid-cols-2 gap-4 border border-white mb-5">
        <button onclick="window.location.href='{{ route('registration') }}'" class="flex items-center justify-center h-full px-4 py-2 text-center text-[16px] md:text-[20px] text-white rounded-lg bg-[#91c6ea]">
          რეგისტრაცია
        </button>
        <button onclick="window.location.href='{{ route('login') }}'" class="flex items-center justify-center h-full px-4 py-2 text-center text-[16px] md:text-[20px] text-white font-medium rounded-s-lg">
          ავტორიზაცია
        </button>
      </div>

      <form id="registrationForm">
        @csrf
        <div class="mb-6 mt-[25px]" id="firstForm">
          <div class="mb-4">
            <label for="name" class="block mb-2 text-base font-normal leading-none uppercase text-white">სახელი და გვარი</label>
            <input type="text" name="name" class="bg-black outline-none border border-white text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
          </div>
          <div class="mb-4">
            <label for="email" class="block mb-2 text-base font-normal leading-none uppercase text-white">ელ.ფოსტა</label>
            <input type="email" name="email" class="bg-black outline-none border border-white text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
            <p id="emailError" class="text-red-500 text-sm mt-1 hidden"></p>
          </div>
          <div class="mb-4">
            <label for="phone" class="block mb-2 text-base font-normal leading-none uppercase text-white">ტელეფონი</label>
            <input type="text" name="phone" class="bg-black outline-none border border-white text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
            <p id="phoneError" class="text-red-500 text-sm mt-1 hidden"></p>
          </div>
          <div class="mb-2">
            <label for="password" class="block mb-2 text-base font-normal leading-none uppercase text-white">პაროლი</label>
            <input type="password" name="password" id="password" class="bg-black outline-none border border-white text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
            <p id="passwordError" class="text-red-500 text-sm mt-1 hidden"></p>
          </div>
          <div class="flex gap-2 items-center mt-[20px]">
            <input type="checkbox" id="agreeCheckbox" class="w-4 h-4" />
            <p class="text-white text-base font-normal leading-normal uppercase cursor-pointer">
              <span onclick="toggleCheckbox()"> ვეთანხმები </span>
              <a href="https://www.reeducate.space/terms-and-conditions" class="text-[#91C6EA]">წესებს და პირობებს</a>
            </p>
          </div>
          <button type="submit" id="submitBtn" class="hover:text-[20px] hover:w-22 hover:bg-transparent mb-5 transition-all duration-100 text-white bg-[#91C6EA] mt-[30px] cursor-pointer border border-white flex justify-center items-center focus:outline-none font-normal rounded-lg text-[30px] w-full text-center" disabled>
            რეგისტრაცია
          </button>
        </div>
      </form>
    </div>
  </div>

  <script>
    document.getElementById("agreeCheckbox").addEventListener("change", function () {
      document.getElementById("submitBtn").disabled = !this.checked;
    });

    function toggleCheckbox() {
      const checkbox = document.getElementById("agreeCheckbox");
      checkbox.checked = !checkbox.checked;
      document.getElementById("submitBtn").disabled = !checkbox.checked;
    }

    document.getElementById("registrationForm").addEventListener("submit", function (event) {
      event.preventDefault();

      const form = document.getElementById("registrationForm");
      const formData = new FormData(form);
      const emailError = document.getElementById("emailError");
      const phoneError = document.getElementById("phoneError");
      const passwordError = document.getElementById("passwordError");

      const password = document.getElementById("password").value;
      const hasUpperCase = /[A-Z]/.test(password);
      const hasLowerCase = /[a-z]/.test(password);
      const hasNumber = /\d/.test(password);
      const hasSpecialChar = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/.test(password);
      const isLongEnough = password.length >= 8;

      if (!(hasUpperCase && hasLowerCase && hasNumber && hasSpecialChar && isLongEnough)) {
        let errorMessage = "პაროლი უნდა შეიცავდეს მინიმუმ 8 სიმბოლოს, ";
        errorMessage += "დიდ ასოს, პატარა ასოს, ციფრს და სპეციალურ სიმბოლოს.";
        passwordError.textContent = errorMessage;
        passwordError.classList.remove("hidden");
        return;
      } else {
        passwordError.classList.add("hidden");
      }

      fetch("/validate-registration", {
        method: "POST",
        body: formData,
        headers: {
          "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value,
        },
      })
      .then((response) => response.json())
      .then((data) => {
        if (data.errors) {
          if (data.errors.email) {
            emailError.textContent = data.errors.email[0];
            emailError.classList.remove("hidden");
          } else {
            emailError.classList.add("hidden");
          }

          if (data.errors.phone) {
            phoneError.textContent = data.errors.phone[0];
            phoneError.classList.remove("hidden");
          } else {
            phoneError.classList.add("hidden");
          }
        } else {
          fetch("/request-otp", {
            method: "POST",
            body: formData,
            headers: {
              "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value,
            },
          })
          .then((response) => response.text())
          .then((html) => {
            document.body.innerHTML = html;
            if (typeof startCountdowns === "function") {
              startCountdowns();
            }
          })
          .catch((error) => console.error("Error:", error));
        }
      })
      .catch((error) => console.error("Error:", error));
    });
  </script>
</body>
</html>
