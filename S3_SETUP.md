# Image Storage Fix for Render Deployment

## Problem

Images displayed correctly locally but not on Render because Render's filesystem is **ephemeral** (temporary). Any files uploaded after deployment are lost on each restart.

## Solution

Configure **S3 (or S3-compatible storage)** for persistent file storage on Render.

## Setup Steps

### 1. Choose Your Storage Provider

#### Option A: AWS S3 (Recommended)

- Create an AWS S3 bucket
- Create an IAM user with S3 permissions
- Get your Access Key ID and Secret Access Key

#### Option B: Supabase Storage (Easier)

- Go to [Supabase](https://supabase.com) (free tier available)
- Create a new project
- Go to Storage tab
- Create a bucket named `public`
- Generate an API key

#### Option C: Cloudflare R2

- Go to [Cloudflare R2](https://www.cloudflare.com/products/r2/) (free tier: 10GB/month)
- Create a bucket
- Generate API credentials

### 2. Get Required Credentials

For your chosen provider, you'll need:

- `AWS_ACCESS_KEY_ID` - Your API key
- `AWS_SECRET_ACCESS_KEY` - Your API secret
- `AWS_DEFAULT_REGION` - e.g., `us-east-1`
- `AWS_BUCKET` - Your bucket name
- `AWS_URL` - Your public bucket URL (e.g., `https://mybucket.s3.amazonaws.com`)

#### For Supabase

- `AWS_URL` = `https://<project-id>.supabase.co/storage/v1/object/public/<bucket-name>`

### 3. Set Environment Variables on Render

In your Render Dashboard:

1. Go to your service settings
2. Navigate to **Environment**
3. Add these variables:

```bash
STORAGE_DRIVER=s3
AWS_ACCESS_KEY_ID=your_key_here
AWS_SECRET_ACCESS_KEY=your_secret_here
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=your-bucket-name
AWS_URL=https://your-bucket-url
AWS_ENDPOINT=your-endpoint (if using R2 or Supabase)
AWS_USE_PATH_STYLE_ENDPOINT=false
```

### 4. Redeploy

Push your changes or trigger a new deployment on Render. The storage configuration will now use S3 instead of local storage.

### 5. Test

1. Upload a news image
2. Verify it appears
3. Restart the service
4. Verify the image still loads (it won't with local storage!)

## Files Changed

- `laravel/config/filesystems.php` - Updated `public` disk to support both local and S3
- `laravel/.env.example` - Added `STORAGE_DRIVER` variable

## Local Development

Your local development continues to use local storage:

- Keep `STORAGE_DRIVER=local` (or omitted) in your `.env`
- Images are stored in `storage/app/public/`
- The storage symlink (created by `php artisan storage:link`) makes them accessible at `/storage/`

## Troubleshooting

**Images not showing after upload?**

1. Check `STORAGE_DRIVER` is set to `s3` on Render
2. Verify AWS credentials are correct
3. Check bucket name matches `AWS_BUCKET`
4. Look for errors in Render logs

**Old images not loading?**

They're still in local storage. You may need to:

1. Re-upload them using the admin panel
2. Or manually copy old images to S3

**How to check what's being used?**

In your `.env`:

- `STORAGE_DRIVER=local` → Uses local filesystem (Render ephemeral, will be lost)
- `STORAGE_DRIVER=s3` → Uses S3 (persistent, survives restarts)
