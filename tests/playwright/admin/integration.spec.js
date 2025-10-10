const { test, expect } = require('@playwright/test');

test.describe('Admin Integration Workflows', () => {
  test.beforeEach(async ({ page }) => {
    // Login first
    await page.goto('/login');
    await page.fill('input[name="email"]', 'admin@example.com');
    await page.fill('input[name="password"]', 'password');
    await page.click('button[type="submit"]');
    await page.waitForURL('/admin');
  });

  test('should complete full content management workflow', async ({ page }) => {
    // 1. Create a new page
    await page.goto('/admin/pages/create');
    await page.fill('input[name="title"]', 'Integration Test Page');
    await page.fill('textarea[name="content"]', 'This is a test page for integration testing');
    await page.fill('input[name="slug"]', 'integration-test-page');
    await page.selectOption('select[name="status"]', 'published');
    await page.click('button[type="submit"]');
    await expect(page.locator('.alert-success, .success')).toBeVisible();

    // 2. Create a new service
    await page.goto('/admin/services/create');
    await page.fill('input[name="title"]', 'Integration Test Service');
    await page.fill('textarea[name="description"]', 'This is a test service for integration testing');
    await page.fill('input[name="icon"]', 'fas fa-cog');
    await page.selectOption('select[name="status"]', 'active');
    await page.click('button[type="submit"]');
    await expect(page.locator('.alert-success, .success')).toBeVisible();

    // 3. Create a new project
    await page.goto('/admin/projects/create');
    await page.fill('input[name="title"]', 'Integration Test Project');
    await page.fill('textarea[name="description"]', 'This is a test project for integration testing');
    await page.fill('input[name="client"]', 'Test Client');
    await page.fill('input[name="location"]', 'Test Location');
    await page.fill('input[name="year"]', '2024');
    await page.selectOption('select[name="status"]', 'completed');
    await page.click('button[type="submit"]');
    await expect(page.locator('.alert-success, .success')).toBeVisible();

    // 4. Create a new blog post
    await page.goto('/admin/blog-posts/create');
    await page.fill('input[name="title"]', 'Integration Test Blog Post');
    await page.fill('textarea[name="excerpt"]', 'This is a test blog post excerpt');
    await page.fill('textarea[name="content"]', 'This is the full content of the test blog post.');
    await page.fill('input[name="slug"]', 'integration-test-blog-post');
    await page.selectOption('select[name="status"]', 'published');
    await page.click('button[type="submit"]');
    await expect(page.locator('.alert-success, .success')).toBeVisible();

    // 5. Verify all items were created by checking dashboard
    await page.goto('/admin');
    await expect(page.locator('text=Integration Test Page')).toBeVisible();
    await expect(page.locator('text=Integration Test Service')).toBeVisible();
    await expect(page.locator('text=Integration Test Project')).toBeVisible();
    await expect(page.locator('text=Integration Test Blog Post')).toBeVisible();
  });

  test('should manage content lifecycle', async ({ page }) => {
    // Create content
    await page.goto('/admin/pages/create');
    await page.fill('input[name="title"]', 'Lifecycle Test Page');
    await page.fill('textarea[name="content"]', 'This is a test page for lifecycle testing');
    await page.fill('input[name="slug"]', 'lifecycle-test-page');
    await page.selectOption('select[name="status"]', 'draft');
    await page.click('button[type="submit"]');
    await expect(page.locator('.alert-success, .success')).toBeVisible();

    // Edit content
    await page.goto('/admin/pages');
    await page.click('a[href*="edit"]:first-of-type');
    await page.fill('input[name="title"]', 'Updated Lifecycle Test Page');
    await page.selectOption('select[name="status"]', 'published');
    await page.click('button[type="submit"]');
    await expect(page.locator('.alert-success, .success')).toBeVisible();

    // View content
    await page.goto('/admin/pages');
    await page.click('a[href*="show"]:first-of-type');
    await expect(page.locator('h1, .page-title')).toContainText('Updated Lifecycle Test Page');

    // Delete content
    await page.goto('/admin/pages');
    await page.click('button[data-action="delete"], .delete-btn:first-of-type');
    await page.click('button:has-text("Confirm"), button:has-text("Delete")');
    await expect(page.locator('.alert-success, .success')).toBeVisible();
  });

  test('should handle bulk operations', async ({ page }) => {
    // Create multiple items
    const items = ['Bulk Test 1', 'Bulk Test 2', 'Bulk Test 3'];

    for (const item of items) {
      await page.goto('/admin/pages/create');
      await page.fill('input[name="title"]', item);
      await page.fill('textarea[name="content"]', `Content for ${item}`);
      await page.fill('input[name="slug"]', item.toLowerCase().replace(/\s+/g, '-'));
      await page.selectOption('select[name="status"]', 'published');
      await page.click('button[type="submit"]');
      await expect(page.locator('.alert-success, .success')).toBeVisible();
    }

    // Verify all items exist
    await page.goto('/admin/pages');
    for (const item of items) {
      await expect(page.locator(`text=${item}`)).toBeVisible();
    }
  });

  test('should handle search and filtering', async ({ page }) => {
    // Create test data
    await page.goto('/admin/pages/create');
    await page.fill('input[name="title"]', 'Search Test Page');
    await page.fill('textarea[name="content"]', 'This is a test page for search functionality');
    await page.fill('input[name="slug"]', 'search-test-page');
    await page.selectOption('select[name="status"]', 'published');
    await page.click('button[type="submit"]');
    await expect(page.locator('.alert-success, .success')).toBeVisible();

    // Test search functionality
    await page.goto('/admin/pages');
    const searchInput = page.locator('input[name="search"], .search-input');
    if (await searchInput.isVisible()) {
      await searchInput.fill('Search Test');
      await page.click('button:has-text("Search")');
      await expect(page.locator('text=Search Test Page')).toBeVisible();
    }

    // Test filtering
    const filterSelect = page.locator('select[name="status"], .filter-select');
    if (await filterSelect.isVisible()) {
      await filterSelect.selectOption('published');
      await page.click('button:has-text("Filter")');
      await expect(page.locator('text=Search Test Page')).toBeVisible();
    }
  });

  test('should handle navigation between admin sections', async ({ page }) => {
    const sections = [
      { name: 'Pages', url: '/admin/pages' },
      { name: 'Services', url: '/admin/services' },
      { name: 'Projects', url: '/admin/projects' },
      { name: 'Blog Posts', url: '/admin/blog-posts' },
      { name: 'Contact Messages', url: '/admin/contact-messages' },
      { name: 'Hero Sliders', url: '/admin/hero-sliders' },
      { name: 'Facts', url: '/admin/fun-facts' },
      { name: 'Testimonials', url: '/admin/testimonials' },
      { name: 'Team Members', url: '/admin/team-members' },
      { name: 'Job Listings', url: '/admin/job-listings' },
      { name: 'Brand Logos', url: '/admin/brand-logos' }
    ];

    for (const section of sections) {
      await page.goto(section.url);
      await expect(page.locator('h1, .page-title')).toContainText(section.name);

      // Check for create button
      await expect(page.locator('a[href*="create"], button:has-text("Create")')).toBeVisible();
    }
  });

  test('should handle error scenarios gracefully', async ({ page }) => {
    // Test invalid form submission
    await page.goto('/admin/pages/create');
    await page.click('button[type="submit"]');
    await expect(page.locator('.error, .invalid-feedback, .text-red-500')).toBeVisible();

    // Test navigation to non-existent item
    await page.goto('/admin/pages/999999');
    // Should show 404 or error message
    await expect(page.locator('text=Not Found, text=404, text=Error')).toBeVisible();
  });
});
