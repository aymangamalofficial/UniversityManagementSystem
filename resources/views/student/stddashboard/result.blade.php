@extends('student.stddashboard.layout')
@section('title', 'الدرجات')
@section('content')
<main class="p-6 mr-0 md:mr-[220px]">
        <div class="modal-content py-4">
            <h2 class="text-4xl mb-4 text-pink-950"> الدرجات  </h2>
        </div>
        @if (session('error'))
            <p class="text-red-500 text-sm text-center">{{ session('error') }}</p>
        @endif
        @if($courses->count() == 0)
            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-6 rounded">
                لا يوجد لديك أي مواد دراسية مضافة لك حتى الآن.
            </div>
        @else
            <form action="" method="POST">
                @csrf
                <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-2  items-center gap-4 mb-6">
                    <select id="subFilter" class="border p-2 rounded-lg w-full " name="course_id">
                        <option value="">اختر المادة</option>
                        @foreach($courses as $course)
                            <option value="{{ $course->course_id }}">{{ $course->course_name }}</option>
                        @endforeach
                    </select>

                    <input type="hidden" value="attendence" name="type_of_degree" />
                    <div class="border p-2 rounded-lg w-full bg-gray-100 text-gray-800 text-center">
                        الغياب
                    </div>



                    {{-- <select id="statFilter" class="border p-2 rounded-lg w-full ">
                        <option value="">اختر الدرجة لعرضها  </option>
                        <option value="الغياب ">الغياب </option>
                        <option value="assiment">assiment</option>
                    </select> --}}
                </div>
                <!-- button -->
                <div class="w-full flex justify-center">
                    <button class="btn1 mt-5 inline-flex px-4 py-2 bg-blue-200 text-black rounded-lg items-center justify-center gap-2 shadow-md transition duration-300 mb-3">
                        عرض <i data-lucide="eye" class="w-5 h-5"></i>
                    </button>
                </div>
            </form>
        @endif

        <!-- table section -->
        {{-- <div class="bg-gray-100 p-6 rounded-lg border-2 shadow mt-12 overflow-x-auto">
                <div class="flex flex-col md:flex-row justify-between items-center md:items-start">
                    <li class="text-gray-600 text-center md:text-right py-2 font-semibold ">
                        جدول الغياب
                    </li>
                </div>
            <table class="border-collapse w-full shadow-md rounded-lg overflow-hidden mt-4 bg-white">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="border border-gray-300 px-4 py-3"> الاسم</th>
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
                    @foreach($students as $student)
                    <tr class="hover:bg-gray-100 transition even:bg-gray-50">
                        <td class="border border-gray-300 px-4 py-3 font-bold">{{ $user->name }}</td>
                        <td class="border border-gray-300 px-4 py-3 font-bold">{{ $user->code }}</td>
                        <td class="editable border border-gray-300 px-4 py-3">0</td>
                        <td class="editable border border-gray-300 px-4 py-3">0</td>
                        <td class="editable border border-gray-300 px-4 py-3">0</td>
                        <td class="editable border border-gray-300 px-4 py-3">0</td>
                        <td class="editable border border-gray-300 px-4 py-3">0</td>
                        <td class="editable border border-gray-300 px-4 py-3">0</td>
                        <td class="editable border border-gray-300 px-4 py-3">0</td>
                        <td class="editable border border-gray-300 px-4 py-3">0</td>
                        <td class="border border-gray-300 px-4 py-3 bg-gray-100 font-bold total">0</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div> --}}













{{--
        <!-- table assiment -->
        <div class="bg-gray-100 p-6 rounded-lg border-2 shadow mt-12 overflow-x-auto">
            <table class="border-collapse w-full shadow-md rounded-lg overflow-hidden mt-4 bg-white">
                <div class="flex flex-col md:flex-row justify-between items-center md:items-start">
                    <li class="text-gray-600 text-center md:text-right py-2 font-semibold ">
                        جدول درجات ال Assiments
                    </li>
                </div>
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="border border-gray-300 px-4 py-3">الاسم</th>
                        <th class="border border-gray-300 px-4 py-3">الكود الجامعي</th>
                        <th class="border border-gray-300 px-4 py-3"> درجة Assiment 1</th>
                        <th class="border border-gray-300 px-4 py-3 bg-gray-300">Total</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr class="hover:bg-gray-100 transition even:bg-gray-50">
                        <td class="border border-gray-300 px-4 py-3 font-bold">أحمد محمد</td>
                        <td class="border border-gray-300 px-4 py-3 font-bold">20231001</td>
                        <td class="editable border border-gray-300 px-4 py-3">0</td>
                        <td class="border border-gray-300 px-4 py-3 bg-gray-100 font-bold total">0</td>
                    </tr>
                </tbody>
            </table>
        </div> --}}

        @if(isset($attendances))
            <div class="bg-gray-100 p-6 rounded-lg border-2 shadow mt-12 overflow-x-auto">
                <div class="flex flex-col md:flex-row justify-between items-center md:items-start">
                    <li class="text-gray-600 text-center md:text-right py-2 font-semibold ">
                        جدول الغياب للمادة المختارة
                    </li>
                </div>
                <table class="border-collapse w-full shadow-md rounded-lg overflow-hidden mt-4 bg-white">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700">
                            {{-- <th class="border border-gray-300 px-4 py-3">الأسبوع</th> --}}
                            <th class="border border-gray-300 px-4 py-3">الحالة</th>
                            <th class="border border-gray-300 px-4 py-3">تاريخ الحضور</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @forelse($attendances as $attendance)
                            <tr class="hover:bg-gray-100 transition even:bg-gray-50">
                                {{-- <td class="border border-gray-300 px-4 py-3 font-bold">
                                    {{ $attendance->qrCode->week ?? '-' }}
                                </td> --}}
                                <td class="border border-gray-300 px-4 py-3 font-bold">
                                    {{ $attendance->status == 'present' ? 'حاضر' : 'غائب' }}
                                </td>
                                <td class="border border-gray-300 px-4 py-3 font-bold">
                                    {{ $attendance->attendance_time }}
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="3">لا يوجد بيانات حضور لهذه المادة.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        @endif

</main>
    <script src="/std/std dashboard/result/result.js">

    </script>
</body>
</html>

@endsection
