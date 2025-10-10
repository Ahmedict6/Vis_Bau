# VIS GmbH - Construction Website Management System

A comprehensive Content Management System built with Laravel for construction companies. This CMS allows you to manage all aspects of your construction website including hero sliders, services, projects, testimonials, team members, job listings, and more.

## 🚀 Features

### Frontend Features
- **Dynamic Hero Slider** - Manage multiple hero slides with custom content and images
- **Services Management** - Showcase your construction services with detailed descriptions
- **Projects Portfolio** - Display your completed projects with galleries
- **Team Members** - Introduce your team with photos and social links
- **Job Listings** - Post and manage job openings
- **Testimonials** - Show customer feedback and reviews
- **Facts/Statistics** - Display company achievements and numbers
- **Brand Logos** - Showcase partner/client logos
- **Blog System** - Publish articles and news
- **Contact Form** - Handle customer inquiries

### Admin Panel Features
- **Comprehensive Dashboard** - Overview of all content with statistics
- **Content Management** - Full CRUD operations for all content types
- **Media Management** - Upload and manage images
- **SEO Optimization** - Meta titles, descriptions, and slugs
- **Content Ordering** - Sort content by priority
- **Publish/Unpublish** - Control content visibility
- **Responsive Design** - Mobile-friendly admin interface

## 📋 Content Types

### 1. Hero Sliders
- Title and subtitle
- Description text
- Call-to-action button
- Background image
- Sort order and active status

### 2. Facts/Statistics
- Title (e.g., "Projects", "Clients")
- Number value
- Icon image
- Sort order and active status

### 3. Testimonials
- Customer name and designation
- Testimonial content
- Customer photo
- Sort order and active status

### 4. Team Members
- Name and position
- Bio/description
- Photo
- Contact information (email, phone)
- Social media links
- Sort order and active status

### 5. Job Listings
- Job title and description
- Location and job type
- Requirements and benefits
- Salary range
- Application deadline
- Sort order and active status

### 6. Brand Logos
- Company name
- Logo image
- Website URL
- Sort order and active status

### 7. Services
- Title and description
- Detailed content
- Icon and featured image
- Features list
- Pricing information
- Sort order and publish status

### 8. Projects
- Title and description
- Featured image and gallery
- Client and location
- Completion date
- Project type
- Featured status
- Sort order and publish status

### 9. Blog Posts
- Title and excerpt
- Full content
- Featured image
- Author and category
- Tags
- Publish date
- SEO meta data

### 10. Pages
- Static pages (About, Privacy Policy, etc.)
- Title and content
- SEO meta data
- Publish status

## 🛠️ Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd saly-cms
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database setup**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

5. **Start the server**
   ```bash
   php artisan serve
   ```

## 🔧 Configuration

### Database
Update your `.env` file with your database credentials:
```env
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database.sqlite
```

### Admin Access
Default admin credentials:
- **Email:** admin@salycms.com
- **Password:** password

### Asset Management
All static assets (CSS, JS, images) are stored in the `public/assets/` directory and managed through Laravel's `asset()` helper.

## 📁 Directory Structure

```
saly-cms/
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/          # Admin controllers
│   │   └── ...            # Frontend controllers
│   └── Models/            # Eloquent models
├── database/
│   ├── migrations/        # Database migrations
│   └── seeders/          # Database seeders
├── public/
│   └── assets/           # Static assets (CSS, JS, images)
├── resources/
│   └── views/
│       ├── admin/        # Admin panel views
│       ├── layouts/      # Blade layouts
│       └── ...           # Frontend views
└── routes/
    └── web.php           # Application routes
```

## 🎨 Customization

### Adding New Content Types
1. Create a new model: `php artisan make:model NewContentType -m`
2. Create migration with required fields
3. Create admin controller: `php artisan make:controller Admin/NewContentTypeController --resource`
4. Add routes to `routes/web.php`
5. Create admin views for CRUD operations
6. Update the home controller and view to display the content

### Styling
- The frontend uses the Constrk template styling
- Admin panel uses Bootstrap 5 with custom CSS
- All styles are in the `public/assets/css/` directory

### Images
- Hero slider images: `public/assets/img/slider/`
- Service images: `public/assets/img/service/`
- Project images: `public/assets/img/projects/`
- Team images: `public/assets/img/team/`
- Testimonial images: `public/assets/img/testimonial/`
- Brand logos: `public/assets/img/brand-logo/`
- Icons: `public/assets/img/icons/`

## 🔐 Security

- All admin routes should be protected with authentication middleware
- Input validation on all forms
- CSRF protection enabled
- SQL injection protection through Eloquent ORM

## 📱 Responsive Design

The CMS is fully responsive and works on:
- Desktop computers
- Tablets
- Mobile phones

## 🚀 Deployment

1. **Production environment setup**
   ```bash
   composer install --optimize-autoloader --no-dev
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

2. **Web server configuration**
   - Point document root to `public/` directory
   - Configure URL rewriting for Laravel

3. **Database setup**
   - Create production database
   - Run migrations: `php artisan migrate --force`
   - Seed initial data: `php artisan db:seed --force`

## 📊 Admin Panel Usage

### Dashboard
- View statistics for all content types
- Recent contact messages
- Quick access to all management sections

### Content Management
1. Navigate to the desired content type in the sidebar
2. Use "Create New" to add content
3. Edit existing content by clicking on items
4. Use sort order to arrange content display
5. Toggle active/published status as needed

### Media Management
- Upload images through the admin forms
- Images are automatically stored in appropriate directories
- Use descriptive filenames for better organization

## 🔄 Updates and Maintenance

### Regular Tasks
- Backup database regularly
- Update Laravel and dependencies
- Monitor server resources
- Review and respond to contact messages

### Content Updates
- Keep hero slider content fresh
- Update project portfolio regularly
- Maintain current job listings
- Refresh testimonials periodically

## 📞 Support

For technical support or questions about the CMS:
- Check the Laravel documentation
- Review the code comments
- Test changes in a development environment first

## 📄 License

This project is proprietary software. All rights reserved.

---

**VIS GmbH** - Professional Construction Website Management System
Built with Laravel and Bootstrap
# Vis_Bau
