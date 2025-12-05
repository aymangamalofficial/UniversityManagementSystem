@extends('admins.layout')

@section('title', 'إدارة أعضاء هيئة التدريس و الهيئة المعاونة')

@section('main-content')
    <main class="p-6">
        <div class="modal-content py-4">
            <h2 class="text-4xl mb-4 text-pink-950">إدارة هيئة التدريس و الهيئة المعاونة </h2>
            <p class="text-gray-600 mt-4 mb-6 text-center md:text-right">لإضافة عضو هيئة جديد    </p>
                <button id="addStudentBtn" class="btn1 block p-1.5 hover:text-white mb-3" onclick="opendr()">إضافة عضو هيئة تدريس</button>
                <button id="addStudentBtn" class="btn1 block p-1.5 hover:text-white " onclick="openassit()">إضافة عضو هيئة معاونة</button>
        </div>

    @if(!$Instructors->isEmpty())
        <!-- قسم البحث والتصفية -->
        <div class="bg-white p-6 rounded-lg shadow-lg mt-16 overflow-x-auto">
        <div class="flex flex-col md:flex-row items-center gap-4 mb-6">
            <!-- حقل البحث بالكود الجامعي -->
            <input type="text" id="codeSearch" class="border p-2 rounded-lg w-full md:w-1/4" placeholder="ابحث بالكود الجامعي">

            <select id="majorFilter" class="border p-2 rounded-lg w-full md:w-1/4">
                <option value="">اختر الهيئة</option>
                <option value="هيئة تدريس">هيئة تدريس</option>
                <option value="هيئة معاونة">هيئة معاونة</option>
            </select>
        </div>

                <!-- جدول البيانات -->
                <table class="border-collapse w-full shadow-sm rounded-lg overflow-hidden">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700">
                            <th class="border border-gray-300 px-4 py-3">الاسم</th>
                            <th class="border border-gray-300 px-4 py-3">الرقم القومي</th>
                            <th class="border border-gray-300 px-4 py-3">الرقم الجامعي</th>
                            <th class="border border-gray-300 px-4 py-3">الهيئة التابع لها</th>
                            <th class="border border-gray-300 px-4 py-3">الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody id="dataTable">
                        @foreach($Instructors as $Instructor)
                            <tr class="hover:bg-gray-100 transition">
                                <td class="border border-gray-300 px-4 py-3">{{ $Instructor->name }}</td>
                                <td class="border border-gray-300 px-4 py-3">{{ $Instructor->national_id }}</td>
                                <td class="border border-gray-300 px-4 py-3">{{ $Instructor->code }}</td>
                                <td class="border border-gray-300 px-4 py-3">
                                    @if($Instructor->role_id == 0)
                                        هيئة معاونة
                                    @elseif($Instructor->role_id == 1)
                                        هيئة تدريس
                                    @endif
                                </td>
                                <td class="border border-gray-300 px-4 py-3 space-x-2">
                                    {{-- <button
                                    onclick="openEditModal(this)"
                                    data-id="{{ $Instructor->id }}"
                                    data-name="{{ $Instructor->name }}"
                                    data-national_id="{{ $Instructor->national_id }}"
                                    data-code="{{ $Instructor->code }}"
                                    data-role="{{ $Instructor->role_id }}"
                                    class="bg-blue-500 text-white px-3 py-2 rounded-md hover:bg-blue-600 transition">
                                    تعديل
                                </button> --}}
                                {{-- <button onclick="openEdite()" class="bg-blue-500 text-white px-3 py-2 rounded-md hover:bg-blue-600 transition">تعديل</button> --}}
                                <form action="{{ route('members.admin.del') }}" method="POST">
                                    @csrf
                                    <input type="hidden" id="studentID" name="instructor_id" value="{{ $Instructor->instructor_id }}">
                                    <button type="submit" {{--onclick="opendelete()"--}} class="bg-red-500 text-white px-3 py-2 rounded-md hover:bg-red-600 transition">حذف</button>
                                </form>
                                </td>
                            </tr>

                            <div id="editModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
                                <div class="bg-white p-6 rounded-lg w-1/3">
                                    <h2 class="text-xl mb-4">تعديل بيانات عضو الهيئة</h2>
                                    <form id="editForm" method="POST" action="{{ route('members.admin.edit') }}">
                                        @csrf
                                        <input type="hidden" name="id" id="editId">
                                        <div class="mb-4">
                                            <label for="editRole" class="block mb-1">الهيئة التابع لها</label>
                                            <select name="role_id" id="editRole" class="w-full p-2 border">
                                                <option value="0">هيئة معاونة</option>
                                                <option value="1">هيئة تدريس</option>
                                            </select>
                                        </div>
                                        <div class="mb-4">
                                            <label for="editName" class="block mb-1">اسم العضو</label>
                                            <input type="text" name="name" id="editName" class="border p-2 w-full" required>
                                        </div>
                                        <div class="mb-4">
                                            <label for="editNationalId" class="block mb-1">الرقم القومي</label>
                                            <input type="text" name="national_id" id="editNationalId" class="border p-2 w-full" required>
                                        </div>
                                        <div class="mb-4">
                                            <label for="editCode" class="block mb-1">الكود الجامعي</label>
                                            <input type="text" name="code" id="editCode" class="border p-2 w-full" required>
                                        </div>
                                        <div class="flex justify-end">
                                            <button type="submit" class="bg-green-500 text-white px-4 py-2 hover:bg-green-600">حفظ</button>
                                            <button type="button" onclick="closeEditModal()" class="bg-red-500 text-white px-4 py-2 hover:bg-red-600 ml-2">إلغاء</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        @endforeach
                    </tbody>
                </table>
            </div>

        </main>
    @else
        <div class="p-4 mt-8 bg-gray-100 rounded-lg shadow w-full">
            <h3 class="text-center font-bold text-lg text-pink-950 mb-4">لا يوجد أعضاء هيئة تدريس او هيئة معاونة</h3>
        </div>
    @endif

    <div id="drModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white p-6 rounded-lg w-1/3 mr-30">
            <h2 class="text-xl mb-4">إضافة عضو هيئة تدريس جديد</h2>
            <form method="POST" action="">
                @csrf
                <input type="hidden" name="role_id" value="1">
                <input type="text" name="name" id="studentName2" placeholder="اسم عضو هيئة التدريس" class="border p-2 w-full mb-2"  required>
                <input type="text" name="national_id" id="studentNID2" placeholder="الرقم القومي" inputmode="numeric" class="border p-2 w-full mb-2" required>
                <input type="text" name="code" id="studentNI2" placeholder="الكود الجامعي" inputmode="numeric" class="border p-2 w-full mb-2" required>
                <button type="submit" {{--onclick="adddr()"--}} class="bg-green-500 text-white px-4 py-2 hover:bg-green-600">حفظ</button>
                <button type="button" onclick="closedr()" class="bg-red-500 text-white px-4 py-2 hover:bg-red-600 ml-2">إلغاء</button>
            </form>
        </div>
    </div>

    <div id="assitModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center ">
        <div class="bg-white p-6 rounded-lg w-1/3 mr-30">
            <h2 class="text-xl mb-4">إضافة عضو هيئة معاونة جديد</h2>
            <form method="POST" action="">
                @csrf
                <input type="hidden" name="role_id" value="0">
                <input type="text" name="name" id="studentName" placeholder="اسم عضو الهيئة المعاونة" class="border p-2 w-full mb-2" required>
                <input type="text" name="national_id" id="studentNID" placeholder="الرقم القومي" class="border p-2 w-full mb-2" required>
                <input type="text" name="code" id="studentID" placeholder="الكود الجامعي" class="border p-2 w-full mb-2" required>
                <button type="submit" {{--onclick="addassit()"--}} class="bg-green-500 text-white px-4 py-2 hover:bg-green-600">حفظ</button>
                <button type="button" onclick="closeassit()" class="bg-red-500 text-white px-4 py-2 hover:bg-red-600 ml-2">إلغاء</button>
            </form>
        </div>
    </div>
    <script>
        function openEditModal(button) {
            var modal = document.getElementById('editModal');
            var id = button.getAttribute('data-id');
            var name = button.getAttribute('data-name');
            var nationalId = button.getAttribute('data-national_id');
            var code = button.getAttribute('data-code');
            var role = button.getAttribute('data-role');

            document.getElementById('editId').value = id;
            document.getElementById('editName').value = name;
            document.getElementById('editNationalId').value = nationalId;
            document.getElementById('editCode').value = code;
            document.getElementById('editRole').value = role;

            modal.classList.remove('hidden');
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
        }
    </script>
@endsection
