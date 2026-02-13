# PHP version – gallery with persistent uploads

This folder runs as a **PHP site** so you can upload photos and short videos from your phone or browser and have them **saved on the server** (they persist across devices).

---

## Step-by-step: how to run

### Option A – Run on your computer (local)

1. **Install PHP** (if you don’t have it):
   - **Windows:** Install [XAMPP](https://www.apachefriends.org/) or [PHP for Windows](https://windows.php.net/download/) and add PHP to your PATH.
   - **Mac:** PHP is often pre-installed; or run `brew install php`.
   - Check: open a terminal and run `php -v`. You should see a version number (e.g. 8.1).

2. **Open a terminal** and go into the project folder:
   ```text
   cd "C:\Users\admin\Downloads\josh-mj-main\josh-mj-main\mj & Josh"
   ```
   (Use your actual path if it’s different.)

3. **Start PHP’s built-in web server:**
   ```text
   php -S localhost:8080
   ```
   Leave this window open while you use the site.

4. **Open the site in your browser:**
   - Go to: **http://localhost:8080/index.php**
   - Enter the PIN (e.g. the one in your `script.js`).
   - Click **Gallery** in the nav and use “Add photos or short videos” to upload. Files are saved in the `uploads/` folder on your computer.

5. **To stop the server:** Press `Ctrl+C` in the terminal.

---

### Option B – Run on a web host (so you can use it from your phone)

1. **Get a hosting account** that supports PHP (e.g. shared hosting like Hostinger, Bluehost, InfinityFree, or a VPS).

2. **Upload the project:**
   - In your hosting file manager or via FTP, go to the **web root** (often `public_html`, `www`, or `htdocs`).
   - Upload the **entire contents** of the `mj & Josh` folder into that web root (so that `index.php`, `gallery.php`, `upload.php`, and the `api` folder are right inside the web root).

3. **Set the right URL:**
   - If you put the files in the root: open **https://yourdomain.com/index.php**
   - If you put them in a subfolder (e.g. `public_html/love`): open **https://yourdomain.com/love/index.php**

4. **Use the site:**
   - Open that URL on your phone or computer, enter the PIN, then go to **Gallery** and upload. Uploads are stored on the server and will persist.

5. **Optional:** Ask your host how to make `index.php` the default (so **https://yourdomain.com** opens the PIN page without typing `/index.php`).

---

## Quick reference

| Step | What to do |
|------|------------|
| Open site | **Local:** http://localhost:8080/index.php — **Online:** https://yourdomain.com/index.php (or /folder/index.php) |
| PIN | Same as in your `script.js` (e.g. 6 digits). |
| Gallery | Click **Gallery** in the nav, then “Add photos or short videos”. |
| Limits | Images max 10 MB; videos (MP4/WebM/MOV) max 50 MB. |
| Where files go | In the `uploads/` folder; list is in `gallery_data.json` (both created automatically). |

## Files added/used for PHP

| File / folder      | Purpose |
|--------------------|--------|
| `index.php`        | PIN landing (redirects to `home.php`) |
| `home.php`, `memories.php`, `gallery.php`, `message.php`, `reasons.php`, `music.php` | Same pages as `.html` but with `.php` nav links |
| `upload.php`       | Handles multipart uploads; saves files to `uploads/` and appends to `gallery_data.json` |
| `api/gallery.php`  | GET: list gallery items (JSON). GET `?delete=ID`: delete item and file |
| `gallery_data.json`| List of gallery items (id, type, url, createdAt). Created/updated by `upload.php` and `api/gallery.php` |
| `uploads/`         | Directory where uploaded images and videos are stored |
| `script.js`        | Updated so PIN success and “Continue” go to `home.php` |
| `gallery.js`       | Loads gallery from API, uploads via `upload.php`, supports images and videos, delete via API |

Your original HTML/CSS/JS and the Node `server.js` are unchanged; use the PHP files when you want server-side persistence.
