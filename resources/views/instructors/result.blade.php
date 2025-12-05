
@extends('instructors.layout')

@section('title', ' النتيجة الدراسية - الهيئة المعاونة')

@section('main-content')


<main class="p-6 mr-0 md:mr-[220px]">
        <div class="modal-content py-4">
            <h2 class="text-4xl mb-4 text-pink-950">إدارة درجات الطلاب </h2>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4  items-center gap-4 mb-6">

            <select id="yearFilter" class="border p-2 rounded-lg w-full ">
                <option value="">اختر الفرقة الدراسية</option>
                <option value=" الفرقة الأولي "> الفرقة الأولي </option>
                <option value=" الفرقة الثانية "> الفرقة الثانية </option>
                <option value=" الفرقة الثالثة "> الفرقة الثالثة </option>
                <option value=" الفرقة الرابعة "> الفرقة الرابعة </option>
            </select>



            <select id="subFilter" class="border p-2 rounded-lg w-full ">
                <option value="">اختر المادة</option>
                <option value="C++ "> C++</option>
                <option value="Java">Java</option>
            </select>

            <select id="groupFilter" class="border p-2 rounded-lg w-full ">
                <option value="">  اختر السكشن  </option>
                <option value="سكشن 1"> سكشن 1  </option>
                <option value="سكشن 2"> سكشن 2  </option>
                <option value="سكشن 3"> سكشن 3  </option>
            </select>

            <select id="statFilter" class="border p-2 rounded-lg w-full ">
                <option value="">اختر الدرجة لعرضها  </option>
                <option value="الغياب ">الغياب </option>
                <option value="assiment">assiment</option>
            </select>
        </div>
        <div>
            <div class="mb-5 bg-white p-4 rounded-2xl shadow-md">
                <div>
                    <!-- نص توجيهي -->
                    <p class=" mb-4 text-center md:text-right text-gray-700 font-medium">
                        للبحث عن درجة، استخدم صندوق البحث
                    </p>
                    <!-- حقل البحث -->
                    <div class="flex justify-center md:justify-start mb-10">
                        <input type="text" id="codeSearch"
                            class="bg-white border border-gray-300  p-3 rounded-lg w-full md:w-1/3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="أدخل الكود الجامعي للبحث عن الدرجة"
                            >
                    </div>
                </div>
            </div>
        </div>
<!-- button -->
        <div class="w-full flex justify-center">
            <button class="btn1 mt-5 inline-flex px-4 py-2 bg-blue-200 text-black rounded-lg items-center justify-center gap-2 shadow-md transition duration-300 mb-3">
                عرض <i data-lucide="eye" class="w-5 h-5"></i>
            </button>
        </div>



        <!-- table section -->
        <div class="bg-gray-100 p-6 rounded-lg border-2 shadow mt-12 overflow-x-auto">
            <table class="border-collapse w-full shadow-md rounded-lg overflow-hidden mt-4 bg-white">
                <div class="flex flex-col md:flex-row justify-between items-center md:items-start">
                    <li class="text-gray-600 text-center md:text-right py-2 font-semibold ">
                        جدول الغياب
                    </li>
                    <button id="resetButton" class="bg-red-500 text-white px-2 py-1 mb-2 md:mb-0 hover:bg-red-700 transition">
                    إعادة تعيين الدرجات إلى 0
                    </button>
                </div>
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="border border-gray-300 px-4 py-3">الاسم</th>
                        <th class="border border-gray-300 px-4 py-3">الكود الجامعي</th>
                        <th class="border border-gray-300 px-4 py-3">الأسبوع الأول</th>
                        <th class="border border-gray-300 px-4 py-3">الأسبوع الثاني</th>
                        <th class="border border-gray-300 px-4 py-3">الأسبوع الثالث</th>
                        <th class="border border-gray-300 px-4 py-3">الأسبوع الرابع</th>
                        <th class="border border-gray-300 px-4 py-3">الأسبوع الخامس</th>
                        <th class="border border-gray-300 px-4 py-3">الأسبوع السادس</th>
                        <th class="border border-gray-300 px-4 py-3">الأسبوع السابع</th>
                        <th class="border border-gray-300 px-4 py-3">الأسبوع الثامن</th>
                        <th class="border border-gray-300 px-4 py-3 bg-gray-300">المجموع</th>
                    </tr>
                </thead>

                <tbody class="text-center">
                    <tr class="hover:bg-gray-100 transition even:bg-gray-50">
                        <td class="border border-gray-300 px-4 py-3 font-bold">أحمد محمد</td>
                        <td class="border border-gray-300 px-4 py-3 font-bold">20231001</td>
                        <td contenteditable="true" class="editable border border-gray-300 px-4 py-3">0</td>
                        <td contenteditable="true" class="editable border border-gray-300 px-4 py-3">0</td>
                        <td contenteditable="true" class="editable border border-gray-300 px-4 py-3">0</td>
                        <td contenteditable="true" class="editable border border-gray-300 px-4 py-3">0</td>
                        <td contenteditable="true" class="editable border border-gray-300 px-4 py-3">0</td>
                        <td contenteditable="true" class="editable border border-gray-300 px-4 py-3">0</td>
                        <td contenteditable="true" class="editable border border-gray-300 px-4 py-3">0</td>
                        <td contenteditable="true" class="editable border border-gray-300 px-4 py-3">0</td>
                        <td class="border border-gray-300 px-4 py-3 bg-gray-100 font-bold total">0</td>
                    </tr>
                    <tr class="hover:bg-gray-100 transition even:bg-gray-50">
                        <td class="border border-gray-300 px-4 py-3 font-bold">علي محمد</td>
                        <td class="border border-gray-300 px-4 py-3 font-bold">20231002</td>
                        <td contenteditable="true" class="editable border border-gray-300 px-4 py-3">0</td>
                        <td contenteditable="true" class="editable border border-gray-300 px-4 py-3">0</td>
                        <td contenteditable="true" class="editable border border-gray-300 px-4 py-3">0</td>
                        <td contenteditable="true" class="editable border border-gray-300 px-4 py-3">0</td>
                        <td contenteditable="true" class="editable border border-gray-300 px-4 py-3">0</td>
                        <td contenteditable="true" class="editable border border-gray-300 px-4 py-3">0</td>
                        <td contenteditable="true" class="editable border border-gray-300 px-4 py-3">0</td>
                        <td contenteditable="true" class="editable border border-gray-300 px-4 py-3">0</td>
                        <td class="border border-gray-300 px-4 py-3 bg-gray-100 font-bold total">0</td>
                    </tr>
                </tbody>
            </table>
            <div aria-label="Page navigation" class="mt-6 flex justify-center">
                <ul class="inline-flex items-center -space-x-px text-sm">
                <li>
                    <a href="#" class="px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">1</a>
                </li>
                <li>
                    <a href="#" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">2</a>
                </li>
                <li>
                    <a href="#" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">3</a>
                </li>
                <li>
                    <a href="#" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
                </ul>
            </div>
        </div>

        <!-- table assiment -->
        <div class="bg-gray-100 p-6 rounded-lg border-2 shadow mt-12 overflow-x-auto">
            <table class="border-collapse w-full shadow-md rounded-lg overflow-hidden mt-4 bg-white">
                <div class="flex flex-col md:flex-row justify-between items-center md:items-start">
                    <li class="text-gray-600 text-center md:text-right py-2 font-semibold ">
                        جدول درجات ال Assiments
                    </li>
                    <button onclick="openAssignmentModal()" class="bg-green-500 text-white px-2 py-1 hover:bg-green-700 mb-2 md:mb-0">
                        إضافة Assiment
                    </button>
                    <button id="resetButton2" class="bg-red-500 text-white px-2 py-1 mb-2 md:mb-0 hover:bg-red-700 transition">
                    إعادة تعيين الدرجات إلى 0
                    </button>
                </div>
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="border border-gray-300 px-4 py-3">الاسم</th>
                        <th class="border border-gray-300 px-4 py-3">الكود الجامعي</th>
                        <th class="border border-gray-300 px-4 py-3">  Assiment 1</th>
                        <th class="border border-gray-300 px-4 py-3"> درجة Assiment 1</th>
                        <th class="border border-gray-300 px-4 py-3 bg-gray-300">Total</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr class="hover:bg-gray-100 transition even:bg-gray-50">
                        <td class="border border-gray-300 px-4 py-3 font-bold">أحمد محمد</td>
                        <td class="border border-gray-300 px-4 py-3 font-bold">20231001</td>
                        <td class=" border border-gray-300 px-4 py-3"><a class="text-blue-600 underline" href="/assit profilo/dashboard/assiment/user (1).png" target="_blank" >file.pdf</a></td>
                        <td contenteditable="true" class="editable border border-gray-300 px-4 py-3">0</td>
                        <td class="border border-gray-300 px-4 py-3 bg-gray-100 font-bold total">0</td>
                    </tr>
                    <tr class="hover:bg-gray-100 transition even:bg-gray-50">
                        <td class="border border-gray-300 px-4 py-3 font-bold">علي محمد</td>
                        <td class="border border-gray-300 px-4 py-3 font-bold">20231002</td>
                        <td class=" border border-gray-300 px-4 py-3"><a class="text-blue-600 underline" href="/assit profilo/dashboard/assiment/user (1).png" target="_blank" >file.pdf</a></td>
                        <td contenteditable="true" class="editable border border-gray-300 px-4 py-3">0</td>
                        <td class="border border-gray-300 px-4 py-3 bg-gray-100 font-bold total">0</td>
                    </tr>
                </tbody>
            </table>
            <div aria-label="Page navigation" class="mt-6 flex justify-center">
                <ul class="inline-flex items-center -space-x-px text-sm">
                <li>
                    <a href="#" class="px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">1</a>
                </li>
                <li>
                    <a href="#" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">2</a>
                </li>
                <li>
                    <a href="#" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">3</a>
                </li>
                <li>
                    <a href="#" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
                </ul>
            </div>
        </div>

</main>













<!-- assignmentModal -->
<div id="assignmentModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 px-4">
    <div class="bg-white top-32 rounded-xl shadow-lg w-full max-w-full sm:max-w-md mx-auto p-4 sm:p-6 relative overflow-y-auto max-h-[90vh] text-sm sm:text-base">
        <button onclick="closeAssignmentModal()" class="absolute top-3 right-4 text-gray-500 hover:text-black text-xl sm:text-2xl font-bold">&times;</button>

        <h2 class="text-xl sm:text-2xl font-semibold text-center mb-1">رفع الأسايمنت</h2>
        <p class="text-gray-500 text-center mb-6 text-xs sm:text-sm">يرجى إدخال البيانات التالية ورفع الملف</p>

        <form onsubmit="return false" class="w-full grid grid-cols-2 lg:grid-cols-1 gap-4">
            <div>
                <label for="assignmentNumber" class="block text-xs sm:text-sm font-bold text-gray-700">رقم الأسايمنت</label>
                <input type="number" id="assignmentNumber" class="mt-1 block w-full rounded-md border border-gray-300 p-2 text-xs sm:text-sm shadow-sm" placeholder="مثال: 1">
            </div>

            <div>
                <label for="assignmentDeadline" class="block text-xs sm:text-sm font-bold text-gray-700">تحديد الديدلاين</label>
                <input type="date" id="assignmentDeadline" class="mt-1 block w-full rounded-md border border-gray-300 p-2 text-xs sm:text-sm shadow-sm" />
            </div>

            <div>
                <label for="assignmentTime" class="block text-xs sm:text-sm font-bold text-gray-700">تحديد الساعة</label>
                <input type="time" id="assignmentTime" class="mt-1 block w-full rounded-md border border-gray-300 p-2 text-xs sm:text-sm shadow-sm" />
            </div>

            <div class="col-span-2 lg:col-span-1">
                <label for="assignmentFile" class="block text-xs sm:text-sm font-bold text-gray-700">رفع ملف الأسايمنت (PDF)</label>
                <input type="file" id="assignmentFile" accept="application/pdf"
                    class="mt-1 block w-full text-xs sm:text-sm text-gray-600 file:mr-2 sm:file:mr-4 file:py-1.5 sm:file:py-2 file:px-3 sm:file:px-4 file:rounded file:border-0 file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700" />
                <p id="assignmentError" class="text-red-600 text-xs sm:text-sm hidden mt-2"></p>
            </div>

            <div class="col-span-2 lg:col-span-1">
                <p id="assignmentSuccess" class="text-green-600 text-xs sm:text-sm hidden mt-2">تم رفع الأسايمنت بنجاح!</p>
            </div>

            <div class="flex justify-end gap-2 col-span-2 lg:col-span-1">
                <button onclick="submitAssignment()" class="bg-green-600 hover:bg-green-800 text-white px-3 py-1.5 sm:px-4 sm:py-2 rounded text-xs sm:text-sm">رفع الأسايمنت</button>
                <button onclick="closeAssignmentModal()" class="bg-red-500 hover:bg-red-800 text-white px-3 py-1.5 sm:px-4 sm:py-2 rounded text-xs sm:text-sm">إلغاء</button>
            </div>

            <div id="assignmentProgressBar" class="w-full h-2 bg-gray-200 rounded overflow-hidden hidden col-span-2 lg:col-span-1">
                <div id="assignmentProgress" class="h-full bg-blue-500 transition-all duration-300 ease-out" style="width: 0%;"></div>
            </div>
        </form>
    </div>
</div>

    <button  class="bg-blue-400 opacity-70 rounded-2xl hover:opacity-100 hover:bg-pink-950 hover:text-blue-200 " onclick="scrollToTop()" id="scrollToTopBtn" title="Go to top"><i class="fa-regular fa-circle-up"></i></i></button>
    <script src="/assit profilo/dashboard/result/result.js">

    </script>
</body>
</html>

@endsection
