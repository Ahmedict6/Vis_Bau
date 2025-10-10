const { test, expect } = require('@playwright/test');

test.describe('Admin Pages Management', () => {
  test.beforeEach(async ({ page }) => {
    // Login first
    await page.goto('/login');
    await page.fill('input[name="email"]', 'admin@example.com');
    await page.fill('input[name="password"]', 'password');
    await page.click('button[type="submit"]');
    await page.waitForURL('/admin');
  });

  test('should display pages index', async ({ page }) => {
    await page.goto('/admin/pages');

    // Check for page title
    await expect(page.locator('h1, .page-title')).toContainText('Pages');

    // Check for create button
    await expect(page.locator('a[href*="create"], button:has-text("Create")')).toBeVisible();
  });

  test('should create a new page', async ({ page }) => {
    await page.goto('/admin/pages/create');

    // Fill in page details
    await page.fill('input[name="title"]', 'Test Page');
    await page.fill('textarea[name="content"]', 'This is test page content');
    await page.fill('input[name="slug"]', 'test-page');
    await page.selectOption('select[name="status"]', 'published');

    // Submit form
    await page.click('button[type="submit"]');

    // Should redirect to pages index or show success message
    await expect(page).toHaveURL(/admin\/pages/);
    await expect(page.locator('.alert-success, .success')).toBeVisible();
  });

  test('should validate required fields', async ({ page }) => {
    await page.goto('/admin/pages/create');

    // Try to submit empty form
    await page.click('button[type="submit"]');

    // Check for validation errors
    await expect(page.locator('.error, .invalid-feedback, .text-red-500')).toBeVisible();
  });

  test('should edit existing page', async ({ page }) => {
    await page.goto('/admin/pages');

    // Click on first edit button
    await page.click('a[href*="edit"]:first-of-type');

    // Update page title
    await page.fill('input[name="title"]', 'Updated Test Page');

    // Submit form
    await page.click('button[type="submit"]');

    // Should show success message
    await expect(page.locator('.alert-success, .success')).toBeVisible();
  });

  test('should view page details', async ({ page }) => {
    await page.goto('/admin/pages');

    // Click on first view button
    await page.click('a[href*="show"]:first-of-type');

    // Check for page details
    await expect(page.locator('h1, .page-title')).toBeVisible();
    await expect(page.locator('.page-content, .content')).toBeVisible();
  });

  test('should delete page', async ({ page }) => {
    await page.goto('/admin/pages');

    // Click on first delete button
    await page.click('button[data-action="delete"], .delete-btn:first-of-type');

    // Confirm deletion
    await page.click('button:has-text("Confirm"), button:has-text("Delete")');

    // Should show success message
    await expect(page.locator('.alert-success, .success')).toBeVisible();
  });
});
