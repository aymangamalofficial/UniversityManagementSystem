
<form action="{{ route('checkcode') }}" method="POST">
    @csrf
    {{-- <input type="hidden" name="realcode" value={{ $code }}> --}}
        <input type="text" name="code" id="studentID1" placeholder="الكود الجامعي" class="border p-2 w-full mb-2">

        <button class="bg-green-500 text-white px-4 py-2 hover:bg-green-600">حفظ</button>
</form>


<script>
      document.getElementById('loginForm').addEventListener('submit', function (e) {
            e.preventDefault();

            let isValid = true;

            const email = document.getElementById('email');
            const password = document.getElementById('password');
            const emailError = document.getElementById('emailError');
            const passwordError = document.getElementById('passwordError');

            emailError.style.display = 'none';
            passwordError.style.display = 'none';


            if (!email.value.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/)) {
                emailError.style.display = 'block';
                isValid = false;
            }


            if (password.value.length < 6) {
                passwordError.style.display = 'block';
                isValid = false;
            }

            if (isValid) {

                window.location.href = "file:///D:/medo%20web/project%20toursm/home/project%20w1%20torusm.html"; // رابط الصفحة الرئيسية
            }
        });
</script>
