<!-- Google Translate Widget -->
<div id="google-translate-widget" class="google-translate-widget">
    <div class="translate-toggle" id="translate-toggle">
        <div class="globe-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.94-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z" fill="currentColor"/>
            </svg>
        </div>
    </div>

    <div class="translate-dropdown" id="translate-dropdown">
        <div class="language-flags">
            <!-- Row 1 -->
            <div class="flag-row">
                <button class="flag-btn active" data-lang="de" title="Deutsch">
                    <div class="flag-flag" style="background: linear-gradient(to bottom, #000000 33%, #FF0000 33%, #FF0000 66%, #FFD700 66%);"></div>
                </button>
                <button class="flag-btn" data-lang="en" title="English">
                    <div class="flag-flag" style="background: linear-gradient(45deg, #012169 25%, #FFFFFF 25%, #FFFFFF 50%, #C8102E 50%, #C8102E 75%, #FFFFFF 75%);"></div>
                </button>
                <button class="flag-btn" data-lang="fr" title="Français">
                    <div class="flag-flag" style="background: linear-gradient(to right, #002395 33%, #FFFFFF 33%, #FFFFFF 66%, #ED2939 66%);"></div>
                </button>
            </div>
            <!-- Row 2 -->
            <div class="flag-row">
                <button class="flag-btn" data-lang="es" title="Español">
                    <div class="flag-flag" style="background: linear-gradient(to bottom, #C60B1E 25%, #FFC400 25%, #FFC400 50%, #C60B1E 50%, #C60B1E 75%, #FFC400 75%);"></div>
                </button>
                <button class="flag-btn" data-lang="it" title="Italiano">
                    <div class="flag-flag" style="background: linear-gradient(to right, #009246 33%, #FFFFFF 33%, #FFFFFF 66%, #CE2B37 66%);"></div>
                </button>
                <button class="flag-btn" data-lang="pt" title="Português">
                    <div class="flag-flag" style="background: linear-gradient(to right, #006600 40%, #FF0000 40%, #FF0000 60%, #FFFF00 60%);"></div>
                </button>
            </div>
            <!-- Row 3 -->
            <div class="flag-row">
                <button class="flag-btn" data-lang="ru" title="Русский">
                    <div class="flag-flag" style="background: linear-gradient(to bottom, #FFFFFF 33%, #0052B4 33%, #0052B4 66%, #D52B1E 66%);"></div>
                </button>
                <button class="flag-btn" data-lang="nl" title="Nederlands">
                    <div class="flag-flag" style="background: linear-gradient(to bottom, #FF6600 33%, #FFFFFF 33%, #FFFFFF 66%, #0046A4 66%);"></div>
                </button>
                <button class="flag-btn" data-lang="zh-CN" title="中文">
                    <div class="flag-flag" style="background: #D52B1E; position: relative;">
                        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 8px; height: 8px; background: #FFFFFF; border-radius: 50%;"></div>
                    </div>
                </button>
            </div>
            <!-- Row 4 -->
            <div class="flag-row">
                <button class="flag-btn" data-lang="ar" title="العربية">
                    <div class="flag-flag" style="background: linear-gradient(to bottom, #00732F 33.33%, #FFFFFF 33.33%, #FFFFFF 66.66%, #000000 66.66%); position: relative;">
                        <div style="position: absolute; left: 0; top: 0; bottom: 0; width: 25%; background: #FF0000;"></div>
                    </div>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- SIMPLE Google Translate Script -->
<script type="text/javascript">
console.log('🔷 STEP 1: Initializing Google Translate script');

function googleTranslateElementInit() {
    console.log('🔷 STEP 2: googleTranslateElementInit() called');

    try {
        new google.translate.TranslateElement({
            pageLanguage: 'de',
            includedLanguages: 'de,en,fr,es,it,pt,ru,nl,zh-CN,ar'
        }, 'google_translate_element');

        console.log('✅ STEP 3: Google Translate Element created successfully');
    } catch (error) {
        console.error('❌ STEP 3 FAILED:', error);
    }
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<!-- VISIBLE Google Translate Element for TESTING -->
<div id="google_translate_element" style="position: fixed; top: 10px; left: 10px; background: yellow; padding: 5px; z-index: 99999;"></div>
