const { test, expect } = require('@playwright/test');

test.describe('Admin Dashboard', () => {
  test.beforeEach(async ({ page }) => {
    // Login first
    await page.goto('/login');
    await page.fill('input[name="email"]', 'admin@example.com');
    await page.fill('input[name="password"]', 'password');
    await page.click('button[type="submit"]');
    await page.waitForURL('/admin');
  });

  test('should display dashboard with statistics', async ({ page }) => {
    await page.goto('/admin');

    // Check for dashboard title
    await expect(page.locator('h1, .dashboard-title')).toContainText('Dashboard');

    // Check for statistics cards
    await expect(page.locator('.stat-card, .card')).toHaveCount(11); // Based on the stats in DashboardController

    // Check for specific stat cards
    await expect(page.locator('text=Pages')).toBeVisible();
    await expect(page.locator('text=Services')).toBeVisible();
    await expect(page.locator('text=Projects')).toBeVisible();
    await expect(page.locator('text=Blog Posts')).toBeVisible();
    await expect(page.locator('text=Contact Messages')).toBeVisible();
    await expect(page.locator('text=Hero Sliders')).toBeVisible();
    await expect(page.locator('text=Facts')).toBeVisible();
    await expect(page.locator('text=Testimonials')).toBeVisible();
    await expect(page.locator('text=Team Members')).toBeVisible();
    await expect(page.locator('text=Job Listings')).toBeVisible();
    await expect(page.locator('text=Brand Logos')).toBeVisible();
  });

  test('should display recent contact messages', async ({ page }) => {
    await page.goto('/admin');

    // Check for recent messages section
    await expect(page.locator('text=Recent Messages, text=Latest Messages')).toBeVisible();

    // Check for messages list
    await expect(page.locator('.message-item, .contact-message')).toBeVisible();
  });

  test('should have navigation menu', async ({ page }) => {
    await page.goto('/admin');

    // Check for navigation menu items
    const navItems = [
      'Dashboard',
      'Pages',
      'Services',
      'Projects',
      'Blog Posts',
      'Contact Messages',
      'Hero Sliders',
      'Facts',
      'Testimonials',
      'Team Members',
      'Job Listings',
      'Brand Logos'
    ];

    for (const item of navItems) {
      await expect(page.locator(`text=${item}`)).toBeVisible();
    }
  });

  test('should navigate to different admin sections', async ({ page }) => {
    await page.goto('/admin');

    // Test navigation to pages
    await page.click('a[href*="pages"]');
    await expect(page).toHaveURL(/admin\/pages/);

    // Test navigation to services
    await page.goto('/admin');
    await page.click('a[href*="services"]');
    await expect(page).toHaveURL(/admin\/services/);

    // Test navigation to projects
    await page.goto('/admin');
    await page.click('a[href*="projects"]');
    await expect(page).toHaveURL(/admin\/projects/);
  });
});
