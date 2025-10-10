const { test, expect } = require('@playwright/test');

test.describe('Admin Brand Logos Management', () => {
  test.beforeEach(async ({ page }) => {
    // Login first
    await page.goto('/login');
    await page.fill('input[name="email"]', 'admin@example.com');
    await page.fill('input[name="password"]', 'password');
    await page.click('button[type="submit"]');
    await page.waitForURL('/admin');
  });

  test('should display brand logos index', async ({ page }) => {
    await page.goto('/admin/brand-logos');

    // Check for page title
    await expect(page.locator('h1, .page-title')).toContainText('Brand Logos');

    // Check for create button
    await expect(page.locator('a[href*="create"], button:has-text("Create")')).toBeVisible();
  });

  test('should create a new brand logo', async ({ page }) => {
    await page.goto('/admin/brand-logos/create');

    // Fill in brand logo details
    await page.fill('input[name="name"]', 'Test Brand');
    await page.fill('input[name="website"]', 'https://testbrand.com');
    await page.selectOption('select[name="status"]', 'active');

    // Submit form
    await page.click('button[type="submit"]');

    // Should redirect to brand logos index or show success message
    await expect(page).toHaveURL(/admin\/brand-logos/);
    await expect(page.locator('.alert-success, .success')).toBeVisible();
  });

  test('should validate required fields', async ({ page }) => {
    await page.goto('/admin/brand-logos/create');

    // Try to submit empty form
    await page.click('button[type="submit"]');

    // Check for validation errors
    await expect(page.locator('.error, .invalid-feedback, .text-red-500')).toBeVisible();
  });

  test('should edit existing brand logo', async ({ page }) => {
    await page.goto('/admin/brand-logos');

    // Click on first edit button
    await page.click('a[href*="edit"]:first-of-type');

    // Update brand name
    await page.fill('input[name="name"]', 'Updated Test Brand');

    // Submit form
    await page.click('button[type="submit"]');

    // Should show success message
    await expect(page.locator('.alert-success, .success')).toBeVisible();
  });

  test('should view brand logo details', async ({ page }) => {
    await page.goto('/admin/brand-logos');

    // Click on first view button
    await page.click('a[href*="show"]:first-of-type');

    // Check for brand logo details
    await expect(page.locator('h1, .page-title')).toBeVisible();
    await expect(page.locator('.brand-content, .content')).toBeVisible();
  });

  test('should delete brand logo', async ({ page }) => {
    await page.goto('/admin/brand-logos');

    // Click on first delete button
    await page.click('button[data-action="delete"], .delete-btn:first-of-type');

    // Confirm deletion
    await page.click('button:has-text("Confirm"), button:has-text("Delete")');

    // Should show success message
    await expect(page.locator('.alert-success, .success')).toBeVisible();
  });
});
