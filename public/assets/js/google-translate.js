// SIMPLE Google Translate Widget JavaScript with CLEAR LOGGING
console.log('🔷 Google Translate JS: Loading...');

document.addEventListener('DOMContentLoaded', function() {
    console.log('🔷 DOM Ready: Starting widget initialization');

    const translateToggle = document.getElementById('translate-toggle');
    const translateDropdown = document.getElementById('translate-dropdown');
    const flagButtons = document.querySelectorAll('.flag-btn');

    let isDropdownOpen = false;

    console.log('🔷 Found elements:', {
        toggle: !!translateToggle,
        dropdown: !!translateDropdown,
        buttons: flagButtons.length
    });

    // Toggle dropdown visibility
    if (translateToggle) {
        translateToggle.addEventListener('click', function(e) {
            e.stopPropagation();
            isDropdownOpen = !isDropdownOpen;
            console.log('🔷 Toggle clicked. Dropdown open:', isDropdownOpen);

            if (isDropdownOpen) {
                translateDropdown.classList.add('show');
            } else {
                translateDropdown.classList.remove('show');
            }
        });
    }

    // Close dropdown when clicking outside
    document.addEventListener('click', function(e) {
        if (translateToggle && !translateToggle.contains(e.target) && !translateDropdown.contains(e.target)) {
            isDropdownOpen = false;
            translateDropdown.classList.remove('show');
        }
    });

    // Handle flag button clicks
    flagButtons.forEach((button, index) => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();

            const language = this.getAttribute('data-lang');
            console.log(`\n🚩 FLAG CLICKED: ${language}`);
            console.log('🔷 STEP 1: User clicked flag for language:', language);

            // Update active state
            flagButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            console.log('🔷 STEP 2: Updated active button');

            // Find Google Translate combo
            const combo = document.querySelector('.goog-te-combo');
            console.log('🔷 STEP 3: Looking for Google Translate combo...');
            console.log('   - Combo element found:', !!combo);

            if (combo) {
                console.log('   - Current combo value:', combo.value);
                console.log('   - Available options:', Array.from(combo.options).map(o => o.value));

                console.log('🔷 STEP 4: Setting combo value to:', language);
                combo.value = language;

                console.log('🔷 STEP 5: Dispatching change event...');
                combo.dispatchEvent(new Event('change', { bubbles: true }));

                console.log('✅ Translation triggered! New value:', combo.value);

                // Switch custom language elements (menu, cookie banner, etc.)
                if (typeof switchLanguage === 'function') {
                    switchLanguage(language);
                }
            } else {
                console.error('❌ PROBLEM: Google Translate combo not found!');
                console.log('   - Check if Google Translate script loaded');
                console.log('   - Check if #google_translate_element exists');
                console.log('   - Google object:', typeof google);
                console.log('   - All selects on page:', document.querySelectorAll('select').length);
            }

            // Close dropdown
            isDropdownOpen = false;
            translateDropdown.classList.remove('show');
        });
    });

    // Wait for Google Translate to load and report status
    let checkCount = 0;
    const checkInterval = setInterval(() => {
        checkCount++;
        const combo = document.querySelector('.goog-te-combo');

        if (combo) {
            console.log(`✅ READY: Google Translate combo found after ${checkCount} checks`);
            console.log('   - Options count:', combo.options.length);
            console.log('   - Available languages:', Array.from(combo.options).map(o => o.value).filter(v => v));
            clearInterval(checkInterval);
        } else if (checkCount >= 20) {
            console.error('❌ TIMEOUT: Google Translate combo never appeared after 10 seconds');
            console.log('Debug info:');
            console.log('   - Google object exists:', typeof google !== 'undefined');
            console.log('   - #google_translate_element exists:', !!document.querySelector('#google_translate_element'));
            console.log('   - All elements with goog-te:', document.querySelectorAll('[class*="goog-te"]').length);
            clearInterval(checkInterval);
        } else if (checkCount % 5 === 0) {
            console.log(`⏳ Waiting for Google Translate... (${checkCount * 500}ms)`);
        }
    }, 500);

    console.log('🔷 Widget initialization complete. Waiting for Google Translate...');
});
