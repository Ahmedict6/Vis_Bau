const { test, expect } = require('@playwright/test');

test.describe('Admin Testimonials Management', () => {
  test.beforeEach(async ({ page }) => {
    // Login first
    await page.goto('/login');
    await page.fill('input[name="email"]', 'admin@example.com');
    await page.fill('input[name="password"]', 'password');
    await page.click('button[type="submit"]');
    await page.waitForURL('/admin');
  });

  test('should display testimonials index', async ({ page }) => {
    await page.goto('/admin/testimonials');

    // Check for page title
    await expect(page.locator('h1, .page-title')).toContainText('Testimonials');

    // Check for create button
    await expect(page.locator('a[href*="create"], button:has-text("Create")')).toBeVisible();
  });

  test('should create a new testimonial', async ({ page }) => {
    await page.goto('/admin/testimonials/create');

    // Fill in testimonial details
    await page.fill('input[name="name"]', 'John Doe');
    await page.fill('input[name="position"]', 'CEO');
    await page.fill('input[name="company"]', 'Test Company');
    await page.fill('textarea[name="content"]', 'This is a great service!');
    await page.fill('input[name="rating"]', '5');
    await page.selectOption('select[name="status"]', 'active');

    // Submit form
    await page.click('button[type="submit"]');

    // Should redirect to testimonials index or show success message
    await expect(page).toHaveURL(/admin\/testimonials/);
    await expect(page.locator('.alert-success, .success')).toBeVisible();
  });

  test('should validate required fields', async ({ page }) => {
    await page.goto('/admin/testimonials/create');

    // Try to submit empty form
    await page.click('button[type="submit"]');

    // Check for validation errors
    await expect(page.locator('.error, .invalid-feedback, .text-red-500')).toBeVisible();
  });

  test('should edit existing testimonial', async ({ page }) => {
    await page.goto('/admin/testimonials');

    // Click on first edit button
    await page.click('a[href*="edit"]:first-of-type');

    // Update testimonial name
    await page.fill('input[name="name"]', 'Updated John Doe');

    // Submit form
    await page.click('button[type="submit"]');

    // Should show success message
    await expect(page.locator('.alert-success, .success')).toBeVisible();
  });

  test('should view testimonial details', async ({ page }) => {
    await page.goto('/admin/testimonials');

    // Click on first view button
    await page.click('a[href*="show"]:first-of-type');

    // Check for testimonial details
    await expect(page.locator('h1, .page-title')).toBeVisible();
    await expect(page.locator('.testimonial-content, .content')).toBeVisible();
  });

  test('should delete testimonial', async ({ page }) => {
    await page.goto('/admin/testimonials');

    // Click on first delete button
    await page.click('button[data-action="delete"], .delete-btn:first-of-type');

    // Confirm deletion
    await page.click('button:has-text("Confirm"), button:has-text("Delete")');

    // Should show success message
    await expect(page.locator('.alert-success, .success')).toBeVisible();
  });
});
