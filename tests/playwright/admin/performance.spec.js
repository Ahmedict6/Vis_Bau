const { test, expect } = require('@playwright/test');

test.describe('Admin Performance Tests', () => {
  test.beforeEach(async ({ page }) => {
    // Login first
    await page.goto('/login');
    await page.fill('input[name="email"]', 'admin@example.com');
    await page.fill('input[name="password"]', 'password');
    await page.click('button[type="submit"]');
    await page.waitForURL('/admin');
  });

  test('should load dashboard within acceptable time', async ({ page }) => {
    const startTime = Date.now();
    await page.goto('/admin');
    await expect(page.locator('h1, .dashboard-title')).toContainText('Dashboard');
    const loadTime = Date.now() - startTime;

    // Dashboard should load within 3 seconds
    expect(loadTime).toBeLessThan(3000);
  });

  test('should load pages index within acceptable time', async ({ page }) => {
    const startTime = Date.now();
    await page.goto('/admin/pages');
    await expect(page.locator('h1, .page-title')).toContainText('Pages');
    const loadTime = Date.now() - startTime;

    // Pages index should load within 2 seconds
    expect(loadTime).toBeLessThan(2000);
  });

  test('should load services index within acceptable time', async ({ page }) => {
    const startTime = Date.now();
    await page.goto('/admin/services');
    await expect(page.locator('h1, .page-title')).toContainText('Services');
    const loadTime = Date.now() - startTime;

    // Services index should load within 2 seconds
    expect(loadTime).toBeLessThan(2000);
  });

  test('should load projects index within acceptable time', async ({ page }) => {
    const startTime = Date.now();
    await page.goto('/admin/projects');
    await expect(page.locator('h1, .page-title')).toContainText('Projects');
    const loadTime = Date.now() - startTime;

    // Projects index should load within 2 seconds
    expect(loadTime).toBeLessThan(2000);
  });

  test('should load blog posts index within acceptable time', async ({ page }) => {
    const startTime = Date.now();
    await page.goto('/admin/blog-posts');
    await expect(page.locator('h1, .page-title')).toContainText('Blog Posts');
    const loadTime = Date.now() - startTime;

    // Blog posts index should load within 2 seconds
    expect(loadTime).toBeLessThan(2000);
  });

  test('should handle large datasets efficiently', async ({ page }) => {
    // Create multiple items to test pagination and performance
    const items = Array.from({ length: 20 }, (_, i) => `Performance Test ${i + 1}`);

    for (const item of items) {
      await page.goto('/admin/pages/create');
      await page.fill('input[name="title"]', item);
      await page.fill('textarea[name="content"]', `Content for ${item}`);
      await page.fill('input[name="slug"]', item.toLowerCase().replace(/\s+/g, '-'));
      await page.selectOption('select[name="status"]', 'published');
      await page.click('button[type="submit"]');
      await expect(page.locator('.alert-success, .success')).toBeVisible();
    }

    // Test loading the index with many items
    const startTime = Date.now();
    await page.goto('/admin/pages');
    await expect(page.locator('h1, .page-title')).toContainText('Pages');
    const loadTime = Date.now() - startTime;

    // Should still load within acceptable time even with many items
    expect(loadTime).toBeLessThan(5000);
  });

  test('should handle concurrent operations', async ({ page, context }) => {
    // Create multiple browser contexts to simulate concurrent users
    const contexts = await Promise.all([
      context.newPage(),
      context.newPage(),
      context.newPage()
    ]);

    // Login all contexts
    for (const contextPage of contexts) {
      await contextPage.goto('/login');
      await contextPage.fill('input[name="email"]', 'admin@example.com');
      await contextPage.fill('input[name="password"]', 'password');
      await contextPage.click('button[type="submit"]');
      await contextPage.waitForURL('/admin');
    }

    // Perform concurrent operations
    const operations = [
      contexts[0].goto('/admin/pages'),
      contexts[1].goto('/admin/services'),
      contexts[2].goto('/admin/projects')
    ];

    await Promise.all(operations);

    // Verify all pages loaded successfully
    await expect(contexts[0].locator('h1, .page-title')).toContainText('Pages');
    await expect(contexts[1].locator('h1, .page-title')).toContainText('Services');
    await expect(contexts[2].locator('h1, .page-title')).toContainText('Projects');
  });
});
