<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'VIS GmbH - Ihr Partner für Bauprojekte')</title>
    <meta name="description" content="@yield('meta_description', 'Ihr Partner für innovative und zuverlässige Bauprojekte. Ob Neubau, Renovierung oder Sanierung – wir setzen Ihre Ideen in die Tat um.')">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/img/favicon.ico') }}">

    <!-- CSS
	============================================ -->

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/font-awesome.min.css') }}">

    <!-- Material design iconic font CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/material-design-iconic-font.min.css') }}">

    <!-- Ionicons CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/ionicons.min.css') }}">

    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/flaticon.min.css') }}">

    <!-- Swiper slider CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/swiper.min.css') }}">

    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/animate.min.css') }}">

    <!-- Light gallery CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/lightgallery.min.css') }}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!-- Google Translate CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/google-translate.css') }}">

    <!-- CSRF Token for Laravel -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Custom Styles for Authentication Integration -->
    <style>
        /* Cookie Consent Styles */
        .cookie-consent-banner {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: #2d3748;
            color: white;
            padding: 20px;
            z-index: 1000;
            display: none;
            box-shadow: 0 -2px 10px rgba(0,0,0,0.1);
        }
        .cookie-consent-banner.show {
            display: block;
        }
        .cookie-consent-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }
        .cookie-consent-text {
            flex: 1;
        }
        .cookie-consent-buttons {
            display: flex;
            gap: 10px;
        }
        .cookie-consent-btn {
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
        }
        .cookie-consent-btn.accept {
            background-color: #007bff;
            color: white;
        }
        .cookie-consent-btn.accept:hover {
            background-color: #0056b3;
        }
        .cookie-consent-btn.reject {
            background-color: #6c757d;
            color: white;
        }
        .cookie-consent-btn.reject:hover {
            background-color: #545b62;
        }
        @media (max-width: 768px) {
            .cookie-consent-content {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>
</head>

<body>

    <!--====================  header area ====================-->
    <div class="header-area header-sticky header-sticky--default">
        <div class="header-area__desktop header-area__desktop--default">
            <!--=======  header top bar  =======-->
            <div class="header-top-bar">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-4">
                            <!-- top bar left -->
                            <div class="top-bar-left-wrapper">
                                <div class="social-links social-links--white-topbar d-inline-block">
                                    <ul>
                                        <li><a href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                        <li><a href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                                        <li><a href="#"><i class="zmdi zmdi-vimeo"></i></a></li>
                                        <li><a href="#"><i class="zmdi zmdi-linkedin-box"></i></a></li>
                                        <li><a href="#"><i class="zmdi zmdi-skype"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <!-- top bar right -->
                            <div class="top-bar-right-wrapper">
                                @auth
                                    <span class="text-white me-3">
                                        <span class="lang-de">Willkommen, {{ Auth::user()->name }}</span>
                                        <span class="lang-en" style="display:none;">Welcome, {{ Auth::user()->name }}</span>
                                    </span>
                                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-light btn-sm">
                                            <span class="lang-de">Abmelden</span>
                                            <span class="lang-en" style="display:none;">Logout</span>
                                        </button>
                                    </form>
                                @else


                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--=======  End of header top bar  =======-->
            <!--=======  header info area  =======-->
            <div class="header-info-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="header-info-wrapper align-items-center">
                                <!-- logo -->
                                <div class="logo">
                                    <a href="{{ route('home') }}">
                                        <img width="178" height="39" src="{{ asset('assets/img/logo/vis-logo.png') }}" class="img-fluid" alt="VIS GmbH Logo">
                                    </a>
                                </div>

                                <!-- header contact info -->
                                <div class="header-contact-info">
                                    <div class="header-info-single-item">
                                        <div class="header-info-single-item__icon">
                                            <i class="zmdi zmdi-smartphone-android"></i>
                                        </div>
                                        <div class="header-info-single-item__content">
                                            <h6 class="header-info-single-item__title">
                                                <span class="lang-de">Telefon</span>
                                                <span class="lang-en" style="display:none;">Phone</span>
                                            </h6>
                                            <p class="header-info-single-item__subtitle">+49 (0) 621 6374820</p>
                                        </div>
                                    </div>
                                    <div class="header-info-single-item">
                                        <div class="header-info-single-item__icon">
                                            <i class="zmdi zmdi-home"></i>
                                        </div>
                                        <div class="header-info-single-item__content">
                                            <h6 class="header-info-single-item__title">
                                                <span class="lang-de">Adresse</span>
                                                <span class="lang-en" style="display:none;">Address</span>
                                            </h6>
                                            <p class="header-info-single-item__subtitle">Rosengartenplatz 3, 68161 Mannheim, Germany</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- mobile menu -->
                                <div class="mobile-navigation-icon" id="mobile-menu-trigger">
                                    <i></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--=======  End of header info area =======-->
            <!--=======  header navigation area  =======-->
            <div class="header-navigation-area default-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- header navigation -->
                            <div class="header-navigation header-navigation--header-default position-relative">
                                <div class="header-navigation__nav position-static">
                                    <nav>
                                        <ul>
                                            <li class="has-children has-children--multilevel-submenu {{ request()->routeIs('home') ? 'active' : '' }}">
                                                <a href="{{ route('home') }}">
                                                    <span class="lang-de">home</span>
                                                    <span class="lang-en" style="display:none;">HOME</span>
                                                </a>
                                            </li>
                                            <li class="{{ request()->routeIs('about') ? 'active' : '' }}">
                                                <a href="{{ route('about') }}">
                                                    <span class="lang-de">ÜBER UNS</span>
                                                    <span class="lang-en" style="display:none;">ABOUT</span>
                                                </a>
                                            </li>

                                            @if($sectionVisibility['services'] ?? true)
                                            <li class="has-children has-children--multilevel-submenu {{ request()->routeIs('services.*') ? 'active' : '' }}">
                                                <a href="{{ route('services.index') }}">
                                                    <span class="lang-de">DIENSTLEISTUNGEN</span>
                                                    <span class="lang-en" style="display:none;">SERVICE</span>
                                                </a>
                                            </li>
                                            @endif

                                            @if($sectionVisibility['projects'] ?? true)
                                            <li class="has-children has-children--multilevel-submenu {{ request()->routeIs('projects.*') ? 'active' : '' }}">
                                                <a href="{{ route('projects.index') }}">
                                                    <span class="lang-de">PROJEKTE</span>
                                                    <span class="lang-en" style="display:none;">PROJECT</span>
                                                </a>
                                            </li>
                                            @endif

                                            @if($sectionVisibility['blog_posts'] ?? true)
                                            <li class="has-children has-children--multilevel-submenu {{ request()->routeIs('blog.*') ? 'active' : '' }}">
                                                <a href="{{ route('blog.index') }}">BLOG</a>
                                            </li>
                                            @endif
                                            <li class="{{ request()->routeIs('contact') ? 'active' : '' }}">
                                                <a href="{{ route('contact') }}">
                                                    <span class="lang-de">KONTAKT</span>
                                                    <span class="lang-en" style="display:none;">CONTACT</span>
                                                </a>
                                            </li>
                                            @auth
                                            <li><a href="{{ route('admin.dashboard') }}">ADMIN</a></li>
                                            @endauth
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--=======  End of header navigation area =======-->
        </div>
    </div>
    <!--====================  End of header area  ====================-->

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>

    <!--====================  footer area ====================-->
    <div class="footer-area dark-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-content-wrapper section-space--inner--100">
                        <div class="row">
                            <div class="col-xl-3 col-lg-3 col-md-12">
                                <!-- footer intro wrapper -->
                                <div class="footer-intro-wrapper">
                                    <div class="footer-logo">
                                        <a href="{{ route('home') }}">
                                            <img width="199" height="44" src="{{ asset('assets/img/logo/vis-logo-light.png') }}" class="img-fluid" alt="VIS GmbH Logo Light">
                                        </a>
                                    </div>
                                    <div class="footer-desc">
                                        Ihr Partner für innovative und zuverlässige Bauprojekte. Ob Neubau, Renovierung oder Sanierung – wir setzen Ihre Ideen in die Tat um. Mit jahrelanger Erfahrung, modernster Technik und einem engagierten Team garantieren wir höchste Qualität und termingerechte Fertigstellung.
                                    </div>

                                </div>
                            </div>
                            <div class="col-xl-2 offset-xl-1 col-lg-3 col-md-4">
                                <!-- footer widget -->
                                <div class="footer-widget">
                                    <h4 class="footer-widget__title">
                                        <span class="lang-de">NÜTZLICHE LINKS</span>
                                        <span class="lang-en" style="display:none;">USEFUL LINKS</span>
                                    </h4>
                                    <ul class="footer-widget__navigation">
                                        <li><a href="{{ route('home') }}">
                                            <span class="lang-de">Startseite</span>
                                            <span class="lang-en" style="display:none;">Home</span>
                                        </a></li>
                                        <li><a href="{{ route('about') }}">
                                            <span class="lang-de">Über uns</span>
                                            <span class="lang-en" style="display:none;">About</span>
                                        </a></li>
                                        @if($sectionVisibility['projects'] ?? true)
                                        <li><a href="{{ route('projects.index') }}">
                                            <span class="lang-de">Projekte</span>
                                            <span class="lang-en" style="display:none;">Projects</span>
                                        </a></li>
                                        @endif
                                        <li><a href="{{ route('contact') }}">
                                            <span class="lang-de">Kontaktieren Sie uns</span>
                                            <span class="lang-en" style="display:none;">Contact Us</span>
                                        </a></li>
                                        <li><a href="{{ route('gdpr.index') }}">
                                            <span class="lang-de">Datenschutzrechte</span>
                                            <span class="lang-en" style="display:none;">Privacy Rights</span>
                                        </a></li>
                                    </ul>
                                </div>
                            </div>
                            @if($sectionVisibility['services'] ?? true)
                            <div class="col-xl-2 offset-xl-1 col-lg-3 col-md-4">
                                <!-- footer widget -->
                                <div class="footer-widget">
                                    <h4 class="footer-widget__title">
                                        <span class="lang-de">UNSERE DIENSTLEISTUNGEN</span>
                                        <span class="lang-en" style="display:none;">OUR SERVICES</span>
                                    </h4>
                                    <ul class="footer-widget__navigation">
                                        <li><a href="{{ route('services.index') }}">
                                            <span class="lang-de">Rohbau</span>
                                            <span class="lang-en" style="display:none;">Shell Construction</span>
                                        </a></li>
                                        <li><a href="{{ route('services.index') }}">
                                            <span class="lang-de">Umbau und Abbruch</span>
                                            <span class="lang-en" style="display:none;">Renovation & Demolition</span>
                                        </a></li>
                                        <li><a href="{{ route('services.index') }}">
                                            <span class="lang-de">Garten-/Landschaftsbau</span>
                                            <span class="lang-en" style="display:none;">Landscaping</span>
                                        </a></li>
                                        <li><a href="{{ route('services.index') }}">
                                            <span class="lang-de">Schlüsselfertiges Bauen</span>
                                            <span class="lang-en" style="display:none;">Turnkey Construction</span>
                                        </a></li>
                                    </ul>
                                </div>
                            </div>
                            @endif
                            <div class="col-xl-2 offset-xl-1 col-lg-3 col-md-4">
                                <!-- footer widget -->
                                <div class="footer-widget mb-0">
                                    <h4 class="footer-widget__title">
                                        <span class="lang-de">KONTAKTIEREN SIE UNS</span>
                                        <span class="lang-en" style="display:none;">CONTACT US</span>
                                    </h4>
                                    <div class="footer-widget__content">
                                        <p class="address">Rosengartenplatz 3, 68161 Mannheim</p>
                                        <ul class="contact-details">
                                            <li><span>Telefon:</span>+49 (0) 621 6374820</li>
                                            <li><span>E-Mail:</span>info@vis-bau.com</li>
                                            <li>
                                                <span>
                                                    <span class="lang-de">Geschäftliche E-Mail:</span>
                                                </span>
                                                <a href="mailto:business@vis-bau.com" style="color: #c7c7c7;">business@vis-bau.com</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright-wrapper">
            <div class="footer-copyright text-center">
                <p class="copyright-text">&copy; {{ date('Y') }} VIS GmbH. Alle Rechte vorbehalten. Built with <a href="#" class="text-primary">VIS GmbH</a></p>
            </div>
        </div>
    </div>
    <!--====================  End of footer area  ====================-->

    <!-- Cookie Consent Banner -->
    <div id="cookie-consent-banner" class="cookie-consent-banner">
        <div class="cookie-consent-content">
            <div class="cookie-consent-text">
                <p class="lang-de">Wir verwenden Cookies, um Ihr Surferlebnis zu verbessern, personalisierte Inhalte bereitzustellen und unseren Datenverkehr zu analysieren. Durch Klicken auf „Alle akzeptieren" stimmen Sie der Verwendung von Cookies zu. Lesen Sie unsere <a href="/privacy-policy" style="color: #90cdf4;">Datenschutzerklärung</a>, um mehr zu erfahren.</p>
                <p class="lang-en" style="display:none;">We use cookies to enhance your browsing experience, serve personalized content, and analyze our traffic. By clicking "Accept All", you consent to our use of cookies. Read our <a href="/privacy-policy" style="color: #90cdf4;">Privacy Policy</a> to learn more.</p>
            </div>
            <div class="cookie-consent-buttons">
                <button class="cookie-consent-btn reject" onclick="rejectCookies()">
                    <span class="lang-de">Ablehnen</span>
                    <span class="lang-en" style="display:none;">Reject</span>
                </button>
                <button class="cookie-consent-btn accept" onclick="acceptCookies()">
                    <span class="lang-de">Alle akzeptieren</span>
                    <span class="lang-en" style="display:none;">Accept All</span>
                </button>
            </div>
        </div>
    </div>

    <!--=======  offcanvas mobile menu  =======-->
    <div class="offcanvas-mobile-menu" id="mobile-menu-overlay">
        <a href="javascript:void(0)" class="offcanvas-menu-close" id="mobile-menu-close-trigger">
            <i class="ion-android-close"></i>
        </a>

        <div class="offcanvas-wrapper">
            <div class="offcanvas-inner-content">
                <nav class="offcanvas-navigation">
                    <ul>
                        <li class="menu-item-has-children">
                            <a href="{{ route('home') }}">
                                <span class="lang-de">Startseite</span>
                                <span class="lang-en" style="display:none;">Home</span>
                            </a>
                        </li>
                        <li><a href="{{ route('about') }}">
                            <span class="lang-de">Über uns</span>
                            <span class="lang-en" style="display:none;">About</span>
                        </a></li>
                        @if($sectionVisibility['services'] ?? true)
                        <li class="menu-item-has-children">
                            <a href="{{ route('services.index') }}">
                                <span class="lang-de">Dienstleistungen</span>
                                <span class="lang-en" style="display:none;">Service</span>
                            </a>
                        </li>
                        @endif
                        @if($sectionVisibility['projects'] ?? true)
                        <li class="menu-item-has-children">
                            <a href="{{ route('projects.index') }}">
                                <span class="lang-de">Projekte</span>
                                <span class="lang-en" style="display:none;">Project</span>
                            </a>
                        </li>
                        @endif
                        @if($sectionVisibility['blog_posts'] ?? true)
                        <li class="menu-item-has-children">
                            <a href="{{ route('blog.index') }}">Blog</a>
                        </li>
                        @endif
                        <li><a href="{{ route('contact') }}">
                            <span class="lang-de">Kontakt</span>
                            <span class="lang-en" style="display:none;">Contact</span>
                        </a></li>
                        @auth
                        <li><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                        @endauth
                    </ul>
                </nav>

                <div class="offcanvas-widget-area">
                    <div class="off-canvas-contact-widget">
                        <div class="header-contact-info">
                            <ul class="header-contact-info__list">
                                <li><i class="ion-android-phone-portrait"></i> <a href="tel:+496216374820">+49 (0) 621 6374820</a></li>
                                <li><i class="ion-android-mail"></i> <a href="mailto:info@vis-bau.com">info@vis-bau.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="off-canvas-widget-social">
                        <a href="#" title="Facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" title="Twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" title="LinkedIn"><i class="fa fa-linkedin"></i></a>
                        <a href="#" title="Youtube"><i class="fa fa-youtube-play"></i></a>
                        <a href="#" title="Vimeo"><i class="fa fa-vimeo-square"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=======  End of offcanvas mobile menu  =======-->

    <!--====================  scroll top ====================-->
    <a href="#" class="scroll-top" id="scroll-top">
        <i class="ion-android-arrow-up"></i>
    </a>
    <!--====================  End of scroll top  ====================-->

    <!--====================  Google Translate Widget ====================-->
    @include('components.google-translate')
    <!--====================  End of Google Translate Widget ====================-->

    <!-- JS
============================================ -->

    <!-- Modernizer JS -->
    <script src="{{ asset('assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>

    <!-- jQuery JS -->
    <script src="{{ asset('assets/js/vendor/jquery.min.js') }}"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/js/vendor/bootstrap.min.js') }}"></script>

    <!-- Swiper Slider JS -->
    <script src="{{ asset('assets/js/plugins/swiper.min.js') }}"></script>

    <!-- Light gallery JS -->
    <script src="{{ asset('assets/js/plugins/lightgallery.min.js') }}"></script>

    <!-- Waypoints JS -->
    <script src="{{ asset('assets/js/plugins/waypoints.min.js') }}"></script>

    <!-- Counter up JS -->
    <script src="{{ asset('assets/js/plugins/counterup.min.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Google Translate JS -->
    <script src="{{ asset('assets/js/google-translate.js') }}"></script>

    <!-- Cookie Consent JavaScript -->
    <script>
        function acceptCookies() {
            localStorage.setItem('cookieConsent', 'accepted');
            document.getElementById('cookie-consent-banner').classList.remove('show');
        }

        function rejectCookies() {
            localStorage.setItem('cookieConsent', 'rejected');
            document.getElementById('cookie-consent-banner').classList.remove('show');
        }

        document.addEventListener('DOMContentLoaded', function() {
            const consent = localStorage.getItem('cookieConsent');
            if (!consent) {
                document.getElementById('cookie-consent-banner').classList.add('show');
            }
        });
    </script>

    <!-- Language Switcher JavaScript -->
    <script>
        // Function to toggle language display
        function switchLanguage(lang) {
            console.log('Switching to language:', lang);

            // Hide all language elements
            document.querySelectorAll('.lang-de, .lang-en').forEach(function(el) {
                el.style.display = 'none';
            });

            // Show elements for selected language
            if (lang === 'en') {
                document.querySelectorAll('.lang-en').forEach(function(el) {
                    el.style.display = '';
                });
            } else {
                // Default to German
                document.querySelectorAll('.lang-de').forEach(function(el) {
                    el.style.display = '';
                });
            }

            // Store language preference
            localStorage.setItem('selectedLanguage', lang);
        }

        // Initialize language on page load
        document.addEventListener('DOMContentLoaded', function() {
            // Check if language is stored in localStorage
            var savedLang = localStorage.getItem('selectedLanguage');

            // Check URL for Google Translate parameter
            var urlParams = new URLSearchParams(window.location.search);
            var urlLang = urlParams.get('lang');

            // Determine which language to use
            var currentLang = urlLang || savedLang || 'de'; // Default to German

            // Apply the language
            switchLanguage(currentLang);
        });

        // Listen for language selection from Google Translate or custom language selector
        document.addEventListener('click', function(e) {
            // Check if clicked element is a language button
            if (e.target.closest('[data-lang]')) {
                var langBtn = e.target.closest('[data-lang]');
                var selectedLang = langBtn.getAttribute('data-lang');

                // Map language codes to de/en
                if (selectedLang === 'de') {
                    switchLanguage('de');
                } else {
                    switchLanguage('en');
                }
            }
        });

        // Monitor Google Translate changes
        setInterval(function() {
            // Check if page is translated by Google Translate
            var htmlLang = document.documentElement.lang || 'de';
            var gtCombo = document.querySelector('.goog-te-combo');

            if (gtCombo && gtCombo.value) {
                var currentLang = gtCombo.value === 'de' ? 'de' : 'en';
                var savedLang = localStorage.getItem('selectedLanguage');

                if (currentLang !== savedLang) {
                    switchLanguage(currentLang);
                }
            }
        }, 500);
    </script>

</body>

</html>
