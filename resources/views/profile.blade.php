
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>جامعة أسيوط الجديدة صفحة الهيئة المعاونة - المعيدين</title>
    <link rel="stylesheet" href="assit.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="icon" href="/favicon.ico">
    <style>
        /* CSS HEX
--carolina-blue: #67A9D8ff;
--almond: #E6D5C2ff;
--raw-umber: #905D39ff;
--feldgrau: #414C41ff;
--eerie-black: #1F2420ff;
--dun: #C9BDB2ff;
--eerie-black: #1F2420ff;
--rosy-brown: #C59D98ff;
--almond: #E6D5C2ff;
--beaver: #A08970ff;
--tyrian-purple: #580D2Eff;
--van-dyke: #4C3F41ff;
--azure-web: #D0E4E6ff;
--seasalt: #F8F8F7ff;
--cadet-gray: #97B0B3ff;
*/

@import "tailwindcss";
@import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
.btn1 {
  padding: 0.8em 1.8em;
  /* border: 2px solid #580D2Eff; */
  position: relative;
  overflow: hidden;
  background-color: transparent;
  text-align: center;
  text-transform: uppercase;
  font-size: 20px;
  transition: .3s;
  z-index: 1;
  font-family: inherit;
  color: #580D2Eff;
}
  .btn1::before {
  content: '';
  width: 0;
  height: 300%;
  position: absolute;
  top: 50%;
  left: 50%;
  color: rgb(255, 255, 255);
  transform: translate(-50%, -50%) rotate(180deg);
  background: #580D2Eff;
  transition: .5s ease;
  display: block;
  z-index: -1;
  }

  .btn1:hover::before {
      width: 105%;
  }

  .btn1:hover {
      color: #ffffff;
  }
.NATU{
  font-family: "Bruno Ace SC", serif;
}
.login:hover{
  background-color: #580D2Eff;
}
.name{
  color: #E6D5C2ff;
}
.name2{
  color: #580D2Eff;
}
.genral.login:hover{
  background-color: #580D2Eff;
}
html {
    scroll-behavior: smooth;
    direction: rtl;
    unicode-bidi: embed;
    font-family: "Tajawal", serif;
}
body , .f1, .about , .login , .login2{
  font-family: "Tajawal", serif;
    font-weight:600;
    font-style: normal;
  }
  .hero {
    background-image: url('/img/elgama.jpg');
    background-size: cover;
    background-position: center;
    /* position: relative;  */
    overflow: hidden;


  }

  .hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.5); /* طبقة غامقة */
    z-index: 1; /* تجعلها فوق الصورة */
  }


nav{
  position: fixed;
  width: 100%;
  z-index: 999;
}
    nav ul li a {
        position: relative;
        text-decoration: none;
        color: inherit;
        transition: color 0.3s ease;
    }



    nav ul li a::after {
        content: '';
        position: absolute;
        bottom: 2px;
        left: 0;
        width: 0;
        height: 2px;
        background-color: #D0E4E6ff;
        transition: width 0.3s ease ;
    }

    nav ul li a:hover::after {
        width: 100%;
    }

.about{
    background-color: white;
    width: 100%;
    height: max-content;
}

@import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap');

svg {
    font-family: "Tajawal", serif;
    font-weight: 700;
    font-style: normal;
	width: 100%; height: 100%;
}
svg text {
	animation: stroke 3s infinite alternate;
	stroke-width: 2;
	stroke: #223D66;
	font-size: 80px;
}
@keyframes stroke {
	0%   {
		fill: rgba(41,78,115,0); stroke: rgb(208, 228, 230);
		stroke-dashoffset: 25%; stroke-dasharray: 0 50%; stroke-width: 2;
	}
	70%  {fill: rgba(41,78,115,0); stroke: rgb(208, 228, 230); }
	80%  {fill: rgba(41,78,115,0); stroke: rgb(208, 228, 230); stroke-width: 3; }
	100% {
		fill: rgb(208, 228, 230); stroke: rgba(255, 255, 255, 0);
		stroke-dashoffset: -25%; stroke-dasharray: 50% 0; stroke-width: 0;
    text-shadow: rgb(208, 228, 230);
	}
}

.about-section {
    max-width: 1000px;
    margin: 40px auto;
    display: flex;
    flex-direction: row;
    align-items: center;
    padding: 20px;
    gap: 20px;
    width: 100%;
}
.bg-dark {
    background-color: rgba(24, 45, 66, 0.7);

    padding: 5px;
    display: inline-block;
}
.text-about {
    flex: 2;
    font-size: 30px;
    text-align: left;
    max-width: 600px;
    width: 100px;
    /* font-family: "Bruno Ace SC", serif; */
}
.photo-about {
    flex: 1; /* السماح للصورة بأخذ نسبة ثابتة من العرض */
    display: flex;
    justify-content: center;
    align-items: center;
}

.profile-img {
    width: 100%; /* جعل الصورة تملأ المساحة المخصصة */
    max-width: 300px;
    height: auto; /* الحفاظ على نسبة الأبعاد */
}

#scrollToTopBtn {
    display: none; /* يبدأ الزر مخفيًا */
    position: fixed;
    bottom: 20px;
    right: 30px;
    z-index: 99;
    font-size: 18px;
    color: rgb(0, 0, 0);
    border: none;
    outline: none;
    cursor: pointer;
    padding: 15px;
    color: #a6e6ff;
    border-radius: 50%;
    background-color:#001346;
}

#scrollToTopBtn:hover {
    border-radius: 50%;
    background-color:#011a5ea8;
    color: #a6e6ff;
}
.cardser {
    /* background-color: #ffffff; */
    /* padding: 20px; */
    border-radius: 12px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .cardser:hover {
    transform: translateY(-5px);
    box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.3);
  }

  .butser {
    background-color: #580D2Eff; /* لون الزر الأساسي */
    color: #ffffff; /* لون النص */
    padding: 10px 20px;
    border-radius: 25px;
    font-weight: bold;
    transition: background-color 0.3s ease, transform 0.3s ease;
  }

  .butser:hover {
    background-color: #ffffffcc;
    color: #001346;
    /* transform: scale(1.1);*/
    box-shadow: 0px 10px 15px rgba(0, 15, 153, 0.425);
  }

  .cardser img {
    object-fit: cover;
    border-radius: 5px;

  }


*::-webkit-scrollbar {
    height: 9px;
    width: 9px;
  }
  *::-webkit-scrollbar-track {
    border-radius: 1px;
    background-color: #EFEFEF;
  }

  *::-webkit-scrollbar-track:hover {
    background-color: #C2C2C2;
  }

  *::-webkit-scrollbar-track:active {
    background-color: #C2C2C2;
  }

  *::-webkit-scrollbar-thumb {
    border-radius: 4px;
    background-color: #1A0075;
  }

  *::-webkit-scrollbar-thumb:hover {
    background-color: #0002A3;
  }

  *::-webkit-scrollbar-thumb:active {
    background-color: #0002A3;
  }
  aside{
    height: 100%;
    width: 220px;
    position: fixed;
    top: 0;
    background-color: #D0E4E6ff;
    overflow-x: hidden;
}
main{
    margin-right: 220px;
}
.sidebar ul li a {
    position: relative;

    transition: color 0.3s ease;
}
.sidebar ul li a::after {
        content: '';
        position: absolute;
        bottom: 2px;
        left: 0;
        width: 0;
        height: 2px;
        background-color: #D0E4E6ff;
        transition: width 0.3s ease ;
        box-shadow: 0px 20px 20px rgba(0, 0, 0, 0.3);
    }

.sidebar ul li a:hover::after {
        width: 100%;
    }

        #settingsModal, #passwordModal {
            transition: opacity 0.3s ease;
        }
        .loader {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #3498db;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        #progress {
    transition: width 0.3s ease;
}
    </style>
</head>
<body class="bg-white pt-28 mr-4 pb-20">
    <header>
        <nav class="bg-gray-800 text-white py-4 px-6 flex justify-between items-center shadow-lg fixed top-0 left-0 w-full">
            <button id="toggleSidebar" class="md:hidden bg-gray-700 p-2 rounded-lg ml-2">
                <i id="icon-open" class="h-6 w-6 block transition-transform duration-100" data-lucide="menu"></i>
            </button>

            <div class="flex items-center space-x-3">
                <div class="bg-gray-600 w-10 h-10 rounded-full overflow-hidden">
                    <a href="#">
                        <img src="/img/463211000_519263080949177_8597348305848868951_n.jpg" alt="Logo" class="w-full h-full object-cover">
                    </a>
                </div>
                <a href="#" class="text-lg font-bold mr-2">جامعة أسيوط الجديدة التكنولوجية</a>
            </div>

            <div class="hidden md:flex items-center space-x-6" id="nav-links">
                <ul class="flex space-x-6">
                    <li><a href="/assit profilo/assitprof/assit profilo.html" class="hover:text-blue-300">الملف الشخصي</a></li>
                    <li><a href="/assit profilo/dashboard/matirel/dash.html" class="hover:text-blue-300"> إدارة المواد </a></li>
                </ul>
            </div>

            <div class="relative mt-2 grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-2 gap-3">
                <div class="relative">
                    <button id="not-btn" class="focus:outline-none">
                        <i data-lucide="bell-ring" class="w-7 h-7 text-white"></i>
                    </button>
                    <span class="absolute top-1 right-2 translate-x-1/2 -translate-y-1/2 bg-red-600 text-white text-xs font-bold px-2 py-0.5 rounded-full">+2</span>
                    <div id="dropdown2-menu" class="hidden absolute left-0 mt-3 w-48 bg-white text-black shadow-lg rounded py-2 z-50">
                        <div class="alert-item hover:bg-sky-300 p-1 grid grid-cols-12 gap-0.5 items-center transition-opacity duration-300">
                            <p class="col-span-11">تم تعيينك لمادة C++</p>
                            <button onclick="fadeRemove(this)" class="text-red-500 col-span-1 hover:text-red-900 font-bold text-lg leading-none ml-4">&times;</button>
                        </div>
                        <div class="alert-item hover:bg-sky-300 p-1 grid grid-cols-12 gap-0.5 items-center transition-opacity duration-300">
                            <p class="col-span-11">تم تعيينك لمادة JAVA</p>
                            <button onclick="fadeRemove(this)" class="text-red-500 col-span-1 hover:text-red-900 font-bold text-lg leading-none ml-4">&times;</button>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <button id="avatar-btn" class="focus:outline-none">
                        <i data-lucide="user" class="w-7 h-7 text-white"></i>
                    </button>
                    <div id="dropdown-menu" class="hidden absolute left-0 mt-3 w-48 bg-white text-black shadow-lg rounded-lg py-2 z-50">
                        <a href="#" onclick="openModal()" class="block px-4 py-2 hover:bg-gray-200">الإعدادت</a>
                        <a href="/assit profilo/assitprof/assit profilo.html" class="block px-4 py-2 hover:bg-gray-200">الملف الشخصي</a>
                        <a href="/unversity/Home/home.html" class="block px-4 py-2 hover:bg-red-500 text-red-700 hover:text-white">تسجيل الخروج</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <aside id="sidebar" class="fixed md:hidden top-10 right-0 h-screen bg-blue-100/75 transform translate-x-full transition-transform duration-300 z-50 md:translate-x-0">
        <div class="sidebar mt-16">
            <ul>
                <li class="mb-4"><a href="/assit profilo/dashboard/matirel/dash.html" class="block px-3 py-1 text-black hover:bg-pink-950 hover:text-blue-200"> المواد </a></li>
                <li class="mb-4"><a href="/assit profilo/dashboard/result/result.html" class="block px-3 py-1 text-black hover:bg-pink-950 hover:text-blue-200"> الدرجات </a></li>
                <li class="mb-4"><a href="/assit profilo/dashboard/assiment/aasiment.html" class="block px-2 py-1 text-black hover:bg-pink-950 hover:text-blue-200"> الأسيمنتات </a></li>
                <li class="mb-4"><a href="/assit profilo/dashboard/absence/absence.html" class="block px-3 py-1 text-black hover:bg-pink-950 hover:text-blue-200"> تسجيل الغياب </a></li>
                <li class="mb-4"><a href="/assit profilo/assitprof/assit profilo.html" class="block px-2 py-1 text-black hover:bg-pink-950 hover:text-blue-200"> الملف الشخصي </a></li>
            </ul>
        </div>
    </aside>

    <div class="grid md:grid-cols-2 gap-8 items-center flex-row-reverse">
        <div class="genral">
            <h1 class="text-2xl font-bold text-pink-950 leading-tight text-center md:text-right">
                {{-- مرحباً مهندس <span class="text-blue-900">{{ $name }}</span> في جامعة أسيوط الجديدة التكنولوجية --}}
            </h1>
            <div class="bg-gray-50 shadow-md m-10 rounded-2xl p-5 border border-gray-300">
                <div class="relative flex items-center space-x-3 mb-4 text-base sm:text-lg md:text-xl">
                    <div class="bg-blue-500 text-white p-3 rounded-full">
                        <img src="user (1).png" alt="" class="w-5 h-5">
                    </div>
                    <h4 class="text-red-900 text-2xl">بشمهندس/ة :</h4>
                    {{-- <h4 class="text-gray-700 text-2xl"> {{ $name }}</h4> --}}
                    <a href="#" onclick="openModal()" class="absolute left-4 top-4 z-50">
                        <i data-lucide="settings" class="w-5 h-5 text-blue-500"></i>
                    </a>
                </div>
                <ul class="space-y-3">
                    <li class="flex items-center space-x-2"><i data-lucide="id-card" class="w-5 h-5 text-blue-500"></i><span class="text-red-900 font-medium">الرقم القومي :</span><span class="text-gray-700">12345678901234</span></li>
                    <li class="flex items-center space-x-2"><i data-lucide="key" class="w-5 h-5 text-blue-500"></i><span class="text-red-900 font-medium">الكود الجامعي :</span><span class="text-gray-700">778954</span></li>
                    <li class="flex items-center space-x-2"><i data-lucide="phone" class="w-5 h-5 text-blue-500"></i><span class="text-red-900 font-medium">رقم الهاتف :</span><span class="text-gray-700">01036987452</span></li>
                    <li class="flex items-center space-x-2"><i data-lucide="file-user" class="w-5 h-5 text-blue-500"></i><span class="text-red-900 font-medium">التخصص :</span><span class="text-gray-700">علوم الحاسب</span></li>
                </ul>
            </div>
        </div>
        <div class="flex justify-center">
            <img src="{{ asset('public/administrative-assistant.gif')}}" alt="Student Image" class="w-80 h-80">
        </div>
    </div>
<!-- settingsModal -->
<div id="settingsModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 px-4">
    <div class="bg-white top-10 grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-2 gap-3 rounded-xl shadow-lg w-full max-w-md mx-auto p-6 relative overflow-y-auto max-h-[90vh]">
        <button onclick="closeModal()" class="absolute top-3 right-4 text-gray-500 hover:text-black text-2xl font-bold">&times;</button>
        <h2 class="text-2xl font-semibold text-center mb-1">إعدادات الحساب</h2>
        <p class="text-gray-500 text-center mb-6">تعديل البيانات الشخصية</p>
        <div class="flex flex-col items-center mb-6">
            <label for="profileImageInput" class="cursor-pointer">
                <img id="previewImage" src="user (1).png" alt="الصورة الشخصية" class="w-20 h-20 rounded-full border shadow-md object-cover">
            </label>
            <input type="file" id="profileImageInput" class="hidden" accept="image/*" onchange="previewSelectedImage(event)">
            <p class="text-sm text-gray-500 mt-2">اضغط على الصورة لتغييرها</p>
            <button onclick="updatePhone()" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 mt-2">تحديث البيانات</button>
        </div>
        <form onsubmit="return false">
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">الاسم الكامل</label>
                {{-- <input type="text" value="{{ $name }} " disabled class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" /> --}}
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">الرقم الجامعي</label>
                <input type="text" value="778954" disabled class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" />
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">رقم الهاتف</label>
                <input id="phoneInput" type="text" value="01036987452" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" />
                <p id="phoneError" class="text-red-600 text-sm mt-1 hidden"></p>
            </div>
        </form>
            <div id="progressBar" class="w-full h-2 bg-gray-200 rounded overflow-hidden hidden">
                <div id="progress" class="h-full bg-blue-500 transition-all duration-300 ease-out" style="width: 0%;">
                </div>
            </div>
    </div>
</div>






<script src="/assit profilo/assitprof/assit.js">

</script>

</body>
</html>
