<?php
// Header chung cho toàn bộ website
// Bạn có thể thêm logic PHP tùy chỉnh ở đây

// Default values - bạn có thể override từ file gọi header
$page_title = $page_title ?? 'AirAgent Admin';
$page_description = $page_description ?? 'Hệ thống quản lý các đại lý bán vé';
$css_files = $css_files ?? ['../css/main.css'];
$current_page = $current_page ?? '';
$username = $username ?? 'User';
$role = $role ?? 'User';
$displayName = ucfirst($username);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?= htmlspecialchars($page_title) ?></title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Custom CSS Files -->
  <?php foreach ($css_files as $css_file): ?>
  <link rel="stylesheet" href="<?= htmlspecialchars($css_file) ?>" />
  <?php endforeach; ?>

  <!-- Page specific styles -->
  <?php if (isset($page_styles)): ?>
  <style>
    <?= $page_styles ?>
  </style>
  <?php endif; ?>
</head>
<body>
  <div class="container-xxl py-4">
    <!-- Header -->
    <header class="d-flex align-items-center justify-content-between mb-4 px-3 py-3 rounded">
      <div class="d-flex align-items-center gap-3">
        <div class="brand-logo d-flex align-items-center justify-content-center">
          <i class="bi bi-airplane-fill text-white fs-4"></i>
        </div>
        <div>
          <h1 class="h5 mb-0">
            <a href="<?= ($current_page === 'main') ? '#' : '../main.php' ?>" class="text-decoration-none text-inherit">
              AirAgent Admin
            </a>
          </h1>
          <div class="text-muted small"><?= htmlspecialchars($page_description) ?></div>
        </div>
      </div>

      <div class="d-flex align-items-center gap-3">
        <!-- Theme toggle -->
        <div class="form-check form-switch m-0">
          <input class="form-check-input" type="checkbox" id="themeToggle" />
          <label class="form-check-label small" for="themeToggle" id="themeLabel">Sáng</label>
        </div>

        <!-- User Info -->
        <div class="dropdown">
          <button class="btn btn-outline-secondary btn-sm dropdown-toggle d-flex align-items-center gap-2" 
                  type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="user-avatar">
              <i class="bi bi-person-circle fs-5"></i>
            </div>
            <div class="d-none d-md-block text-start">
              <div class="fw-semibold small"><?= htmlspecialchars($displayName) ?></div>
              <div class="text-muted small"><?= htmlspecialchars($role) ?></div>
            </div>
          </button>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
            <li>
              <div class="dropdown-header">
                <div class="fw-semibold"><?= htmlspecialchars($displayName) ?></div>
                <div class="text-muted small"><?= htmlspecialchars($role) ?></div>
              </div>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <a class="dropdown-item" href="<?= ($current_page === 'main') ? '#' : '../main.php' ?>">
                <i class="bi bi-house-door me-2"></i>Dashboard
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="#" onclick="alert('Chức năng đang phát triển')">
                <i class="bi bi-person me-2"></i>Hồ sơ cá nhân
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="#" onclick="alert('Chức năng đang phát triển')">
                <i class="bi bi-gear me-2"></i>Cài đặt
              </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <a class="dropdown-item text-danger" href="../handle/logout.php">
                
                <i class="bi bi-box-arrow-right me-2"></i>Đăng xuất
              </a>
            </li>
          </ul>
        </div>
      </div>
    </header>

    <!-- Breadcrumb (if provided) -->
    <?php if (isset($breadcrumbs) && !empty($breadcrumbs)): ?>
    <nav aria-label="breadcrumb" class="mb-4">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?= ($current_page === 'main') ? '#' : '../main.php' ?>">
            <i class="bi bi-house-door me-1"></i>Trang chủ
          </a>
        </li>
        <?php foreach ($breadcrumbs as $index => $breadcrumb): ?>
          <?php if ($index === count($breadcrumbs) - 1): ?>
            <li class="breadcrumb-item active" aria-current="page">
              <?= htmlspecialchars($breadcrumb['title']) ?>
            </li>
          <?php else: ?>
            <li class="breadcrumb-item">
              <a href="<?= htmlspecialchars($breadcrumb['url']) ?>">
                <?= htmlspecialchars($breadcrumb['title']) ?>
              </a>
            </li>
          <?php endif; ?>
        <?php endforeach; ?>
      </ol>
    </nav>
    <?php endif; ?>

    <!-- Page Title -->
    <?php if (isset($show_page_title) && $show_page_title): ?>
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <h2 class="h4 mb-1"><?= htmlspecialchars($page_title) ?></h2>
        <?php if (isset($page_subtitle)): ?>
        <p class="text-muted mb-0"><?= htmlspecialchars($page_subtitle) ?></p>
        <?php endif; ?>
      </div>
      <?php if (isset($page_actions)): ?>
      <div class="d-flex gap-2">
        <?= $page_actions ?>
      </div>
      <?php endif; ?>
    </div>
    <?php endif; ?>

    <!-- Alert Messages Container - Bạn có thể thêm logic hiển thị thông báo ở đây -->
    <div id="alertContainer">
      <!-- PHP Alert messages sẽ được insert ở đây -->
    </div>

    <!-- Main Content Starts Here -->