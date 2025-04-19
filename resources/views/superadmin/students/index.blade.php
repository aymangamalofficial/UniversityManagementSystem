<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدارة الجامعة - إدارة الطلاب</title>
    <link rel="stylesheet" href="{{ asset('public/css/admin/dashboard_std.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"></script>
</head>
<body class="bg-gray-100">
    <header>
        <nav class="bg-gray-800 text-white py-4 px-6 flex justify-between items-center shadow-lg">
            <!-- Logo and Site Name -->
            <div class="flex items-center space-x-3">
                <div class="bg-gray-600 w-10 h-10 rounded-full">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('public/img/463211000_519263080949177_8597348305848868951_n.jpg') }}" alt="Logo" class="w-full h-full rounded-full">
                    </a>
                </div>
            </div>

            <!-- Centered Title -->
            <div class="flex-1 text-center">
                <a href="{{ route('home') }}" class="text-lg font-bold">جامعة أسيوط الجديدة التكنولوجية</a>
            </div>

            <!-- Login Button and Mobile Menu -->
            <div class="flex items-center space-x-3">
                <button class="login hidden md:inline-block bg-blue-300 text-black hover:shadow-lg hover:text-white transition px-4 py-2 rounded-lg duration-200">
                    <a class="signin" href="{{ route('home') }}">تسجيل الخروج <i class="fi fi-rr-sign-in-alt"></i></a>
                </button>
                <button id="menu-toggle" class="md:hidden bg-gray-700 p-2 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </nav>
    </header>

        <aside class="bg-blue-100">
            <img src="{{ asset('public/img/463211000_519263080949177_8597348305848868951_n-removebg-preview.png') }}" alt="شعار الجامعة" class="p-6 mt-9">
            <h2 class="text-xl font-bold text-center text-pink-950 mb-6">لوحة التحكم</h2>
            <div class="nav">
                <ul>
                    <li class="mb-4"><a href="{{ route('admin.home') }}" class="block py-2 px-4 text-black hover:bg-pink-950 hover:text-blue-200">الرئيسية</a></li>
                    <li class="mb-4"><a href="#" class="block py-2 px-4 text-black hover:bg-pink-950 hover:text-blue-200">الدكاترة</a></li>
                    <li class="mb-4"><a href="#" class="block py-2 px-4 text-black hover:bg-pink-950 hover:text-blue-200">المعيدين</a></li>
                    <li class="mb-4"><a href="{{ route('students.admin.index') }}" class="block py-2 px-4 text-black hover:bg-pink-950 hover:text-blue-200">الطلاب</a></li>
                    <li class="mb-4"><a href="{{ route('materials.admin.index') }}" class="block py-2 px-4 text-black hover:bg-pink-950 hover:text-blue-200">المواد</a></li>
                    <li class="mb-4"><a href="#" class="block py-2 px-4 text-black hover:bg-pink-950 hover:text-blue-200">الإعدادات</a></li>
                </ul>
            </div>
        </aside>
  <main class="p-6">
    <div class="modal-content py-4">
      <h2 class="text-4xl mb-4 text-pink-950">إدارة الطلاب</h2>
      <p class="text-gray-600 mt-4 mb-6 text-center md:text-right">
        لإضافة طالب جديد اضغط على الزر أدناه
      </p>
      <button id="addStudentBtn" class="btn1 p-1.5 hover:text-white" onclick="openAddModal()">إضافة طالب</button>
    </div>

    @if(!$students->isEmpty())
      <!-- جدول الطلاب -->
      <div class="bg-white p-6 rounded-lg shadow-lg mt-16 overflow-x-auto">
        <table class="border-collapse w-full shadow-sm rounded-lg overflow-hidden">
          <thead>
            <tr class="bg-gray-200 text-gray-700">
              <th class="border border-gray-300 px-4 py-3">الاسم</th>
              <th class="border border-gray-300 px-4 py-3">الرقم القومي</th>
              <th class="border border-gray-300 px-4 py-3">الكود الجامعي</th>
              <th class="border border-gray-300 px-4 py-3">البرنامج</th>
              <th class="border border-gray-300 px-4 py-3">السنة</th>
              <th class="border border-gray-300 px-4 py-3">الإجراءات</th>
            </tr>
          </thead>
          <tbody class="text-center">
            @foreach($students as $student)
              <tr class="hover:bg-gray-100 transition">
                <td class="border border-gray-300 px-4 py-3">{{ $student->name }}</td>
                <td class="border border-gray-300 px-4 py-3">{{ $student->national_id }}</td>
                <td class="border border-gray-300 px-4 py-3">{{ $student->code }}</td>
                <td class="border border-gray-300 px-4 py-3">{{ $student->department->department_name }}</td>
                <td class="border border-gray-300 px-4 py-3">
                  @if($student->year == 1)
                    الأولى
                  @elseif($student->year == 2)
                    الثانية
                  @elseif($student->year == 3)
                    الثالثة
                  @elseif($student->year == 4)
                    الرابعة
                  @endif
                </td>
                <td class="border border-gray-300 px-4 py-3 space-x-2">
                  <!-- زر التعديل مع تمرير بيانات الطالب باستخدام data attributes -->
                  <button class="bg-blue-500 text-white px-3 py-2 rounded-md hover:bg-blue-600 transition edit-btn"
                    data-id="{{ $student->id }}"
                    data-name="{{ $student->name }}"
                    data-national_id="{{ $student->national_id }}"
                    data-code="{{ $student->code }}"
                    data-year="{{ $student->year }}"
                    data-department="{{ $student->department->id }}"
                    onclick="openEditModal(this)">
                    تعديل
                  </button>
                  <!-- زر الحذف مع تمرير رقم الطالب -->
                  <button class="bg-red-500 text-white px-3 py-2 rounded-md hover:bg-red-600 transition delete-btn"
                    data-id="{{ $student->id }}"
                    onclick="openDeleteModal(this)">
                    حذف
                  </button>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @else
      <div class="text-center text-2xl text-gray-500 mt-10">لا توجد بيانات متاحة</div>
    @endif
  </main>

  <!-- مودال إضافة طالب (يستخدم نفس المودال مع بعض الاختلافات في التوجيه) -->
  <div id="studentAddModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
    <div class="bg-white p-6 rounded-lg w-1/3">
      <h2 class="text-xl mb-4">إضافة طالب جديد</h2>
      <form id="addStudentForm" method="POST" action="">
        @csrf
        <div class="mb-2">
          <input type="text" name="student_name" placeholder="اسم الطالب" class="border p-2 w-full mb-2" required>
        </div>
        <div class="mb-2">
          <input type="text" name="national_id" placeholder="الرقم القومي" class="border p-2 w-full mb-2" required
                 pattern="\d{14}" title="الرقم القومي يجب أن يحتوي على 14 رقم" inputmode="numeric">
        </div>
        <div class="mb-2">
          <input type="text" name="code" placeholder="الكود الجامعي" class="border p-2 w-full mb-2" required>
        </div>
        <div class="mb-2">
          <select name="student_year" class="w-full p-2 border mb-2" required>
            <option value="" disabled selected>اختر السنة الدراسية</option>
            <option value="1">الأولى</option>
            <option value="2">الثانية</option>
            <option value="3">الثالثة</option>
            <option value="4">الرابعة</option>
          </select>
        </div>
        <div class="mb-2">
          <select name="student_department" class="w-full p-2 border mb-2" required>
            <option value="" disabled selected>اختر البرنامج</option>
            <option value="1">تكنولوجيا المعلومات</option>
            <option value="2">تكنولوجيا شبكات نقل و توزيع الكهرباء</option>
            <option value="3">تكنولوجيا الأجهزة الإلكترونية و الكهربائية</option>
            <option value="4">تكنولوجيا التصنيع الغذائي</option>
          </select>
        </div>
        <div class="flex justify-end">
          <button type="submit" class="bg-green-500 text-white px-4 py-2 hover:bg-green-600">حفظ</button>
          <button type="button" onclick="closeAddModal()" class="bg-red-500 text-white px-4 py-2 hover:bg-red-600 ml-2">إلغاء</button>
        </div>
      </form>
    </div>
  </div>

  <!-- مودال تعديل بيانات الطالب (مودال واحد يُعاد استخدامه لكل عملية تعديل) -->
  <div id="studentEditModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
    <div class="bg-white p-6 rounded-lg w-1/3">
      <h2 class="text-xl mb-4">تعديل بيانات الطالب</h2>
      {{-- <form id="editStudentForm" method="POST" action="{{ route('students.admin.edit') }}"> --}}
        @csrf
        <!-- يتم تمرير رقم الطالب عبر حقل مخفي -->
        <input type="hidden" name="student_id" id="editStudentId">
        <div class="mb-2">
          <label for="editStudentName" class="block mb-1">اسم الطالب</label>
          <input type="text" name="student_name" id="editStudentName" placeholder="اسم الطالب" class="border p-2 w-full" required>
        </div>
        <div class="mb-2">
          <label for="editStudentNID" class="block mb-1">الرقم القومي</label>
          <input type="text" name="national_id" id="editStudentNID" placeholder="الرقم القومي" class="border p-2 w-full" required
                 pattern="\d{14}" title="الرقم القومي يجب أن يحتوي على 14 رقم" inputmode="numeric">
        </div>
        <div class="mb-2">
          <label for="editStudentCode" class="block mb-1">الكود الجامعي</label>
          <input type="text" name="code" id="editStudentCode" placeholder="الكود الجامعي" class="border p-2 w-full" required>
        </div>
        <div class="mb-2">
          <label for="editStudentYear" class="block mb-1">السنة الدراسية</label>
          <select name="student_year" id="editStudentYear" class="w-full p-2 border" required>
            <option value="">اختر السنة الدراسية</option>
            <option value="1">الأولى</option>
            <option value="2">الثانية</option>
            <option value="3">الثالثة</option>
            <option value="4">الرابعة</option>
          </select>
        </div>
        <div class="mb-2">
          <label for="editStudentDepartment" class="block mb-1">البرنامج</label>
          <select name="student_department" id="editStudentDepartment" class="w-full p-2 border" required>
            <option value="">اختر البرنامج</option>
            <option value="1">تكنولوجيا المعلومات</option>
            <option value="2">تكنولوجيا شبكات نقل و توزيع الكهرباء</option>
            <option value="3">تكنولوجيا الأجهزة الإلكترونية و الكهربائية</option>
            <option value="4">تكنولوجيا التصنيع الغذائي</option>
          </select>
        </div>
        <div class="flex justify-end mt-4">
          <button type="submit" class="bg-green-500 text-white px-4 py-2 hover:bg-green-600">حفظ</button>
          <button type="button" onclick="closeEditModal()" class="bg-red-500 text-white px-4 py-2 hover:bg-red-600 ml-2">إلغاء</button>
        </div>
      </form>
    </div>
  </div>

  <!-- مودال تأكيد الحذف (مودال واحد يُعاد استخدامه) -->
  <div id="deleteModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
    <div class="bg-white p-6 rounded-lg shadow-lg text-center w-96">
      <h2 class="text-xl font-bold mb-2 text-gray-800">تأكيد الحذف</h2>
      <p class="text-gray-700">
        سوف يتم حذف هذا الطالب بشكل نهائي. هل أنت متأكد؟
      </p>
      {{-- <form id="deleteStudentForm" method="POST" action="{{ route('students.admin.delete') }}"> --}}
        @csrf
        <!-- تمرير رقم الطالب الذي سيتم حذفه -->
        <input type="hidden" name="student_id" id="deleteStudentId">
        <div class="flex justify-between mt-4">
          <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 transition">حذف</button>
          <button type="button" onclick="closeDeleteModal()" class="bg-green-500 text-white px-3 py-1 rounded-md hover:bg-green-600 transition">إلغاء</button>
        </div>
      </form>
    </div>
  </div>

  <!-- سكربت الجافاسكريبت لتفعيل المودالات وتعبئتها بالبيانات ديناميكيًا -->
  <script>
    // فتح مودال الإضافة
    function openAddModal() {
      document.getElementById('studentAddModal').classList.remove('hidden');
    }
    function closeAddModal() {
      document.getElementById('studentAddModal').classList.add('hidden');
    }

    // فتح مودال التعديل وتعبئته بالبيانات
    function openEditModal(btn) {
      // الحصول على بيانات الطالب من data attributes
      var id          = btn.getAttribute('data-id');
      var name        = btn.getAttribute('data-name');
      var nationalId  = btn.getAttribute('data-national_id');
      var code        = btn.getAttribute('data-code');
      var year        = btn.getAttribute('data-year');
      var department  = btn.getAttribute('data-department');

      // تعبئة الحقول في نموذج التعديل
      document.getElementById('editStudentId').value = id;
      document.getElementById('editStudentName').value = name;
      document.getElementById('editStudentNID').value = nationalId;
      document.getElementById('editStudentCode').value = code;
      // ضبط قيمة الـ dropdown بحيث تُظهر القيمة الحالية للطالب
      document.getElementById('editStudentYear').value = year;
      document.getElementById('editStudentDepartment').value = department;

      // إظهار المودال
      document.getElementById('studentEditModal').classList.remove('hidden');
    }
    function closeEditModal() {
      document.getElementById('studentEditModal').classList.add('hidden');
    }

    // فتح مودال الحذف وتعيين رقم الطالب في الحقل المخفي
    function openDeleteModal(btn) {
      var id = btn.getAttribute('data-id');
      document.getElementById('deleteStudentId').value = id;
      document.getElementById('deleteModal').classList.remove('hidden');
    }
    function closeDeleteModal() {
      document.getElementById('deleteModal').classList.add('hidden');
    }
  </script>
</body>
</html>
