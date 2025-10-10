const { test, expect } = require('@playwright/test');

test.describe('Admin Projects Management', () => {
  test.beforeEach(async ({ page }) => {
    // Login first
    await page.goto('/login');
    await page.fill('input[name="email"]', 'admin@example.com');
    await page.fill('input[name="password"]', 'password');
    await page.click('button[type="submit"]');
    await page.waitForURL('/admin');
  });

  test('should display projects index', async ({ page }) => {
    await page.goto('/admin/projects');

    // Check for page title
    await expect(page.locator('h1, .page-title')).toContainText('Projects');

    // Check for create button
    await expect(page.locator('a[href*="create"], button:has-text("Create")')).toBeVisible();
  });

  test('should create a new project', async ({ page }) => {
    await page.goto('/admin/projects/create');

    // Fill in project details
    await page.fill('input[name="title"]', 'Test Project');
    await page.fill('textarea[name="description"]', 'This is a test project description');
    await page.fill('input[name="client"]', 'Test Client');
    await page.fill('input[name="location"]', 'Test Location');
    await page.fill('input[name="year"]', '2024');
    await page.selectOption('select[name="status"]', 'completed');

    // Submit form
    await page.click('button[type="submit"]');

    // Should redirect to projects index or show success message
    await expect(page).toHaveURL(/admin\/projects/);
    await expect(page.locator('.alert-success, .success')).toBeVisible();
  });

  test('should validate required fields', async ({ page }) => {
    await page.goto('/admin/projects/create');

    // Try to submit empty form
    await page.click('button[type="submit"]');

    // Check for validation errors
    await expect(page.locator('.error, .invalid-feedback, .text-red-500')).toBeVisible();
  });

  test('should edit existing project', async ({ page }) => {
    await page.goto('/admin/projects');

    // Click on first edit button
    await page.click('a[href*="edit"]:first-of-type');

    // Update project title
    await page.fill('input[name="title"]', 'Updated Test Project');

    // Submit form
    await page.click('button[type="submit"]');

    // Should show success message
    await expect(page.locator('.alert-success, .success')).toBeVisible();
  });

  test('should view project details', async ({ page }) => {
    await page.goto('/admin/projects');

    // Click on first view button
    await page.click('a[href*="show"]:first-of-type');

    // Check for project details
    await expect(page.locator('h1, .page-title')).toBeVisible();
    await expect(page.locator('.project-content, .content')).toBeVisible();
  });

  test('should delete project', async ({ page }) => {
    await page.goto('/admin/projects');

    // Click on first delete button
    await page.click('button[data-action="delete"], .delete-btn:first-of-type');

    // Confirm deletion
    await page.click('button:has-text("Confirm"), button:has-text("Delete")');

    // Should show success message
    await expect(page.locator('.alert-success, .success')).toBeVisible();
  });
});
