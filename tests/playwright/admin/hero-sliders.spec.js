const { test, expect } = require('@playwright/test');

test.describe('Admin Hero Sliders Management', () => {
  test.beforeEach(async ({ page }) => {
    // Login first
    await page.goto('/login');
    await page.fill('input[name="email"]', 'admin@example.com');
    await page.fill('input[name="password"]', 'password');
    await page.click('button[type="submit"]');
    await page.waitForURL('/admin');
  });

  test('should display hero sliders index', async ({ page }) => {
    await page.goto('/admin/hero-sliders');

    // Check for page title
    await expect(page.locator('h1, .page-title')).toContainText('Hero Sliders');

    // Check for create button
    await expect(page.locator('a[href*="create"], button:has-text("Create")')).toBeVisible();
  });

  test('should create a new hero slider', async ({ page }) => {
    await page.goto('/admin/hero-sliders/create');

    // Fill in hero slider details
    await page.fill('input[name="title"]', 'Test Hero Slider');
    await page.fill('textarea[name="description"]', 'This is a test hero slider description');
    await page.fill('input[name="button_text"]', 'Learn More');
    await page.fill('input[name="button_url"]', '/about');
    await page.selectOption('select[name="status"]', 'active');

    // Submit form
    await page.click('button[type="submit"]');

    // Should redirect to hero sliders index or show success message
    await expect(page).toHaveURL(/admin\/hero-sliders/);
    await expect(page.locator('.alert-success, .success')).toBeVisible();
  });

  test('should validate required fields', async ({ page }) => {
    await page.goto('/admin/hero-sliders/create');

    // Try to submit empty form
    await page.click('button[type="submit"]');

    // Check for validation errors
    await expect(page.locator('.error, .invalid-feedback, .text-red-500')).toBeVisible();
  });

  test('should edit existing hero slider', async ({ page }) => {
    await page.goto('/admin/hero-sliders');

    // Click on first edit button
    await page.click('a[href*="edit"]:first-of-type');

    // Update hero slider title
    await page.fill('input[name="title"]', 'Updated Test Hero Slider');

    // Submit form
    await page.click('button[type="submit"]');

    // Should show success message
    await expect(page.locator('.alert-success, .success')).toBeVisible();
  });

  test('should view hero slider details', async ({ page }) => {
    await page.goto('/admin/hero-sliders');

    // Click on first view button
    await page.click('a[href*="show"]:first-of-type');

    // Check for hero slider details
    await expect(page.locator('h1, .page-title')).toBeVisible();
    await expect(page.locator('.hero-content, .content')).toBeVisible();
  });

  test('should delete hero slider', async ({ page }) => {
    await page.goto('/admin/hero-sliders');

    // Click on first delete button
    await page.click('button[data-action="delete"], .delete-btn:first-of-type');

    // Confirm deletion
    await page.click('button:has-text("Confirm"), button:has-text("Delete")');

    // Should show success message
    await expect(page.locator('.alert-success, .success')).toBeVisible();
  });
});
