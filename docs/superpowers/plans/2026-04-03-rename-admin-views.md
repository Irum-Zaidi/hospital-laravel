# Rename Admin View Directory Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Rename `resources/views/Admin` to `resources/views/admin` and update all view references in the codebase to use lowercase `admin`.

**Architecture:** This is a straightforward renaming task. We'll rename the directory and then update all references in controllers and blade files.

**Tech Stack:** Laravel (PHP, Blade)

---

### Task 1: Rename the Directory

**Files:**
- Rename: `resources/views/Admin` to `resources/views/admin`

- [ ] **Step 1: Rename the directory**

Run: `mv resources/views/Admin resources/views/admin` (or equivalent on Windows)
Expected: `resources/views/admin` exists, `resources/views/Admin` does not.

- [ ] **Step 2: Verify the rename**

Run: `ls resources/views/admin`
Expected: Files `add_doctors.blade.php`, `dashboard.blade.php`, `mainbody.blade.php`, `maindesign.blade.php` are listed.

### Task 2: Update View References in AdminController

**Files:**
- Modify: `app/Http/Controllers/AdminController.php`

- [ ] **Step 1: Update view names in AdminController**

Replace:
```php
    public function Dashboard()
    {
        return view('Admin.dashboard');
    }

    public function AddDoctors()
    {
        return view('Admin.add_doctors');
    }
```
With:
```php
    public function Dashboard()
    {
        return view('admin.dashboard');
    }

    public function AddDoctors()
    {
        return view('admin.add_doctors');
    }
```

- [ ] **Step 2: Commit changes**

Run: `git add app/Http/Controllers/AdminController.php`
Run: `git commit -m "refactor: update admin view references in AdminController"`

### Task 3: Update View References in Blade Files

**Files:**
- Modify: `resources/views/admin/dashboard.blade.php`
- Modify: `resources/views/admin/add_doctors.blade.php`

- [ ] **Step 1: Update references in dashboard.blade.php**

Replace:
```blade
@extends('Admin.maindesign')

@section('admin_dashboard')

    @include('Admin.mainbody')

@endsection
```
With:
```blade
@extends('admin.maindesign')

@section('admin_dashboard')

    @include('admin.mainbody')

@endsection
```

- [ ] **Step 2: Update references in add_doctors.blade.php**

Replace:
```blade
@extends('Admin.maindesign')
```
With:
```blade
@extends('admin.maindesign')
```

- [ ] **Step 3: Commit changes**

Run: `git add resources/views/admin/dashboard.blade.php resources/views/admin/add_doctors.blade.php`
Run: `git commit -m "refactor: update admin view references in blade files"`

### Task 4: Final Verification

- [ ] **Step 1: Search for any remaining Admin. references**

Run: `grep -r "Admin\." .`
Expected: No matches (or only unrelated ones).

- [ ] **Step 2: Final commit for the rename (if using git mv)**

Run: `git add resources/views/admin`
Run: `git commit -m "refactor: rename Admin view directory to admin"`
