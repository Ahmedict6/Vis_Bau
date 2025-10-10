const { test, expect } = require('@playwright/test');

test.describe('Admin Services Management', () => {
  test.beforeEach(async ({ page }) => {
    // Login first
    await page.goto('/login');
    await page.fill('input[name="email"]', 'admin@example.com');
    await page.fill('input[name="password"]', 'password');
    await page.click('button[type="submit"]');
    await page.waitForURL('/admin');
  });

  test('should display services index', async ({ page }) => {
    await page.goto('/admin/services');

    // Check for page title
    await expect(page.locator('h1, .page-title')).toContainText('Services');

    // Check for create button
    await expect(page.locator('a[href*="create"], button:has-text("Create")')).toBeVisible();
  });

  test('should create a new service', async ({ page }) => {
    await page.goto('/admin/services/create');

    // Fill in service details
    await page.fill('input[name="title"]', 'Test Service');
    await page.fill('textarea[name="description"]', 'This is a test service description');
    await page.fill('input[name="icon"]', 'fas fa-cog');
    await page.selectOption('select[name="status"]', 'active');

    // Submit form
    await page.click('button[type="submit"]');

    // Should redirect to services index or show success message
    await expect(page).toHaveURL(/admin\/services/);
    await expect(page.locator('.alert-success, .success')).toBeVisible();
  });

  test('should validate required fields', async ({ page }) => {
    await page.goto('/admin/services/create');

    // Try to submit empty form
    await page.click('button[type="submit"]');

    // Check for validation errors
    await expect(page.locator('.error, .invalid-feedback, .text-red-500')).toBeVisible();
  });

  test('should edit existing service', async ({ page }) => {
    await page.goto('/admin/services');

    // Click on first edit button
    await page.click('a[href*="edit"]:first-of-type');

    // Update service title
    await page.fill('input[name="title"]', 'Updated Test Service');

    // Submit form
    await page.click('button[type="submit"]');

    // Should show success message
    await expect(page.locator('.alert-success, .success')).toBeVisible();
  });

  test('should view service details', async ({ page }) => {
    await page.goto('/admin/services');

    // Click on first view button
    await page.click('a[href*="show"]:first-of-type');

    // Check for service details
    await expect(page.locator('h1, .page-title')).toBeVisible();
    await expect(page.locator('.service-content, .content')).toBeVisible();
  });

  test('should delete service', async ({ page }) => {
    await page.goto('/admin/services');

    // Click on first delete button
    await page.click('button[data-action="delete"], .delete-btn:first-of-type');

    // Confirm deletion
    await page.click('button:has-text("Confirm"), button:has-text("Delete")');

    // Should show success message
    await expect(page.locator('.alert-success, .success')).toBeVisible();
  });
});
