@extends('student.stddashboard.layout')
@section('title', 'النتيجة')
@section('content')


<main class="p-6 mr-0 md:mr-[220px]">
        <div class="modal-content flex py-4">
            <h2 class="text-2xl text-pink-950">  نتائج الفصل الدراسي الأول  </h2>
            <button class="btn1 mr-10 inline-flex px-4 py-2 bg-blue-200 text-black rounded-lg items-center justify-center  shadow-md transition duration-300 ">
                عرض <i data-lucide="eye" class="w-5 h-5"></i>
            </button>
        </div>
            <div class="bg-gray-100 p-6 rounded-lg border-2 shadow  overflow-x-auto">
            <table class="border-collapse w-full shadow-md rounded-lg overflow-hidden mt-4 bg-white">
                <div class="flex flex-col md:flex-row justify-between items-center md:items-start">
                    <li class="text-gray-600 text-center md:text-right py-2 font-semibold ">
                        نتائج الفصل الدراسي الأول
                    </li>
                </div>
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="border border-gray-300 px-4 py-3">المادة </th>
                        <th class="border border-gray-300 px-4 py-3 bg-gray-200"> java</th>
                        <th class="border border-gray-300 px-4 py-3 bg-gray-200">C++ </th>
                        <th class="border border-gray-300 px-4 py-3 bg-gray-200">IOT </th>
                        <th class="border border-gray-300 px-4 py-3 bg-gray-200">Embded </th>
                        <th class="border border-gray-300 px-4 py-3 bg-gray-200">AI </th>
                        <th class="border border-gray-300 px-4 py-3 bg-gray-200">OS </th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr class="hover:bg-gray-100 transition even:bg-gray-50">
                        <td class="border border-gray-300 bg-gray-200 px-4 py-3 font-bold">التقدير</td>
                        <td class="border border-gray-300 px-4 py-3">ممتاز</td>
                        <td class="border border-gray-300 px-4 py-3">ممتاز</td>
                        <td class="border border-gray-300 px-4 py-3">ممتاز</td>
                        <td class="border border-gray-300 px-4 py-3">ممتاز</td>
                        <td class="border border-gray-300 px-4 py-3">ممتاز</td>
                        <td class="border border-gray-300 px-4 py-3">ممتاز</td>
                    </tr>
                </tbody>
            </table>
            </div>
            <!-- 2 -->
        <div class="modal-content flex py-4">
            <h2 class="text-2xl text-pink-950">  نتائج الفصل الدراسي الثاني  </h2>
            <button class="btn1 mr-10 inline-flex px-4 py-2 bg-blue-200 text-black rounded-lg items-center justify-center  shadow-md transition duration-300 ">
                عرض <i data-lucide="eye" class="w-5 h-5"></i>
            </button>
        </div>
            <div class="bg-gray-100 p-6 rounded-lg border-2 shadow  overflow-x-auto">
            <!-- <table class="border-collapse w-full shadow-md rounded-lg overflow-hidden mt-4 bg-white">
                <div class="flex flex-col md:flex-row justify-between items-center md:items-start">
                    <li class="text-gray-600 text-center md:text-right py-2 font-semibold ">
                        نتائج الفصل الدراسي الأول
                    </li>
                </div>
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="border border-gray-300 px-4 py-3">المادة </th>
                        <th class="border border-gray-300 px-4 py-3 bg-gray-200"> java</th>
                        <th class="border border-gray-300 px-4 py-3 bg-gray-200">C++ </th>
                        <th class="border border-gray-300 px-4 py-3 bg-gray-200">IOT </th>
                        <th class="border border-gray-300 px-4 py-3 bg-gray-200">Embded </th>
                        <th class="border border-gray-300 px-4 py-3 bg-gray-200">AI </th>
                        <th class="border border-gray-300 px-4 py-3 bg-gray-200">OS </th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr class="hover:bg-gray-100 transition even:bg-gray-50">
                        <td class="border border-gray-300 bg-gray-200 px-4 py-3 font-bold">التقدير</td>
                        <td class="border border-gray-300 px-4 py-3">ممتاز</td>
                        <td class="border border-gray-300 px-4 py-3">ممتاز</td>
                        <td class="border border-gray-300 px-4 py-3">ممتاز</td>
                        <td class="border border-gray-300 px-4 py-3">ممتاز</td>
                        <td class="border border-gray-300 px-4 py-3">ممتاز</td>
                        <td class="border border-gray-300 px-4 py-3">ممتاز</td>
                    </tr>
                    <tr class="hover:bg-gray-100 transition even:bg-gray-50">
                        <td class="border border-gray-300 bg-gray-200 px-4 py-3 font-bold">التقدير</td>
                        <td class="border border-gray-300 px-4 py-3">ممتاز</td>
                        <td class="border border-gray-300 px-4 py-3">ممتاز</td>
                        <td class="border border-gray-300 px-4 py-3">ممتاز</td>
                        <td class="border border-gray-300 px-4 py-3">ممتاز</td>
                        <td class="border border-gray-300 px-4 py-3">ممتاز</td>
                        <td class="border border-gray-300 px-4 py-3">ممتاز</td>
                    </tr>
                </tbody>
            </table> -->
            <div class="flex bg-red-300/50 p-2 items-center justify-center">
                <h2 class="text-2xl  text-red-600">لم تظهر بعد</h2>
            </div>
            </div>


</main>
    <script src="/std/std dashboard/final/final.js">

    </script>
</body>
</html>

@endsection
