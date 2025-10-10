const { test, expect } = require('@playwright/test');

test.describe('Admin Job Listings Management', () => {
  test.beforeEach(async ({ page }) => {
    // Login first
    await page.goto('/login');
    await page.fill('input[name="email"]', 'admin@example.com');
    await page.fill('input[name="password"]', 'password');
    await page.click('button[type="submit"]');
    await page.waitForURL('/admin');
  });

  test('should display job listings index', async ({ page }) => {
    await page.goto('/admin/job-listings');

    // Check for page title
    await expect(page.locator('h1, .page-title')).toContainText('Job Listings');

    // Check for create button
    await expect(page.locator('a[href*="create"], button:has-text("Create")')).toBeVisible();
  });

  test('should create a new job listing', async ({ page }) => {
    await page.goto('/admin/job-listings/create');

    // Fill in job listing details
    await page.fill('input[name="title"]', 'Senior Developer');
    await page.fill('textarea[name="description"]', 'We are looking for a senior developer to join our team');
    await page.fill('input[name="location"]', 'Remote');
    await page.fill('input[name="salary"]', '$80,000 - $100,000');
    await page.fill('input[name="company"]', 'Tech Company');
    await page.selectOption('select[name="type"]', 'full-time');
    await page.selectOption('select[name="status"]', 'active');

    // Submit form
    await page.click('button[type="submit"]');

    // Should redirect to job listings index or show success message
    await expect(page).toHaveURL(/admin\/job-listings/);
    await expect(page.locator('.alert-success, .success')).toBeVisible();
  });

  test('should validate required fields', async ({ page }) => {
    await page.goto('/admin/job-listings/create');

    // Try to submit empty form
    await page.click('button[type="submit"]');

    // Check for validation errors
    await expect(page.locator('.error, .invalid-feedback, .text-red-500')).toBeVisible();
  });

  test('should edit existing job listing', async ({ page }) => {
    await page.goto('/admin/job-listings');

    // Click on first edit button
    await page.click('a[href*="edit"]:first-of-type');

    // Update job title
    await page.fill('input[name="title"]', 'Updated Senior Developer');

    // Submit form
    await page.click('button[type="submit"]');

    // Should show success message
    await expect(page.locator('.alert-success, .success')).toBeVisible();
  });

  test('should view job listing details', async ({ page }) => {
    await page.goto('/admin/job-listings');

    // Click on first view button
    await page.click('a[href*="show"]:first-of-type');

    // Check for job listing details
    await expect(page.locator('h1, .page-title')).toBeVisible();
    await expect(page.locator('.job-content, .content')).toBeVisible();
  });

  test('should delete job listing', async ({ page }) => {
    await page.goto('/admin/job-listings');

    // Click on first delete button
    await page.click('button[data-action="delete"], .delete-btn:first-of-type');

    // Confirm deletion
    await page.click('button:has-text("Confirm"), button:has-text("Delete")');

    // Should show success message
    await expect(page.locator('.alert-success, .success')).toBeVisible();
  });
});
