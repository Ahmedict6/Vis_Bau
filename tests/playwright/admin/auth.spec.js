const { test, expect } = require('@playwright/test');

test.describe('Admin Authentication', () => {
  test.beforeEach(async ({ page }) => {
    // Navigate to admin dashboard
    await page.goto('/admin');
  });

  test('should redirect to login when not authenticated', async ({ page }) => {
    // Check if redirected to login page
    await expect(page).toHaveURL(/login/);
  });

  test('should display login form elements', async ({ page }) => {
    await page.goto('/login');

    // Check for login form elements
    await expect(page.locator('input[name="email"]')).toBeVisible();
    await expect(page.locator('input[name="password"]')).toBeVisible();
    await expect(page.locator('button[type="submit"]')).toBeVisible();
  });

  test('should show validation errors for empty fields', async ({ page }) => {
    await page.goto('/login');

    // Try to submit empty form
    await page.click('button[type="submit"]');

    // Check for validation errors
    await expect(page.locator('.error, .invalid-feedback, .text-red-500')).toBeVisible();
  });

  test('should show error for invalid credentials', async ({ page }) => {
    await page.goto('/login');

    // Fill in invalid credentials
    await page.fill('input[name="email"]', 'invalid@example.com');
    await page.fill('input[name="password"]', 'wrongpassword');
    await page.click('button[type="submit"]');

    // Check for error message
    await expect(page.locator('.alert-danger, .error, .text-red-500')).toBeVisible();
  });

  test('should login successfully with valid credentials', async ({ page }) => {
    await page.goto('/login');

    // Fill in valid credentials (you may need to adjust these based on your test data)
    await page.fill('input[name="email"]', 'admin@example.com');
    await page.fill('input[name="password"]', 'password');
    await page.click('button[type="submit"]');

    // Should redirect to admin dashboard
    await expect(page).toHaveURL('/admin');
    await expect(page.locator('h1, .dashboard-title')).toContainText('Dashboard');
  });

  test('should logout successfully', async ({ page }) => {
    // First login
    await page.goto('/login');
    await page.fill('input[name="email"]', 'admin@example.com');
    await page.fill('input[name="password"]', 'password');
    await page.click('button[type="submit"]');

    // Wait for dashboard
    await expect(page).toHaveURL('/admin');

    // Look for logout button/link
    const logoutButton = page.locator('a[href*="logout"], button:has-text("Logout"), .logout');
    await expect(logoutButton).toBeVisible();

    // Click logout
    await logoutButton.click();

    // Should redirect to login
    await expect(page).toHaveURL(/login/);
  });
});
