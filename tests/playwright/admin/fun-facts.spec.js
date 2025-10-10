const { test, expect } = require('@playwright/test');

test.describe('Admin Facts Management', () => {
  test.beforeEach(async ({ page }) => {
    // Login first
    await page.goto('/login');
    await page.fill('input[name="email"]', 'admin@example.com');
    await page.fill('input[name="password"]', 'password');
    await page.click('button[type="submit"]');
    await page.waitForURL('/admin');
  });

  test('should display Facts index', async ({ page }) => {
    await page.goto('/admin/fun-facts');

    // Check for page title
    await expect(page.locator('h1, .page-title')).toContainText('Facts');

    // Check for create button
    await expect(page.locator('a[href*="create"], button:has-text("Create")')).toBeVisible();
  });

  test('should create a new fun fact', async ({ page }) => {
    await page.goto('/admin/fun-facts/create');

    // Fill in fun fact details
    await page.fill('input[name="title"]', 'Years of Experience');
    await page.fill('input[name="number"]', '15');
    await page.fill('input[name="icon"]', 'fas fa-award');
    await page.selectOption('select[name="status"]', 'active');

    // Submit form
    await page.click('button[type="submit"]');

    // Should redirect to Facts index or show success message
    await expect(page).toHaveURL(/admin\/fun-facts/);
    await expect(page.locator('.alert-success, .success')).toBeVisible();
  });

  test('should validate required fields', async ({ page }) => {
    await page.goto('/admin/fun-facts/create');

    // Try to submit empty form
    await page.click('button[type="submit"]');

    // Check for validation errors
    await expect(page.locator('.error, .invalid-feedback, .text-red-500')).toBeVisible();
  });

  test('should edit existing fun fact', async ({ page }) => {
    await page.goto('/admin/fun-facts');

    // Click on first edit button
    await page.click('a[href*="edit"]:first-of-type');

    // Update fun fact title
    await page.fill('input[name="title"]', 'Updated Years of Experience');

    // Submit form
    await page.click('button[type="submit"]');

    // Should show success message
    await expect(page.locator('.alert-success, .success')).toBeVisible();
  });

  test('should view fun fact details', async ({ page }) => {
    await page.goto('/admin/fun-facts');

    // Click on first view button
    await page.click('a[href*="show"]:first-of-type');

    // Check for fun fact details
    await expect(page.locator('h1, .page-title')).toBeVisible();
    await expect(page.locator('.fun-fact-content, .content')).toBeVisible();
  });

  test('should delete fun fact', async ({ page }) => {
    await page.goto('/admin/fun-facts');

    // Click on first delete button
    await page.click('button[data-action="delete"], .delete-btn:first-of-type');

    // Confirm deletion
    await page.click('button:has-text("Confirm"), button:has-text("Delete")');

    // Should show success message
    await expect(page.locator('.alert-success, .success')).toBeVisible();
  });
});
