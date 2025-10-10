const { test, expect } = require('@playwright/test');

test.describe('Admin Team Members Management', () => {
  test.beforeEach(async ({ page }) => {
    // Login first
    await page.goto('/login');
    await page.fill('input[name="email"]', 'admin@example.com');
    await page.fill('input[name="password"]', 'password');
    await page.click('button[type="submit"]');
    await page.waitForURL('/admin');
  });

  test('should display team members index', async ({ page }) => {
    await page.goto('/admin/team-members');

    // Check for page title
    await expect(page.locator('h1, .page-title')).toContainText('Team Members');

    // Check for create button
    await expect(page.locator('a[href*="create"], button:has-text("Create")')).toBeVisible();
  });

  test('should create a new team member', async ({ page }) => {
    await page.goto('/admin/team-members/create');

    // Fill in team member details
    await page.fill('input[name="name"]', 'John Smith');
    await page.fill('input[name="position"]', 'Project Manager');
    await page.fill('textarea[name="bio"]', 'Experienced project manager with 10 years of experience');
    await page.fill('input[name="email"]', 'john@example.com');
    await page.fill('input[name="phone"]', '+1234567890');
    await page.selectOption('select[name="status"]', 'active');

    // Submit form
    await page.click('button[type="submit"]');

    // Should redirect to team members index or show success message
    await expect(page).toHaveURL(/admin\/team-members/);
    await expect(page.locator('.alert-success, .success')).toBeVisible();
  });

  test('should validate required fields', async ({ page }) => {
    await page.goto('/admin/team-members/create');

    // Try to submit empty form
    await page.click('button[type="submit"]');

    // Check for validation errors
    await expect(page.locator('.error, .invalid-feedback, .text-red-500')).toBeVisible();
  });

  test('should edit existing team member', async ({ page }) => {
    await page.goto('/admin/team-members');

    // Click on first edit button
    await page.click('a[href*="edit"]:first-of-type');

    // Update team member name
    await page.fill('input[name="name"]', 'Updated John Smith');

    // Submit form
    await page.click('button[type="submit"]');

    // Should show success message
    await expect(page.locator('.alert-success, .success')).toBeVisible();
  });

  test('should view team member details', async ({ page }) => {
    await page.goto('/admin/team-members');

    // Click on first view button
    await page.click('a[href*="show"]:first-of-type');

    // Check for team member details
    await expect(page.locator('h1, .page-title')).toBeVisible();
    await expect(page.locator('.team-member-content, .content')).toBeVisible();
  });

  test('should delete team member', async ({ page }) => {
    await page.goto('/admin/team-members');

    // Click on first delete button
    await page.click('button[data-action="delete"], .delete-btn:first-of-type');

    // Confirm deletion
    await page.click('button:has-text("Confirm"), button:has-text("Delete")');

    // Should show success message
    await expect(page.locator('.alert-success, .success')).toBeVisible();
  });
});
