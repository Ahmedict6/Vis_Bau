const { test, expect } = require('@playwright/test');

test.describe('Admin Contact Messages Management', () => {
  test.beforeEach(async ({ page }) => {
    // Login first
    await page.goto('/login');
    await page.fill('input[name="email"]', 'admin@example.com');
    await page.fill('input[name="password"]', 'password');
    await page.click('button[type="submit"]');
    await page.waitForURL('/admin');
  });

  test('should display contact messages index', async ({ page }) => {
    await page.goto('/admin/contact-messages');

    // Check for page title
    await expect(page.locator('h1, .page-title')).toContainText('Contact Messages');

    // Check for messages list
    await expect(page.locator('.message-item, .contact-message')).toBeVisible();
  });

  test('should view contact message details', async ({ page }) => {
    await page.goto('/admin/contact-messages');

    // Click on first view button
    await page.click('a[href*="show"]:first-of-type');

    // Check for message details
    await expect(page.locator('h1, .page-title')).toBeVisible();
    await expect(page.locator('.message-content, .content')).toBeVisible();

    // Check for message fields
    await expect(page.locator('text=Name, text=Email, text=Subject, text=Message')).toBeVisible();
  });

  test('should mark message as read', async ({ page }) => {
    await page.goto('/admin/contact-messages');

    // Look for unread message and mark as read
    const unreadMessage = page.locator('.unread, .message-unread').first();
    if (await unreadMessage.isVisible()) {
      await unreadMessage.click();
      await page.click('button:has-text("Mark as Read")');
      await expect(page.locator('.alert-success, .success')).toBeVisible();
    }
  });

  test('should delete contact message', async ({ page }) => {
    await page.goto('/admin/contact-messages');

    // Click on first delete button
    await page.click('button[data-action="delete"], .delete-btn:first-of-type');

    // Confirm deletion
    await page.click('button:has-text("Confirm"), button:has-text("Delete")');

    // Should show success message
    await expect(page.locator('.alert-success, .success')).toBeVisible();
  });

  test('should filter messages by status', async ({ page }) => {
    await page.goto('/admin/contact-messages');

    // Check for filter options
    const filterSelect = page.locator('select[name="status"], .filter-select');
    if (await filterSelect.isVisible()) {
      await filterSelect.selectOption('unread');
      await page.click('button:has-text("Filter")');

      // Should show filtered results
      await expect(page.locator('.message-item')).toBeVisible();
    }
  });

  test('should search messages', async ({ page }) => {
    await page.goto('/admin/contact-messages');

    // Check for search input
    const searchInput = page.locator('input[name="search"], .search-input');
    if (await searchInput.isVisible()) {
      await searchInput.fill('test');
      await page.click('button:has-text("Search")');

      // Should show search results
      await expect(page.locator('.message-item')).toBeVisible();
    }
  });
});
