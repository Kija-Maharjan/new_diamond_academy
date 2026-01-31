# New Diamond Academy - Admin Panel Setup Guide

## 🎉 Complete Admin Management System Created!

### **Admin Credentials**
- **Email:** maharjankija@gmail.com
- **Password:** kija<3980089

---

## 🚀 Features Available

## New Diamond Academy - Admin Panel Setup Guide

## 🎉 Complete Admin Management System Created!

### **Admin Credentials**

- **Email:** maharjankija@gmail.com
- **Password:** kija<3980089

---

## 🚀 Features Available

### **1. Admin Dashboard**

Access: `/admin` (when logged in)

**Dashboard Statistics:**

- Total Users Count
- News Articles Published
- Recommendations Received
- Total Administrators

**Management Tools:**

- News Management
- Recommendations Management
- User Management
- System Settings

---

### **2. News Management**

Access: `/news`

**Features:**

- ✅ Create new articles with modal form
- ✅ Add featured images to articles
- ✅ Edit existing articles
- ✅ Delete articles (with confirmation)
- ✅ View all published articles
- ✅ Filter by author
- ✅ Modern card-based layout

**Create Article Form:**

- Article title
- Rich content editor
- Image upload (max 2MB)
- Live preview
- Auto-save draft support

---

### **3. Recommendations Management**

Access: `/recommendations`

**Features:**

- ✅ View all submitted recommendations
- ✅ Download attachments
- ✅ Delete recommendations
- ✅ Mark as read
- ✅ Export data (CSV/JSON)
- ✅ View sender information

**Admin Actions:**

- Delete inappropriate recommendations
- Manage recommendations from users/anonymous

---

### **4. User Management**

Access: Admin Dashboard → User Management Modal

**Features:**

- ✅ View all registered users
- ✅ Promote users to admin status
- ✅ Remove admin privileges
- ✅ View user roles and status
- ✅ User statistics

**User Actions:**

- Make Admin: Grants full administrative access
- Remove Admin: Reverts to regular user

---

### **5. System Settings**

Access: Admin Dashboard → Settings Modal

**Information Displayed:**

- Academy Name
- System Status
- Database Connection Status
- Laravel Version
- Current Date/Time

---

## 🛠️ How to Use

### **Login to Admin Panel**

1. Go to the website login page
2. Enter credentials:

```text
Email: maharjankija@gmail.com
Password: kija<3980089
```

3. Click "Sign In"
4. Navigate to "Admin Panel" from user menu

### **Create a News Article**

1. Go to `/news` or click "Manage News" from admin dashboard
2. Click "Add New Article" button
3. Fill in:

   - Article title
   - Article content
   - Optional featured image

4. Click "Publish Article"
5. Article appears on the news page

### **Manage News**

1. Go to `/news`
2. Click "View/Edit" on any article card
3. Options:

   - Edit: Update title, content, or image
   - Delete: Remove article (with confirmation)

### **Review Recommendations**

1. Go to `/recommendations` or click from admin dashboard
2. View all submitted recommendations
3. Actions:

   - Download attachment (if available)
   - Mark as read
   - Delete recommendation

### **Manage Users**

1. Click on admin dropdown menu
2. Select "Admin Panel"
3. Click "User Management" button
4. View all users in table
5. Actions:

   - Make Admin: Grant admin privileges
   - Remove Admin: Revoke admin privileges

---

## 📊 Database Models

### **User Model**
```php
- id
- name
- email (unique)
- password (hashed)
- is_admin (boolean)
- created_at
- updated_at
```

### **News Model**
```php
- id
- title
- body
- image (path to storage)
- user_id (author)
- created_at
- updated_at
```

### **Recommendation Model**
```php
- id
- note
- name (optional)
- email (optional)
- user_id (optional)
- attachment_path (optional)
- created_at
- updated_at
```

---

## 🔒 Security Features

1. **Admin Middleware:** All admin routes require admin status
2. **Authentication Check:** Users must be logged in
3. **Password Hashing:** All passwords are securely hashed
4. **CSRF Protection:** All forms have CSRF tokens
5. **File Validation:** Image/file uploads are validated
6. **Authorization:** Users can only edit their own content (admins can edit all)

---

## 🎨 UI/UX Features

### **Design Elements:**

- Bootstrap 5.3 framework
- Font Awesome icons
- Smooth animations and transitions
- Responsive design (mobile-friendly)
- Gradient backgrounds
- Card-based layouts
- Modal dialogs for complex forms

### **Color Scheme:**

- Primary: Blue (#0d6efd)
- Success: Green (#198754)
- Warning: Yellow (#ffc107)
- Danger: Red (#dc3545)
- Info: Cyan (#0dcaf0)

### **Animations:**

- Slide-down navbar
- Fade-in content
- Card hover effects
- Button ripple effects
- Modal transitions

---

## 📝 Routes Summary

```text
GET    /                      - Home page
GET    /login                 - Login page
POST   /login                 - Process login
GET    /register              - Registration page
POST   /register              - Create new account
POST   /logout                - Logout user

GET    /admin                 - Admin dashboard
POST   /admin/toggle-admin/{user} - Toggle admin status

GET    /news                  - View all news
POST   /news                  - Create news article
GET    /news/{id}/edit        - Edit news form
PUT    /news/{id}             - Update news
DELETE /news/{id}             - Delete news

GET    /recommendations/create - Create recommendation form
POST   /recommendations       - Submit recommendation
GET    /recommendations       - View all (admin only)
DELETE /recommendations/{id}  - Delete recommendation (admin only)
GET    /recommendations/{id}/attachment - Download file

GET    /slider               - View team/founder slider
```

---

## ✅ What You Can Do Now

1. **Create Accounts** - Users can self-register
2. **Manage Content** - Edit/delete news articles
3. **Review Feedback** - View and manage recommendations
4. **Manage Users** - Promote users to admin
5. **System Control** - Full admin access to all features

---

## 📧 Support

For any issues or questions:
1. Check that you're logged in with admin credentials
2. Ensure JavaScript is enabled for modals
3. Clear browser cache if experiencing display issues
4. Check file permissions for uploads

---

## 🔄 Database Migrations

All tables are created with the following commands:
```bash
php artisan migrate
php artisan db:seed --class=AdminUserSeeder
```

The admin user has been seeded with the provided credentials.

---

**Admin Panel Setup: Complete! ✅**

You now have a fully functional web-based admin panel to manage all academy content.
