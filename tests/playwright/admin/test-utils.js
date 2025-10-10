/**
 * Test utilities for Playwright admin tests
 */

/**
 * Login to admin panel
 * @param {import('@playwright/test').Page} page - Playwright page object
 * @param {string} email - Admin email
 * @param {string} password - Admin password
 */
async function loginToAdmin(page, email = 'admin@example.com', password = 'password') {
  await page.goto('/login');
  await page.fill('input[name="email"]', email);
  await page.fill('input[name="password"]', password);
  await page.click('button[type="submit"]');
  await page.waitForURL('/admin');
}

/**
 * Wait for success message to appear
 * @param {import('@playwright/test').Page} page - Playwright page object
 */
async function waitForSuccessMessage(page) {
  await page.waitForSelector('.alert-success, .success', { timeout: 5000 });
}

/**
 * Wait for error message to appear
 * @param {import('@playwright/test').Page} page - Playwright page object
 */
async function waitForErrorMessage(page) {
  await page.waitForSelector('.error, .invalid-feedback, .text-red-500', { timeout: 5000 });
}

/**
 * Fill form with test data
 * @param {import('@playwright/test').Page} page - Playwright page object
 * @param {Object} data - Form data object
 */
async function fillForm(page, data) {
  for (const [field, value] of Object.entries(data)) {
    const selector = `input[name="${field}"], textarea[name="${field}"], select[name="${field}"]`;
    const element = page.locator(selector);

    if (await element.isVisible()) {
      const tagName = await element.evaluate(el => el.tagName.toLowerCase());

      if (tagName === 'select') {
        await element.selectOption(value);
      } else {
        await element.fill(value);
      }
    }
  }
}

/**
 * Submit form and wait for success
 * @param {import('@playwright/test').Page} page - Playwright page object
 */
async function submitFormAndWaitForSuccess(page) {
  await page.click('button[type="submit"]');
  await waitForSuccessMessage(page);
}

/**
 * Submit form and wait for error
 * @param {import('@playwright/test').Page} page - Playwright page object
 */
async function submitFormAndWaitForError(page) {
  await page.click('button[type="submit"]');
  await waitForErrorMessage(page);
}

/**
 * Navigate to admin section
 * @param {import('@playwright/test').Page} page - Playwright page object
 * @param {string} section - Admin section name
 */
async function navigateToAdminSection(page, section) {
  await page.goto(`/admin/${section}`);
}

/**
 * Create test data for a specific model
 * @param {import('@playwright/test').Page} page - Playwright page object
 * @param {string} model - Model name (e.g., 'pages', 'services')
 * @param {Object} data - Test data
 */
async function createTestData(page, model, data) {
  await page.goto(`/admin/${model}/create`);
  await fillForm(page, data);
  await submitFormAndWaitForSuccess(page);
}

/**
 * Edit existing item
 * @param {import('@playwright/test').Page} page - Playwright page object
 * @param {string} model - Model name
 * @param {Object} updates - Updated data
 */
async function editItem(page, model, updates) {
  await page.goto(`/admin/${model}`);
  await page.click('a[href*="edit"]:first-of-type');
  await fillForm(page, updates);
  await submitFormAndWaitForSuccess(page);
}

/**
 * Delete item
 * @param {import('@playwright/test').Page} page - Playwright page object
 * @param {string} model - Model name
 */
async function deleteItem(page, model) {
  await page.goto(`/admin/${model}`);
  await page.click('button[data-action="delete"], .delete-btn:first-of-type');
  await page.click('button:has-text("Confirm"), button:has-text("Delete")');
  await waitForSuccessMessage(page);
}

/**
 * View item details
 * @param {import('@playwright/test').Page} page - Playwright page object
 * @param {string} model - Model name
 */
async function viewItem(page, model) {
  await page.goto(`/admin/${model}`);
  await page.click('a[href*="show"]:first-of-type');
}

/**
 * Search for items
 * @param {import('@playwright/test').Page} page - Playwright page object
 * @param {string} searchTerm - Search term
 */
async function searchItems(page, searchTerm) {
  const searchInput = page.locator('input[name="search"], .search-input');
  if (await searchInput.isVisible()) {
    await searchInput.fill(searchTerm);
    await page.click('button:has-text("Search")');
  }
}

/**
 * Filter items by status
 * @param {import('@playwright/test').Page} page - Playwright page object
 * @param {string} status - Status to filter by
 */
async function filterByStatus(page, status) {
  const filterSelect = page.locator('select[name="status"], .filter-select');
  if (await filterSelect.isVisible()) {
    await filterSelect.selectOption(status);
    await page.click('button:has-text("Filter")');
  }
}

/**
 * Wait for page load with performance measurement
 * @param {import('@playwright/test').Page} page - Playwright page object
 * @param {string} url - URL to navigate to
 * @param {number} maxLoadTime - Maximum acceptable load time in ms
 */
async function waitForPageLoad(page, url, maxLoadTime = 3000) {
  const startTime = Date.now();
  await page.goto(url);
  const loadTime = Date.now() - startTime;

  if (loadTime > maxLoadTime) {
    throw new Error(`Page load time ${loadTime}ms exceeded maximum ${maxLoadTime}ms`);
  }

  return loadTime;
}

/**
 * Generate random test data
 * @param {string} prefix - Prefix for generated data
 */
function generateTestData(prefix = 'Test') {
  const timestamp = Date.now();
  return {
    title: `${prefix} ${timestamp}`,
    content: `This is test content for ${prefix} ${timestamp}`,
    slug: `${prefix.toLowerCase()}-${timestamp}`,
    status: 'published'
  };
}

module.exports = {
  loginToAdmin,
  waitForSuccessMessage,
  waitForErrorMessage,
  fillForm,
  submitFormAndWaitForSuccess,
  submitFormAndWaitForError,
  navigateToAdminSection,
  createTestData,
  editItem,
  deleteItem,
  viewItem,
  searchItems,
  filterByStatus,
  waitForPageLoad,
  generateTestData
};
