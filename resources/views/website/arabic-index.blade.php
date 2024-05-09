<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <title>مسار حج</title>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="{{ asset('frontend/image/sliders/favoicon.png') }}" rel="shortcut icon">
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/style2.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/bootstrap-rtl.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/icofont.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/hover-min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/slick-theme.css') }}" rel="stylesheet">


</head>

<body data-spy="scroll" data-target=".navbar" data-offset="0">
    <header id="home">
        <div class="overlay">
            <nav class="navbar navbar-default" data-offset-top="70" data-spy="affix">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button aria-expanded="false" class="navbar-toggle collapsed"
                            data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" type="button"><span
                                class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>
                        {{-- <a
                            class="navbar-brand" href="{{ url('arabic') }}"><img
                                src="{{ asset('frontend/image/websitelogo.png') }}"></a> --}}
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{ asset('frontend/image/masarhajj.jpg') }}" alt="MasarHajj Logo" width="150"
                                height="95">
                        </a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a data-value="home" href="#home">الرئيسية</a>
                            </li>
                            <li>
                                <a data-value="featured" href="#featured">مميزات</a>
                            </li>
                            <li>
                                <a data-value="download" href="#download">تحميل التطبيق</a>
                            </li>
                            <li>
                                <a data-value="screenshot" href="#screenshot">صور التطبيق</a>
                            </li>
                            <li>
                                <a data-value="register" href="#register">طلب التسجيل</a>
                            </li>
                            <li>
                                <a data-value="contact" href="#contact">اتصل بنا</a>
                            </li>
                            {{-- new code  --}}
                            <li>
                                <a data-value="app" href="#app">خطة التسعير</a>
                            </li>
                             <li>
                                <a href="{{ url('https://masarhajj.com/login') }}">تسجيل الدخول</a>
                            </li>
                            <li>
                                <a href="{{ url('/') }}">English</a>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
            <div class="info">
                <div class="container">
                    <div class="row">
                        <div class="txt col-md-6 wow fadeInRight">
                            <h2>المعلومات الحالية عن مسار حج</h2>

                            {{-- <p>يتيح تطبيق مسار حج فرص تواصلك مع سائقى الباص و المشرف والمعتمر او الحاج لمعرفة مكانماى
                                وقت واى مكان .</p> --}}
                            <p style="font-size: 18px;">ما هو نظام المسار للحج والعمرة؟ مسار الحج هو تطبيق للهاتف
                                المحمول يدير شركة الحج ويربط
                                الحاج إذا لزم الأمر بالموقع المباشر ونظام النقل، مما يسمح لهم بتحديد موقعهم في أي وقت
                                خلال طريقهم. يساعد نظام مسار شركات الحج والعمرة على تتبع وتتبع حركة الحافلات المخصصة
                                للحجاج والحجاج منذ لحظة مغادرة الحافلات حتى وصولها إلى وجهتها بسلام، وكذلك الوصول إلى أي
                                حاج أو حاج في حالة ضياعه، وهو كما يسمح للحاج أو المعتمر بالوصول إلى مكان الحافلة أو
                                المخيم أو الفندق أيضا هناك العديد من الميزات للمساعدة.</p>
                            <a class="btn btn-primary" href="#download">حمل التطبيق</a>
                        </div>
                        <div class="devicess col-md-6 wow fadeInLeft"><img class="device1"
                                src="{{ asset('frontend/image/sliders/device5.png') }}"> <img class="device2"
                                src="{{ asset('frontend/image/sliders/device4.png') }}"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section id="featured">
        <div class="features">
            <div class="container">
                <div class="row text-center">
                    <h2>مميزات</h2>
                    <div class="feature col-md-3 col-sm-6 wow fadeInRight">
                        <i aria-hidden="true" class="fa fa-map-marker hvr-grow"></i>
                        <h4>الموقع</h4>
                        <p style="font-size: 18px; text-align: justify;">معرفة الموقع الفعلى لحافلات والاشخاص
                            يوفر تحديد الموقع الجغرافي محتوى تدريبيًا مخصصًا عبر الإنترنت لجمهورك، بغض النظر عن مكان
                            وجودهم في العالم..</p>
                    </div>

                    <div class="feature col-md-3 col-sm-6 wow fadeInRight">
                        <i aria-hidden="true" class="fa fa-mobile hvr-grow"></i>
                        <h4>تنبيه</h4>
                        <p style="font-size: 18px; text-align: justify;">

                            يجعل ادارة شركة الحج على اطلاع ويرسل اليهم تنبيهات عن التأخير مما يساعد ادارة الشركة على
                            التحكم فى المواقف وسهولة الوصول.يمكن استخدام مكون التنبيه لتوفير معلومات مهمة وربما حساسة
                            للوقت.
                        </p>
                    </div>

                    <div class="feature col-md-3 col-sm-6 wow fadeInRight">
                        <i aria-hidden="true" class="fa fa-comments hvr-grow"></i>
                        <h4>رسائل</h4>
                        <p style="font-size: 18px; text-align: justify;">مع مسار حج ، يمكن لادارة الشركة ارسال رسائل و تنبيهات مباشرة
                            للمعتمرين والحجاج لديهم .
                            الرسالة هي وحدة اتصال منفصلة يقصدها المصدر للاستهلاك من قبل بعض المستلمين أو مجموعة من
                            المستلمين.

                        </p>
                    </div>

                    <div class="feature col-md-3 col-sm-6 wow fadeInRight">
                        <i aria-hidden="true" class="fa fa-refresh hvr-grow"></i>
                        <h4>تغيير الطريق/الغياب</h4>
                        <p style="font-size: 18px; text-align: justify;">مع مسارحج ، يمكن للمعتمرين والحجاج لدى الشركة طلب تأخير الحافلة او
                            تغيير مسارها والتواصل مع
                            الشركة في اي وقت يريد.
                            تُستخدم هذه الرموز لجمع بيانات حول كيفية تفاعل المستخدمين مع صفحة الويب الخاصة بك ويتم
                            إلحاقها عادةً بعنوان URL.</p>
                    </div>

                </div>
            </div>
        </div>

        <div class="how-work">
            <div class="container">
                <div class="row">
                    {{-- <div class="function col-md-6 wow fadeInDown"><img src="{{asset('frontend/image/sliders/app2.png')}}"> --}}
                    <div class="function col-md-6 wow fadeInDown">
                        {{-- <img src="{{ asset('assets/images/arbi.png') }}"> --}}
                        <h2>المعلومات الحالية
                            عن مسار حج</h2>
                        <p style="font-size: 18px;">يتيح مسار حج إمكانية إدارته والتواصل مع جميع حجاج الحملة. ويوفر
                            سهولة الوصول إلى
                            المكان المطلوب الوصول اليه</p>
                        <h3>لجعل الدعاء</h3>
                        <p style="font-size: 18px;">إن الدعاء هو جانب حاسم من العبادة الإسلامية، وتوفير وسيلة مباشرة
                            للتواصل مع الله.</p>
                        <h3>لرؤية الزيارات</h3>
                        <p style="font-size: 18px;">تعتبر مشاهدة مناسك ومعالم الحج المقدسة، والمعروفة باسم "الزيارات"،
                            تجربة عميقة للحجاج.</p>
                    </div>

                    <div class="work col-md-6">
                        <h2>كيفية العمل</h2>
                        <p style="font-size: 18px; text-align: justify;">اتصال كامل وفعلى بين المشرف والحجاج او المعتمرين والحافلة لمعرفة
                            مكانها الحالى .
                            .يوفر تحديد الموقع الجغرافي محتوى تدريبيًا مخصصًا عبر الإنترنت لجمهورك، بغض النظر
                            أين هم في العالم.
                        </p>

                        <div class="col-md-6 col-sm-6">
                            <i aria-hidden="true" class="fa fa-globe"></i>
                            <p style="font-size: 18px;">موقع مخصص لتحديد حافلات المعتمرين مع مميزات متعددة.
                                يوفر تحديد الموقع الجغرافي محتوى تدريبيًا مخصصًا عبر الإنترنت لجمهورك، بغض النظر
                                أين هم في العالم.
                            </p>
                        </div>

                        <div class="col-md-6 col-sm-6">
                            <i aria-hidden="true" class="fa fa-television"></i>
                            <p style="font-size: 18px;">تقديم حل ادارى متكامل بقدرات مختلفة وسهولة فى التغيير .
                                الهدف الأساسي لبرنامج المكتب الخلفي الخاص بك هو تحسين العمليات وأتمتتها عبر كل من هذه
                                الوظائف.

                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="download">
        <div class="container">
            <div class="row text-center">
                <h2>تحميل التطبيق</h2>
                <p style="font-size: 16px;"> من اجل عرض توضيحى للتطبيق . <a href="#">من هنا</a></p>
                <a class="btn btn-primary wow fadeInRight" href="#"><i aria-hidden="true"
                        class="fa fa-apple"></i> App Store</a> <a class="btn btn-primary wow fadeInLeft"
                    href="#"><i aria-hidden="true" class="fa fa-android"></i> Play Store</a><br>
                <img class=" wow fadeInDown" src="{{ asset('frontend/image/Photo02.png') }}">
            </div>
        </div>
    </section>
    <section id="screenshot">
        <div class="container">
            <div class="row text-center">
                <h2>صور التطبيق</h2>
                <p style="font-size: 18px;">. هنا بعض المقتطفات عن تطبيق مسار ، الحج هو الركن الخامس من أركان الإسلام
                    الخمسة. وهذا الالتزام يعتمد
                    على الوضع المالي والجسدي للمسلم. إذا كنت مستقرًا ماليًا، فيجب عليك أداء الحج والعمرة في أسرع وقت
                    ممكن. ومن اجل عرض توضيحي للتطبيق <a href="#contact">كن على تواصل معانا
                    </a></p>
                <p style="font-size: 18px;">هنا يمكنك العثور على بعض لقطات الشاشة لتطبيق مسار الحج. من فضلك اطلب عرضًا
                    توضيحيًا يعمل بكامل طاقته،
                    بما في ذلك نظام إدارة الويب الخاص بنا، باستخدام نموذج الاتصال الخاص بنا.</p>
            </div>
            {{-- <div class="gallary">
                <div><img src="{{ asset('frontend/image/sliders/p5.png') }}"></div>
                <div><img src="{{ asset('frontend/image/sliders/p1.png') }}"></div>
                <div><img src="{{ asset('frontend/image/sliders/p2.png') }}"></div>
                <div><img src="{{ asset('frontend/image/sliders/p3.png') }}"></div>
                <div><img src="{{ asset('frontend/image/sliders/p4.png') }}"></div>
                <!-- <div><img src="image/p8.png"></div> -->
                <!-- <div><img src="image/p5.png"></div> -->
                <!-- <div><img src="image/sliders/p1.png"></div> -->
            </div> --}}
            <div class="gallary">
                <div><img src="{{ asset('frontend/image/sliders/p55.png') }}"></div>
                <div><img src="{{ asset('frontend/image/sliders/p11.png') }}"></div>
                <div><img src="{{ asset('frontend/image/sliders/p22.png') }}"></div>
                <div><img src="{{ asset('frontend/image/sliders/p33.png') }}"></div>
                <div><img src="{{ asset('frontend/image/sliders/p44.png') }}"></div>
                <!-- <div><img src="image/p8.png"></div> -->
                <!-- <div><img src="image/p5.png"></div> -->
                <!-- <div><img src="image/sliders/p1.png"></div> -->
            </div>
            <!-- <div class="frame"><img src="{{ asset('frontend/image/iphone-mockup-one.png') }}"></div> -->
        </div>

        {{-- new app code  --}}
 <section id="app"
            style="max-width: 1100px; margin: 0 auto; display:flex; flex-wrap: wrap; justify-content: center; gap:15px;">
            {{-- <div class="box" style="max-width: 350px; margin: 0 auto;"> --}}
            <div class="box" style="max-width: 250px; margin: 0 auto;  height: auto; ">

                <div
                    style="background-color: #03A99D; color: #fff; padding-top:10px; padding-right: 15px; padding-left:15px; max-width: 300px; clip-path: polygon(0 0, 100% 0, 100% 89%, 0% 100%); padding-bottom:20px;">
                    <h4 style="text-align: center; color:#FFB804;">االقتصادي</h4>
                    <h5 style="text-align: center; font-weight:25px;">ريال سعودي&nbsp;<span
                            style="font-size: 30px; font-weight:bold; color:#FFB804;">44</span>/لكل/شهر</h5>
                    <p style="color: #fff; text-align:center; font-size:11px;">يشمل االقتصاديإنتاج وتبادل السلع
                        والخدمات داخل المجتمع
                    </p>
                </div>

                <p style="text-align: center; font-size:12px; margin-top:10px; padding:10px;">ممتاز لالستخدام المحدود
                    ال ترغب بإنفاق الكثير؟ االشتراك »االقتصادي« سستمكن من المشاركة حتى 15 شخص مع مساحة بالخادم.

                <div class="buttons" style="text-align: center; padding-top:40px;padding-bottom:15px;">
                    <a href="#form-input">
                        <button
                            style="background-color: #03A99D; border-radius:28px;
                 color: #FFB804;
                 padding: 10px 60px;
                 text-decoration: none;
                 display: inline-block;
                 border:2px solid #03A99D;">

                            اتصل بنا
                        </button>
                    </a>
                </div>
            </div>


            <div class="box" style="max-width: 250px; margin: 0 auto; height: auto;">
                <div
                    style="background-color: #03A99D; color: #fff; padding-top:10px; padding-right: 15px; padding-left:15px;clip-path: polygon(0 0, 100% 0, 100% 89%, 0% 100%);  padding-bottom:20px;">

                    <h4 style="text-align: center; color:#FFB804;">االعتيادي</h4>
                    <h5 style="text-align: center; font-weight:25px;">ريال سعودي&nbsp;<span
                            style="font-size: 30px; font-weight:bold; color:#FFB804">77</span>/لكل/شهر</h5>
                    <p style="color: #fff; text-align:center; font-size:11px;">معيار أو مقياس يتم من خلاله تقييم أو
                        الحكم على الجودة أو الدقة أو الإنجاز.
                    </p>
                </div>

                <p style="text-align: center; font-size:12px; margin-top:10px; padding:10px;">ممتاز لالستخدام المتوسط
                    ,مع االشتراك »االعتيادي« ستتمكن من المشاركة حتى 50 شخص مع سعة بالخادم.
                </p>

                <div class="button-container" style="text-align: center; padding-top:55px;padding-bottom:15px;">
                    <a href="#form-input">
                        <button
                            style="background-color: #03A99D; border-radius:28px;
                 color: #FFB804;
                 padding: 10px 60px;
                 text-decoration: none;
                 display: inline-block;
                 border:2px solid #03A99D;">
                            اتصل بنا
                        </button>
                    </a>
                </div>
            </div>

            <div class="box" style="max-width: 250px; margin: 0 auto; height: auto;">
                <div
                    style="background-color: #03A99D; color: #fff; padding-top: 10px; padding-right: 15px; padding-bottom: 20px; padding-left: 15px; clip-path: polygon(0 0, 100% 0, 100% 89%, 0% 100%);">
                    <h4 style="text-align: center; color:#FFB804;">بلص</h4>
                    <h5 style="text-align: center; font-weight: 25px;">ريال سعودي&nbsp;<span
                            style="font-size: 30px; font-weight: bold; color: #FFB804;">224</span>/لكل/شهر</h5>
                    <p style="color: #fff; text-align: center; font-size: 11px;">بالإضافة إلى؛ علاوة على ذلك؛ تستخدم
                        للدلالة على زيادة أو تعزيز.
                    </p>
                </div>
                <p style="text-align: center; font-size: 12px; margin-top: 10px; padding: 10px;">
                    اذا كنت تريد مضاعفة المشتركين حتى 100 شخص والحصول على سعة تخزين عالية.
                </p>

                <div class="button" style="text-align: center; padding-top:73px; padding-bottom:15px;">
                    <a href="#form-input">
                        <button
                            style="background-color: #03A99D; border-radius:28px;
                 color: #FFB804;
                 padding: 10px 60px;
                 text-decoration: none;
                 display: inline-block;
                 border:2px solid #03A99D;">

                            اتصل بنا
                        </button>
                    </a>
                </div>
            </div>
            {{-- 4th div  --}}
            <div class="box" style="max-width: 250px; margin: 0 auto; height: auto;">
                <div
                    style="background-color: #03A99D; color: #fff; padding-top: 10px; padding-right: 15px; padding-bottom: 20px; padding-left: 15px; clip-path: polygon(0 0, 100% 0, 100% 89%, 0% 100%);">
                    <h4 style="text-align: center; color:#FFB804;">بزنس برو اليت</h4>
                    <h5 style="text-align: center; font-weight: 25px;">ريال سعودي&nbsp;<span
                            style="font-size: 30px; font-weight: bold; color: #FFB804;">300</span>/لكل/شهر</h5>
                    <p style="color: #fff; text-align: center; font-size: 11px;">إصدار مبسط من حزمة الأعمال الاحترافية
                        التي تقدم ميزات أساسية بتكلفة مخفضة<br>
                    </p>
                </div>
                <p style="text-align: center; font-size: 12px; margin-top: 10px; padding: 10px;">بزنس برو اليت للشركات
                    المتوسطة والكبيرة بميزات أساسية وتكلفة منخفضة تتمكن من مشاركة 200 شخص.
                </p>

                <div class="button" style="text-align: center; padding-top:37px;padding-bottom:45px;">
                    <a href="#form-input">
                        <button
                            style="background-color: #03A99D; border-radius:28px;
                 color: #FFB804;
                 padding: 10px 60px;
                 text-decoration: none;
                 display: inline-block;
                 border:2px solid #03A99D;">

                            اتصل بنا
                        </button>
                    </a>
                </div>
            </div>

        </section>

        <section id="register">
            <div class="container">
                <div class="row">
                    <div class="request col-md-6  wow fadeInRight">
                        <h2>طلب التسجيل</h2>
                        <p style="font-size: 16px;">يمكنك التحكم بش حصري على الحافلات الخاصة بك بمساعدة تطبيق مدير
                            النقل. يقلل تطبيق مدير النقل
                            من
                            إمكانية وقوع الحوادث حتى الصغير منها في خدمة نقل الحافلات .</p>
                    </div>
                    <div class=" col-md-6 wow fadeInLeft">
                        <form id="form-input">
                            <input style="font-size: 16px;" class="form-control" placeholder="الاسم*" type="text"
                                required>
                            <input style="font-size: 16px;" class="form-control" placeholder="البريد الالكترونى*"
                                type="email" required>
                            <input style="font-size: 16px; direction:rtl;" class="form-control" placeholder="الهاتف*"
                                type="tel" required>


                            <select style="font-size: 16px;" class="dropdown" name="pricing_plan" id="pricing_plan"
                                required="required" style="margin-top: 10px;">
                                <!-- Add your pricing plan options here -->
                                <option value="" selected disabled hidden>خطة التسعير*</option>
                                <option value="Growth">نمو/44</option>
                                <option value="professional">/77احترافي</option>
                                <option value="enterprise">مَشرُوع/224</option>
                            </select>
                            <!--  <select><option> -->
                            <!-- -- تسجيل -- -->
                            <!-- </option> -->
                            <!-- <option> -->
                            <!-- المعتمرين والحجاج -->
                            <!-- </option> -->
                            <!-- <option> -->
                            <!-- ادارة الشركة -->
                            <!-- </option> -->
                            <!-- </select> -->
                            <textarea style="font-size: 16px;" class="form-control" placeholder="يرجى اشعارنا كيف يمكننا مساعدتك:"
                                rows="6"></textarea> <input class="form-control" type="submit" value="تقدم الان">
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <section id="contact">
            <div class="container">
                <div class="row text-center wow fadeInUp">
                    <h2>كن على تواصل</h2>
                    <p style="font-size: 16px;" class="cont">اذا اردت معلومات اخرى رجاء لا تتردد فى التواصل معانا!
                    </p>
                    <form action="#" id="contact">
                        <input style="font-size: 16px;" class="form-control" required="required" name="name"
                            id="name" placeholder="الاسم" type="text">
                        <input style="font-size: 16px;" class="form-control" required="required" name="email"
                            id="email" placeholder="البريد الالكترونى" type="email">
                        <textarea style="font-size: 16px;" class="form-control" required="required" name="message" id="message"
                            placeholder=" رسالتك" rows="6"></textarea>
                        <input style="font-size: 16px;" class="form-control btn btn-primary" type="submit"
                            value="ارسل">
                    </form>
                </div>
            </div>
        </section>
        <footer>
            <div class="addresss">
                <div class="container-fluid" style="padding: 0;background-color: #74b312">
                    <div class="col-md-4" style="display: none">
                        <h2 class="text-center"
                            style="color: white;padding-top: 40px;padding-bottom: 38px;border-bottom: 1px solid white">
                            Contact</h2>
                        <ul class="list-unstyled contact-list">
                            <li><i aria-hidden="true" class="fa fa-map-marker fa-2x"></i>
                                <p>KSA - Riyadh - Al Malaz Area.Tower 11 above intermediate, othman towers, courniche
                                    maadi,
                                    cairo, egypt.</p>
                            </li>
                            <li><i aria-hidden="true" class="fa fa-envelope-o fa-2x"></i>
                                <p>info@its-gates.com
                                    <br>info@codex-global.com
                                </p>
                            </li>
                            <li><i aria-hidden="true" class="fa fa-mobile fa-3x"></i>
                                <p>Tel: +966504644445<br>tel: +966504644445</p>
                            </li>
                        </ul>

                    </div>

                    <div class="col-md-12" style="padding: 0;background-color: white">
                        <div class="con">
                            <img src="{{ asset('frontend/image/map.png') }}" style="width: 100%" />




                            <span class="marker2 tooltip"><img src="{{ asset('frontend/image/pin.png') }}"
                                    class="pin" />
                                <div class="tooltiptext tooltip-right">
                                    <ul class="list-unstyled contact-list">
                                        <li><i aria-hidden="true" class="fa fa-map-marker fa-2x"></i>
                                            <p>منطقة الملز - الرياض - المملكة العربية السعوية</p>
                                        </li>
                                        <li><i aria-hidden="true" class="fa fa-envelope-o fa-2x"></i>
                                            <p>info@its-gates.com
                                        </li>tel: +966504644445</li>
                                    </ul>
                                </div>
                            </span>
                        </div>
                    </div>



                </div>
            </div>
            <div class="copyright">
                <div class="container text-center">
                    <div>
                        جميع الحقوق محفوظة ل مسار - masar hajj Tracker™ © 2022
                    </div>
                    <div class="icons">
                        <a href="https://twitter.com/Masar_hajj"><i class="fa fa-twitter"></i></a> <a
                            href="https://www.facebook.com/people/Masar-Hajj/pfbid02n9s5qtL53AoEHXSVjMiy96ha3NZ6T3CwqYBau4C75T4xJ9dFBeNb5pVV7GTiZSLml/"><i
                                class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-youtube"></i></a>

                    </div>
                </div>
            </div>
        </footer>
        <script src="{{ asset('frontend/js/jquery-3.1.1.min.js') }}"></script>
        <script src="{{ asset('frontend/js/slick.min.js') }}"></script>
        <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('frontend/js/wow.min.js') }}"></script>
        <script src="{{ asset('frontend/js/script.js') }}"></script>
        <script>
            new WOW().init();
        </script>

</body>


</html>

<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
    }

    #app {
        display: flex;
        flex-wrap: wrap;
        /* justify-content: space-around; */
        justify-content: space-around;
        padding: 20px;
    }

    .box {
        width: 100%;
        /* Set initial width to 100% for small screens */
        box-sizing: border-box;
        /* Include padding and border in the width */
        margin-bottom: 20px;
        flex: 1;
        /* padding: 20px; */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease-in-out;
    }

    .box:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .box h4 span {
        font-size: 32px;
    }

    .responsive-phone-input {
        padding-right: 195px !important;
        max-width: 170% !important;
    }

    /* for responsive code  */

    @media screen and (max-width: 512px) {
        .box {
            display: flex;
            flex-direction: column;
        }
    }

    @media screen and (max-width: 991px) {
        .responsive-phone-input {
            padding-right: 189px !important;
        }
    }

    @media screen and (max-width: 512px) {

        /* Adjust styles for smaller screens */
        .button {
            padding-bottom: 20px !important;
        }
    }


    @media only screen and (max-width: 512px) {

        /* Adjust styles for smaller screens */
        .button,
        .button-container {
            padding-bottom: 20px;
            /* Adjust the value according to your design */
        }
    }

    /* .......................  */
    @media only screen and (max-width: 600px) {
        .box {
            max-width: 100%;
            /* Adjust the max-width to fit smaller screens */
        }

        .button {
            padding-top: 0px !important;
            /* Adjust the padding for the button */
        }
        .buttons {
            padding-top: 147px !important;
            /* Adjust the padding for the button */
        }
    }
    /* .......................  */
    @media only screen and (max-width: 600px) {
        .box {
            max-width: 100%;
            /* Adjust the max-width to fit smaller screens */
        }

        .button {
            padding-top: 0px !important;
            /* Adjust the padding for the button */
        }

        .buttons {
            padding-top: 147px !important;
            /* Adjust the padding for the button */
        }
    }

    /* Media query for screens with maximum width of 767px (typical mobile screens) */
    @media screen and (max-width: 767px) {
        #app {
            flex-direction: column;
            /* Change flex direction to column */
            align-items: center;
            /* Center align items */
        }

        .box {
            width: 100%;
            /* Make each box take up full width */
            max-width: 100%;
            /* Ensure boxes don't exceed the width of the viewport */
        }
    }
  
</style>
