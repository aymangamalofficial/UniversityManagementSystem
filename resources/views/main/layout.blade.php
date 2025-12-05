<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <title>جامعة أسيوط الجديدة التكنولوجية | @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset ('public/css/main/home.css')}}">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.4.2/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bruno+Ace&family=Bruno+Ace+SC&family=Funnel+Display:wght@300..800&family=Sour+Gummy:ital,wght@0,100..900;1,100..900&display=swap">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
</head>
<body>
    <header>
        <nav class="bg-gray-800 text-white py-4 px-6 flex justify-between items-center shadow-lg">
            <!-- Logo and Site Name -->
            <div class="flex items-center space-x-3">
                <div class="bg-gray-600 w-10 h-10 rounded-full">
                    <a href="{{route ('home') }}">
                        <img src="{{ asset('public/img/463211000_519263080949177_8597348305848868951_n.jpg')}}" alt="Logo" class="w-full h-full rounded-full">
                    </a>
                </div>
                <a href="{{route ('home') }}" class="f1 text-lg font-bold mr-2">جامعة أسيوط الجديدة التكنولوجية</a>
            </div>

            <!-- Navigation Links -->
            <div class="f2 hidden md:flex items-center space-x-6">

                <ul class="flex space-x-6">
                    <li><a href="{{route ('home') }}" class="f1 hover:text-blue-300"> الصفحة الرئيسية </a></li>
                    <li><a href="{{route ('about') }}" class="f1 hover:text-blue-300"> عن الجامعة</a></li>

                    <li class="relative group">
                        <a href="#" class="f1 hover:text-blue-300"> الكليات </a>
                        <ul class="absolute right-0 mt-1 hidden  space-y-2 text-black bg-blue-100 bg-opacity-80 border border-gray-300 rounded-md group-hover:block hover:block">
                            <li><a href="{{route ('collage1') }}" class="block px-4 py-2 hover:bg-blue-100 hover:text-red-900">
                                كلية تكنولوجيا الصناعة و الطاقة
                            </a></li>
                            <li><a href="{{route ('collage2') }}" class="block px-4 py-2 hover:bg-blue-100 hover:text-red-900">
                                كلية تكنولوجياعلوم صحية
                            </a></li>
                        </ul>
                    </li>

                    <li><a href="#contact" class="f1 hover:text-blue-300"> تواصل معنا</a></li>
                </ul>
            </div>

            <div class="f2 flex items-center space-x-3">
                <!-- Login Button -->
                {{-- <button class="login hidden md:inline-block bg-blue-300 text-black hover:shadow-lg hover:text-white transition px-4 py-2 rounded-lg duration-200">
                    <a class="signin" href="{{ route('login') }}">تسجيل الدخول <i class="fi fi-rr-sign-in-alt"></i></a>
                </button> --}}



                <!-- Mobile Menu Button -->
                <button id="menu-toggle" class="md:hidden bg-gray-700 p-2 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </nav>
    </header>

    <section  id="hero" class="hero bg-cover bg-center min-h-screen flex flex-col justify-center items-center text-white relative text-center px-4">
        <div class="absolute inset-0 bg-blue-950 bg-opacity-50"></div>
        <div class="z-10 max-w-3xl">
            <div class="wrapper mb-6">
                <svg class="w-full">
                    <text class="NATU text-5xl sm:text-7xl" x="50%" y="50%" dy=".35em" text-anchor="middle">
                        NATU
                    </text>
                </svg>
            </div>
            <h1 class="text-3xl sm:text-5xl font-bold text-blue-300">جامعة أسيوط التكنولوجية الجديدة</h1>
            <p class="f1 text-lg sm:text-xl mt-4 text-black bg-blue-100 opacity-20 px-4 py-2 rounded-lg">
                الجامعة تابعة لوزارة التعليم العالي وتتبع مجلس التعليم التكنولوجي
            </p>
        </div>
    </section>

    <section class="about">
        <div id="About" class="p-8 mb-8">
            <!-- عنوان القسم -->
            <div class="border-r-4 border-blue-400 pr-4 mb-6">
                <h2 class="text-gray-600 text-lg font-semibold">قصتنا</h2>
            </div>

            <div class="grid md:grid-cols-2 gap-8 items-center flex flex-row-reverse ">
                <!-- النص الرئيسي -->
                <div class="genral">
                    <h1 class="text-2xl font-bold text-red-900 leading-tight text-center md:text-right">
                        مرحبًا بكم في جامعة أسيوط الجديدة التكنولوجية
                    </h1>
                    <p class="text-gray-600 mt-4 mb-6 text-center md:text-right">
                        تم إنشاء - جامعة أسيوط الجديدة التكنولوجية
                        19 سبتمبر 2022
                    </p>
                    <a href="{{route ('about') }}" class="login bg-blue-300 px-6 py-2 rounded-lg hover:shadow-lg hover:text-white transition duration-200 block text-center md:inline-block">
                        لمعرفة المزيد
                    </a>
                </div>

                <!-- البطاقات -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="text-center">
                        <img src="{{ asset('public/img/about/diploma_17091672.gif')}}" class="mx-auto w-24 h-24 mb-3">
                        <h3 class="font-bold text-gray-800 text-xl">تعليم بمواصفات عالمية</h3>
                        <p class="text-gray-600 text-sm">
                            تضم كليتين بإجمالي 6 برامج مختلفة
                        </p>
                    </div>

                    <div class="text-center">
                        <img src="{{ asset('public/img/about/reputation_18545091.gif')}}" class="mx-auto w-24 h-24 mb-3">
                        <h3 class="font-bold text-gray-800 text-xl">أحدث المرافق</h3>
                        <p class="text-gray-600 text-sm">
                            توفر الجامعة أحدث المرافق الذكية والمستدامة والمعامل المجهزة بأحدث التقنيات
                        </p>
                    </div>

                    <div class="text-center">
                        <img src="{{ asset('public/img/about/teacher_17428659.gif')}}" class="mx-auto w-24 h-24 mb-3">
                        <h3 class="font-bold text-gray-800 text-xl">
                            الأساتذة والطاقم التعليمي
                        </h3>
                        <p class="text-gray-600 text-sm">
                            تضم الجامعة أكثر من 100 دكتور وأستاذ جامعي وأكثر من 400 معيد على أعلى مستوى
                        </p>
                    </div>

                    <div class="text-center">
                        <img src="{{ asset('public/img/about/student_18124685.gif')}}" class="mx-auto w-24 h-24 mb-3">
                        <h3 class="font-bold text-gray-800 text-xl">
                            طلابنا
                        </h3>
                        <p class="text-gray-600 text-sm">
                            تضم الجامعة أكثر من 1500 طالب وطالبة في مختلف المجالات
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about bg-blue-100">
        <div id="About" class="p-8 mb-8">
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <div class="genral text-center md:text-right">
                    <h1 class="text-2xl font-bold text-red-950 leading-tight">
                        تعرف على جامعة أسيوط الجديدة التكنولوجية
                    </h1>
                    <img src="{{ asset('public/img/icons8-left-unscreen.gif')}}" class="w-16 h-16 mx-auto md:ml-0">
                </div>
                <div class="text-center">
                    <iframe src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2FAssiutTechUniversity%2Fvideos%2F1700232620776198%2F&show_text=false&width=560&t=0" width="100%" height="314" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>
                </div>
            </div>
        </div>
    </section>


    <section id="news" class="News py-12 bg-white ">
        <div class="container mx-auto px-5">
            <div class="flex flex-wrap justify-center gap-6">
                <h2 class="name2 text-center text-3xl font-bold mb-8 mt-8">آخر الأخبار و الفعاليات</h2>
                <img src="{{ asset('public/img/news-15748329-unscreen.gif')}}" class="w-20 h-20"></img>
            </div>
            <div class="flex flex-wrap justify-center gap-6">

                <!-- Service Card 1 -->
                <div class="cardser w-full sm:w-64 bg-blue-100 shadow-md p-2 space-y-4 relative rounded-lg flex flex-col items-center">
                    <div class="w-full h-40 bg-gray-200 rounded-md overflow-hidden">
                        <img src="{{ asset('public/img/news/د. جمال تاج يتابع تدريب Artificial Intelligence (AI) و CCNA v7 – Routing and Switching بالمنطقة التكنولوجية بأسيوط الجديدة..jpg')}}" class="w-full h-full object-cover">
                    </div>
                    <div class="text-center mt-4">
                        <p class="text-red-950 text-sm mt-2">
                            د. جمال تاج يتابع تدريب Artificial Intelligence (AI) و CCNA v7 – Routing and Switching بالمنطقة التكنولوجية بأسيوط الجديدة.
                        </p>
                    </div>
                    <a href="https://www.facebook.com/AssiutTechUniversity/posts/pfbid0yzKAeL8Bw3fg7dTz8o1rjF84A9YzdpoiHB9V6cL7egWzy83wJ3Cxk8LJjuZiaVCMl" class="butser  mt-4 underline">
                        قراءة المزيد
                    </a>
                </div>
                <!-- Service Card 2 -->
                <div class="cardser w-full sm:w-64 bg-blue-100 shadow-md p-2 space-y-4 relative rounded-lg flex flex-col items-center">
                    <div class="w-full h-40 bg-gray-200 rounded-md overflow-hidden">
                        <img src="{{ asset('public/img/news/اعلان هام.jpg')}}" class="w-full h-full object-cover">
                    </div>
                    <div class="text-center mt-4">
                        <p class="text-red-950 text-sm mt-2">
                            في إطار البروتوكول المُبرم بين جامعة أسيوط الجديدة التكنولوجية والمعهد القومي للاتصالات National Telecommunication Institute (NTI)                        </p>
                    </div>
                    <a href="https://www.facebook.com/AssiutTechUniversity/posts/pfbid02JhY11UZkyoGL1GyiLXK2R1VhQMp2evpvSPgEEgPQMJG9mDDikY3JbBjCJonjtWDVl" class="butser  mt-4 underline">
                        قراءة المزيد
                    </a>
                </div>
                <!-- Service Card 3 -->
                <div class="cardser w-full sm:w-64 bg-blue-100 shadow-md p-2 space-y-4 relative rounded-lg flex flex-col items-center">
                    <div class="w-full h-40 bg-gray-200 rounded-md overflow-hidden">
                        <img src="{{ asset('public/img/news/تدريب عملي لطلاب طلاب تكنولوجيا الإنتاج الدوائي بكلية الهندسة جامعة أسيوط.jpg')}}" class="w-full h-full object-cover" >
                    </div>
                    <div class="text-center mt-4">
                        <p class="text-red-950 text-sm mt-2">
                            تدريب عملي لطلاب طلاب تكنولوجيا الإنتاج الدوائي بكلية الهندسة جامعة أسيوط
                        </p>
                    </div>
                    <a href="https://www.facebook.com/AssiutTechUniversity/posts/pfbid02JhY11UZkyoGL1GyiLXK2R1VhQMp2evpvSPgEEgPQMJG9mDDikY3JbBjCJonjtWDVl" class="butser  mt-4 underline">
                        قراءة المزيد
                    </a>
                </div>
                <!-- Service Card 4 -->
                <!-- Service Card 5 -->
                <!-- Service Card 6 -->


            </div>
        </div>
    </section>

    <section id="contact" class="contact bg-blue-100 py-12 mt-5">
        <div class="container mx-auto px-6">
            <div class="flex flex-wrap justify-center gap-6">
                <h2 class="name2 text-center text-3xl font-bold mb-8 mt-8"> للتواصل معنا  </h2>
                <img src="{{ asset('public/img/message-15370775-unscreen.gif')}}" class="w-20 h-20"></img>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <div class="bg-white shadow-lg p-6 rounded-lg">
                    <h3 class="name2 text-xl font-semibold mb-4 ">أرسل لنا رسالة</h3>
                    <form action="#" method="POST" class="space-y-4">
                        <div>
                            <label for="name" class="info25 block name2 mb-1.5">الاسم</label>
                            <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-900" placeholder="Enter your name" required>
                        </div>
                        <div>
                            <label for="email" class="info25 block name2 mb-1.5">الإيميل</label>
                            <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-900" placeholder="Enter your email" required>
                        </div>
                        <div>
                            <label for="message" class="info25 block name2 mb-1.5">الرسالة / الموضوع </label>
                            <textarea id="message" name="message" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-900" placeholder="Write your message" required></textarea>
                        </div>
                        <button type="submit" class="login shadow-2xl bg-blue-300 text-black hover:text-white px-4 py-2 rounded-lg  transition">
                            Send Message
                        </button>
                    </form>
                </div>
                <div class="bg-white p-6 rounded-lg" >
                    <h3 class="name2 text-xl  mb-4">للتواصل معنا</h3>
                    <ul class="space-y-4">
                        <li class="flex items-center space-x-4">
                            <i class="fi fi-rr-envelope text-red-800 text-lg"></i>
                            <a href="https://www.facebook.com/AssiutTechUniversity?locale=ar_AR" target="_blank"><span class="text-red-950">info@NATU.com</span></a>
                        </li>
                        <li class="flex items-center space-x-4">
                            <i class="fi fi-rr-phone-call text-red-800 text-lg"></i>
                            <span class="font-semibold ">+022</span><span class=" text-red-950">883</span><span>61</span>

                        </li>
                        <li class="flex items-center space-x-4">
                            <i class="fi fi-rr-marker text-red-800 text-lg "></i>
                            <a href="https://l.facebook.com/l.php?u=https%3A%2F%2Fgoo.gl%2Fmaps%2FnhwTmGVodgRWupie7%3Ffbclid%3DIwZXh0bgNhZW0CMTAAAR0y9jCHcujGo5BdVVim3_lTBl8XhuVJMuuqF0Uf1ot8zNdwmbZ0BcC7HGo_aem_lWt67xmRIaa7Ol5TG9OahQ&h=AT1tXetlqGZ4CpStfmxhAD5tr96gmfZPL-G_ZLdgTopV8kLXUaED7NGCTj2Se5oCESh7kX34Pyl2xh5T4GMuNZ_zdDvZ4e1pof6WYoGVgeFbP8beWcv3S4J_v1lgq74qsRUcRQ" target="_blank"><span class="font-semibold">الرحاب , <span class="text-red-950">أسيوط الجديدة </span> , أسيوط </span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <footer class="login2 bg-gray-950 text-white py-10">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 px-6">
        <div>
            <h3 class="text-lg  border-b-2 border-red-900 pb-2 mb-4">تواصل معنا</h3>
            <ul class="space-y-4">
                <li class="flex items-center space-x-4 hover:text-blue-300">
                    <i class="fi fi-rr-envelope text-white text-lg"></i>
                    <a href="https://www.facebook.com/AssiutTechUniversity?locale=ar_AR" target="_blank"><span class="text-white hover:text-blue-300">info@NATU.com</span></a>
                </li>
                <li class="flex items-center space-x-4 hover:text-blue-300">
                    <i class="fi fi-rr-phone-call text-white text-lg"></i>
                    <span class="font-semibold ">+022 883 61</span>

                </li>
                <li class="flex items-center space-x-4 hover:text-blue-300">
                    <i class="fi fi-rr-marker text-white text-lg "></i>
                    <a href="https://l.facebook.com/l.php?u=https%3A%2F%2Fgoo.gl%2Fmaps%2FnhwTmGVodgRWupie7%3Ffbclid%3DIwZXh0bgNhZW0CMTAAAR0y9jCHcujGo5BdVVim3_lTBl8XhuVJMuuqF0Uf1ot8zNdwmbZ0BcC7HGo_aem_lWt67xmRIaa7Ol5TG9OahQ&h=AT1tXetlqGZ4CpStfmxhAD5tr96gmfZPL-G_ZLdgTopV8kLXUaED7NGCTj2Se5oCESh7kX34Pyl2xh5T4GMuNZ_zdDvZ4e1pof6WYoGVgeFbP8beWcv3S4J_v1lgq74qsRUcRQ" target="_blank"><span class="hover:text-blue-300">الرحاب , أسيوط الجديدة , أسيوط </a>
                </li>
            </ul>
            <div class="flex space-x-4 mt-4">
                <a href="https://www.facebook.com/@AssiutTechUniversity/?locale=ar_AR" class="text-white hover:text-blue-300 text-xl" target="_blank"><i class="fab fa-facebook"></i> فيسبوك</a>
            </div>
        </div>

          <!-- روابط سريعة -->
        <div>
            <h3 class="text-lg border-b-2 border-red-900 pb-2 mb-4">روابط سريعة</h3>
            <ul class="space-y-2 text-gray-300">
                <li><a href="#" class="hover:text-blue-300" target="_blank">سياسة الخصوصية</a></li>
                <li><a href="#" class="hover:text-blue-300" target="_blank">تواصل معنا</a></li>
            </ul>
        </div>
        <div>
            <h3 class="text-lg border-b-2 border-red-900 pb-2 mb-4">آخر الأخبار</h3>
            <ul class="space-y-4 text-gray-300">
                <li class="flex items-start space-x-3">
                    <a href="https://www.facebook.com/AssiutTechUniversity/posts/pfbid0jES9c2GSJPpcBrRFhnRPNMdaJtTG4Am8M2cDf9o1Nh9EyFY8ryiYwFsyhTuFmBfTl" class="flex items-start space-x-3 hover:text-blue-300 transition">
                    <img src="{{ asset('public/img/news/475813613_591961373679347_4533733077125577769_n.jpg')}}" alt="news" class="w-20 h-16 rounded-lg">
                    <div>
                        <p>كلية تكنولوجيا العلوم الصحية التطبيقية تنظم تدريب عملي عن "ISO 17025" بمركز البحوث الزراعية بأسيوط.</p>
                        <span class="text-sm text-gray-500">فبراير 5, 2025</span>
                    </div>
                    </a>
                </li>
                <li class="flex items-start space-x-3">
                    <a href="https://www.facebook.com/AssiutTechUniversity/posts/pfbid0yzKAeL8Bw3fg7dTz8o1rjF84A9YzdpoiHB9V6cL7egWzy83wJ3Cxk8LJjuZiaVCMl" class="flex items-start space-x-3 hover:text-blue-300 transition"  target="_blank">
                    <img src={{ asset('public/img/463211000_519263080949177_8597348305848868951_n.jpg')}} alt="news" class="w-20 h-16 rounded-lg">
                    <div>
                        <p>جامعة أسيوط الجديدة التكنولوجية تحصل على دعم لمشروعين ضمن منحة برنامج "مشروعي بدايتي" من أكاديمية البحث العلمي والتكنولوجيا</p>
                        <span class="text-sm text-gray-500">فبراير 3, 2025</span>
                    </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>

        <div class="text-center text-gray-400 mt-8 border-t border-red-700 pt-4">
          &copy; 2025 جامعة أسيوط الجديدة التكنولوجية - جميع الحقوق محفوظة
        </div>
    </footer>

    <button  class="button3" onclick="scrollToTop()" id="scrollToTopBtn" title="Go to top"><i class="fi fi-rr-angle-small-up"></i></button>
    <script src="{{ asset ('public/js/main/home.js')}}"></script>
</body>
</html>
