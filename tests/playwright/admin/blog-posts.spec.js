const { test, expect } = require('@playwright/test');

test.describe('Admin Blog Posts Management', () => {
  test.beforeEach(async ({ page }) => {
    // Login first
    await page.goto('/login');
    await page.fill('input[name="email"]', 'admin@example.com');
    await page.fill('input[name="password"]', 'password');
    await page.click('button[type="submit"]');
    await page.waitForURL('/admin');
  });

  test('should display blog posts index', async ({ page }) => {
    await page.goto('/admin/blog-posts');

    // Check for page title
    await expect(page.locator('h1, .page-title')).toContainText('Blog Posts');

    // Check for create button
    await expect(page.locator('a[href*="create"], button:has-text("Create")')).toBeVisible();
  });

  test('should create a new blog post', async ({ page }) => {
    await page.goto('/admin/blog-posts/create');

    // Fill in blog post details
    await page.fill('input[name="title"]', 'Test Blog Post');
    await page.fill('textarea[name="excerpt"]', 'This is a test blog post excerpt');
    await page.fill('textarea[name="content"]', 'This is the full content of the test blog post.');
    await page.fill('input[name="slug"]', 'test-blog-post');
    await page.selectOption('select[name="status"]', 'published');

    // Submit form
    await page.click('button[type="submit"]');

    // Should redirect to blog posts index or show success message
    await expect(page).toHaveURL(/admin\/blog-posts/);
    await expect(page.locator('.alert-success, .success')).toBeVisible();
  });

  test('should validate required fields', async ({ page }) => {
    await page.goto('/admin/blog-posts/create');

    // Try to submit empty form
    await page.click('button[type="submit"]');

    // Check for validation errors
    await expect(page.locator('.error, .invalid-feedback, .text-red-500')).toBeVisible();
  });

  test('should edit existing blog post', async ({ page }) => {
    await page.goto('/admin/blog-posts');

    // Click on first edit button
    await page.click('a[href*="edit"]:first-of-type');

    // Update blog post title
    await page.fill('input[name="title"]', 'Updated Test Blog Post');

    // Submit form
    await page.click('button[type="submit"]');

    // Should show success message
    await expect(page.locator('.alert-success, .success')).toBeVisible();
  });

  test('should view blog post details', async ({ page }) => {
    await page.goto('/admin/blog-posts');

    // Click on first view button
    await page.click('a[href*="show"]:first-of-type');

    // Check for blog post details
    await expect(page.locator('h1, .page-title')).toBeVisible();
    await expect(page.locator('.blog-content, .content')).toBeVisible();
  });

  test('should delete blog post', async ({ page }) => {
    await page.goto('/admin/blog-posts');

    // Click on first delete button
    await page.click('button[data-action="delete"], .delete-btn:first-of-type');

    // Confirm deletion
    await page.click('button:has-text("Confirm"), button:has-text("Delete")');

    // Should show success message
    await expect(page.locator('.alert-success, .success')).toBeVisible();
  });
});
