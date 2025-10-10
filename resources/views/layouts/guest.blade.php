<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'Authentication - VIS GmbH')</title>

        <!-- Constrk Template CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/vendor/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/vendor/ionicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/vendor/material-design-iconic-font.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/vendor/flaticon.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/plugins/swiper.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/plugins/lightgallery.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/plugins/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/plugins/plugins.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

        <style>
            /* Constrk authentication styling */
            .auth-page-wrapper {
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                padding: 20px;
            }

            .auth-card {
                background: white;
                border-radius: 10px;
                box-shadow: 0 10px 25px rgba(0,0,0,0.1);
                overflow: hidden;
                max-width: 400px;
                width: 100%;
            }

            .auth-header {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: white;
                text-align: center;
                padding: 30px 20px;
            }

            .auth-header h2 {
                margin: 0;
                font-size: 24px;
                font-weight: 600;
            }

            .auth-header p {
                margin: 10px 0 0 0;
                opacity: 0.9;
            }

            .auth-body {
                padding: 30px;
            }

            .auth-footer {
                background: #f8f9fa;
                padding: 20px;
                text-align: center;
                border-top: 1px solid #e9ecef;
            }

            .auth-footer a {
                color: #667eea;
                text-decoration: none;
            }

            .auth-footer a:hover {
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <div class="auth-page-wrapper">
            <div class="auth-card">
                <div class="auth-header">
                    <img src="{{ asset('assets/img/logo/vis-logo.png') }}" alt="VIS Construction" width="80" height="26" style="margin-bottom: 15px;">
                    <h2>@yield('title', 'Authentication')</h2>
                    <p>
                        <span class="lang-de">Professionelle Baudienstleistungen</span>
                        <span class="lang-en" style="display:none;">Professional Construction Services</span>
                    </p>
                </div>

                <div class="auth-body">
                    {{ $slot }}
                </div>

                <div class="auth-footer">
                    <p>&copy; {{ date('Y') }} VIS GmbH. <a href="{{ route('home') }}">
                        <span class="lang-de">Zurück zur Website</span>
                        <span class="lang-en" style="display:none;">Back to Website</span>
                    </a></p>
                </div>
            </div>
        </div>

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

                // Determine which language to use
                var currentLang = savedLang || 'de'; // Default to German

                // Apply the language
                switchLanguage(currentLang);
            });
        </script>
    </body>
</html>
