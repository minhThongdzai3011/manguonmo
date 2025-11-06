<?php
// Page configuration
$page_title = 'Quản lý vé máy bay - AirAgent Admin';
$page_description = 'Hệ thống quản lý sản phẩm vé máy bay';
$current_page = 'product';
$css_files = ['../../css/main.css', '../../css/product.css'];
$js_files = ['../../js/product.js'];

$username = 'Admin';
$role = 'Administrator';

$products = [
    [
        'id' => 1,
        'product_code' => 'VN001',
        'product_name' => 'Hà Nội - TP.HCM (Economy)',
        'image' => 'https://images.unsplash.com/photo-1436491865332-7a61a109cc05?w=400',
        'price' => 2500000,
        'ticket_quantity' => 150,
        'departure' => 'Hà Nội (HAN)',
        'arrival' => 'TP.HCM (SGN)',
        'airline' => 'Vietnam Airlines',
        'flight_time' => '2h 15m',
        'aircraft' => 'Boeing 737-800',
        'status' => 'available',
        'discount' => 0
    ],
    [
        'id' => 2,
        'product_code' => 'VJ002',
        'product_name' => 'TP.HCM - Đà Nẵng (Economy)',
        'image' => 'https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?w=400',
        'price' => 1800000,
        'ticket_quantity' => 89,
        'departure' => 'TP.HCM (SGN)',
        'arrival' => 'Đà Nẵng (DAD)',
        'airline' => 'VietJet Air',
        'flight_time' => '1h 30m',
        'aircraft' => 'Airbus A320',
        'status' => 'available',
        'discount' => 15
    ],
    [
        'id' => 3,
        'product_code' => 'BB003',
        'product_name' => 'Hà Nội - Phú Quốc (Business)',
        'image' => 'https://images.unsplash.com/photo-1569154941061-e231b4725ef1?w=400',
        'price' => 5200000,
        'ticket_quantity' => 24,
        'departure' => 'Hà Nội (HAN)',
        'arrival' => 'Phú Quốc (PQC)',
        'airline' => 'Bamboo Airways',
        'flight_time' => '2h 45m',
        'aircraft' => 'Boeing 787-9',
        'status' => 'available',
        'discount' => 10
    ],
    [
        'id' => 4,
        'product_code' => 'VN004',
        'product_name' => 'Đà Nẵng - Hà Nội (Premium)',
        'image' => 'https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=400',
        'price' => 3400000,
        'ticket_quantity' => 67,
        'departure' => 'Đà Nẵng (DAD)',
        'arrival' => 'Hà Nội (HAN)',
        'airline' => 'Vietnam Airlines',
        'flight_time' => '1h 25m',
        'aircraft' => 'Airbus A350',
        'status' => 'available',
        'discount' => 5
    ],
    [
        'id' => 5,
        'product_code' => 'VJ005',
        'product_name' => 'TP.HCM - Nha Trang (Economy)',
        'image' => 'https://images.unsplash.com/photo-1570197788417-0e82375c9371?w=400',
        'price' => 1650000,
        'ticket_quantity' => 45,
        'departure' => 'TP.HCM (SGN)',
        'arrival' => 'Nha Trang (CXR)',
        'airline' => 'VietJet Air',
        'flight_time' => '1h 10m',
        'aircraft' => 'Airbus A321',
        'status' => 'low_stock',
        'discount' => 20
    ],
    [
        'id' => 6,
        'product_code' => 'BB006',
        'product_name' => 'Hà Nội - Côn Đảo (Economy)',
        'image' => 'https://images.unsplash.com/photo-1473625247510-8ceb1760943f?w=400',
        'price' => 2200000,
        'ticket_quantity' => 8,
        'departure' => 'Hà Nội (HAN)',
        'arrival' => 'Côn Đảo (VCS)',
        'airline' => 'Bamboo Airways',
        'flight_time' => '2h 00m',
        'aircraft' => 'ATR 72-500',
        'status' => 'low_stock',
        'discount' => 0
    ],
    [
        'id' => 7,
        'product_code' => 'VN007',
        'product_name' => 'TP.HCM - Quy Nhon (Business)',
        'image' => 'https://images.unsplash.com/photo-1544620286-51f87be0b7fa?w=400',
        'price' => 4100000,
        'ticket_quantity' => 0,
        'departure' => 'TP.HCM (SGN)',
        'arrival' => 'Quy Nhon (UIH)',
        'airline' => 'Vietnam Airlines',
        'flight_time' => '1h 35m',
        'aircraft' => 'Boeing 737 MAX',
        'status' => 'out_of_stock',
        'discount' => 0
    ],
    [
        'id' => 8,
        'product_code' => 'VJ008',
        'product_name' => 'Hà Nội - Cần Thơ (Economy)',
        'image' => 'https://images.unsplash.com/photo-1511593358241-7eea1f3c84e5?w=400',
        'price' => 2100000,
        'ticket_quantity' => 95,
        'departure' => 'Hà Nội (HAN)',
        'arrival' => 'Cần Thơ (VCA)',
        'airline' => 'VietJet Air',
        'flight_time' => '2h 20m',
        'aircraft' => 'Airbus A320',
        'status' => 'available',
        'discount' => 12
    ]
];

// Xử lý search và filter
$searchQuery = isset($_GET['q']) ? trim($_GET['q']) : '';
$airlineFilter = isset($_GET['airline']) ? $_GET['airline'] : '';
$priceFilter = isset($_GET['price_range']) ? $_GET['price_range'] : '';
$statusFilter = isset($_GET['status']) ? $_GET['status'] : '';

if (!empty($searchQuery) || !empty($airlineFilter) || !empty($priceFilter) || !empty($statusFilter)) {
    $filteredProducts = [];
    foreach ($products as $product) {
        $matchSearch = empty($searchQuery) || 
                      stripos($product['product_name'], $searchQuery) !== false ||
                      stripos($product['product_code'], $searchQuery) !== false ||
                      stripos($product['departure'], $searchQuery) !== false ||
                      stripos($product['arrival'], $searchQuery) !== false;
        
        $matchAirline = empty($airlineFilter) || $product['airline'] === $airlineFilter;
        $matchStatus = empty($statusFilter) || $product['status'] === $statusFilter;
        
        $matchPrice = true;
        if (!empty($priceFilter)) {
            switch ($priceFilter) {
                case 'under_2m':
                    $matchPrice = $product['price'] < 2000000;
                    break;
                case '2m_3m':
                    $matchPrice = $product['price'] >= 2000000 && $product['price'] < 3000000;
                    break;
                case '3m_5m':
                    $matchPrice = $product['price'] >= 3000000 && $product['price'] < 5000000;
                    break;
                case 'over_5m':
                    $matchPrice = $product['price'] >= 5000000;
                    break;
            }
        }
        
        if ($matchSearch && $matchAirline && $matchPrice && $matchStatus) {
            $filteredProducts[] = $product;
        }
    }
    $products = $filteredProducts;
}

// Tính toán statistics
$totalProducts = count($products);
$availableProducts = 0;
$lowStockProducts = 0;
$outOfStockProducts = 0;
$totalTickets = 0;
$totalValue = 0;

foreach ($products as $product) {
    switch ($product['status']) {
        case 'available':
            $availableProducts++;
            break;
        case 'low_stock':
            $lowStockProducts++;
            break;
        case 'out_of_stock':
            $outOfStockProducts++;
            break;
    }
    $totalTickets += $product['ticket_quantity'];
    $totalValue += $product['price'] * $product['ticket_quantity'];
}

// Breadcrumbs
$breadcrumbs = [
    ['title' => 'Quản lý sản phẩm', 'url' => ''],
    ['title' => 'Vé máy bay', 'url' => '']
];

// Page header settings
$show_page_title = true;
$page_subtitle = 'Danh sách và quản lý vé máy bay các tuyến đường';
$page_actions = '
  <a href="create_product.php" class="btn btn-primary">
    <i class="bi bi-plus-lg me-2"></i>Thêm sản phẩm
  </a>
';

// Include header
include '../../includes/header.php';
?>

<!-- Stats Cards -->
<div class="row g-3 mb-4">
  <div class="col-sm-6 col-lg-3">
    <div class="card stats-card stats-available h-100">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <div class="stats-value"><?php echo $availableProducts; ?></div>
            <div class="stats-label">Sản phẩm có sẵn</div>
          </div>
          <div class="stats-icon">
            <i class="bi bi-check-circle-fill"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-lg-3">
    <div class="card stats-card stats-total h-100">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <div class="stats-value"><?php echo $totalTickets; ?></div>
            <div class="stats-label">Tổng vé có sẵn</div>
          </div>
          <div class="stats-icon">
            <i class="bi bi-ticket-perforated"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-lg-3">
    <div class="card stats-card stats-warning h-100">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <div class="stats-value"><?php echo $lowStockProducts; ?></div>
            <div class="stats-label">Sắp hết vé</div>
          </div>
          <div class="stats-icon">
            <i class="bi bi-exclamation-triangle-fill"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-lg-3">
    <div class="card stats-card stats-value h-100">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <div class="stats-value"><?php echo number_format($totalValue/1000000, 1); ?>M</div>
            <div class="stats-label">Tổng giá trị (VNĐ)</div>
          </div>
          <div class="stats-icon">
            <i class="bi bi-currency-dollar"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Main Content -->
<div class="row g-4">
  <!-- Left: Products Grid & Filters -->
  <div class="col-lg-9">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h5 class="card-title mb-0">
            <i class="bi bi-airplane-engines me-2"></i>Danh sách vé máy bay
          </h5>
          <div class="d-flex gap-2">
            <div class="btn-group" role="group">
              <button type="button" class="btn btn-outline-secondary btn-sm active" id="gridViewBtn">
                <i class="bi bi-grid-3x3-gap"></i>
              </button>
              <button type="button" class="btn btn-outline-secondary btn-sm" id="listViewBtn">
                <i class="bi bi-list"></i>
              </button>
            </div>
            <button class="btn btn-outline-secondary btn-sm" id="exportBtn">
              <i class="bi bi-download"></i> Export
            </button>
            <a href="create_product.php" class="btn btn-primary btn-sm">
              <i class="bi bi-plus-lg"></i> Thêm mới
            </a>
          </div>
        </div>

        <!-- Filters -->
        <form id="filterForm" class="row g-2 align-items-end mb-4" method="GET">
          <div class="col-md-3">
            <label class="form-label small">Tìm kiếm</label>
            <input class="form-control form-control-sm" type="search" 
                   name="q" id="q" 
                   value="<?php echo htmlspecialchars($searchQuery); ?>"
                   placeholder="Tên, mã, tuyến bay..." />
          </div>
          <div class="col-md-2">
            <label class="form-label small">Hãng bay</label>
            <select name="airline" id="airlineFilter" class="form-select form-select-sm">
              <option value="">Tất cả</option>
              <option value="Vietnam Airlines" <?php echo $airlineFilter === 'Vietnam Airlines' ? 'selected' : ''; ?>>Vietnam Airlines</option>
              <option value="VietJet Air" <?php echo $airlineFilter === 'VietJet Air' ? 'selected' : ''; ?>>VietJet Air</option>
              <option value="Bamboo Airways" <?php echo $airlineFilter === 'Bamboo Airways' ? 'selected' : ''; ?>>Bamboo Airways</option>
            </select>
          </div>
          <div class="col-md-2">
            <label class="form-label small">Mức giá</label>
            <select name="price_range" id="priceFilter" class="form-select form-select-sm">
              <option value="">Tất cả</option>
              <option value="under_2m" <?php echo $priceFilter === 'under_2m' ? 'selected' : ''; ?>>Dưới 2M</option>
              <option value="2m_3m" <?php echo $priceFilter === '2m_3m' ? 'selected' : ''; ?>>2M - 3M</option>
              <option value="3m_5m" <?php echo $priceFilter === '3m_5m' ? 'selected' : ''; ?>>3M - 5M</option>
              <option value="over_5m" <?php echo $priceFilter === 'over_5m' ? 'selected' : ''; ?>>Trên 5M</option>
            </select>
          </div>
          <div class="col-md-2">
            <label class="form-label small">Trạng thái</label>
            <select name="status" id="statusFilter" class="form-select form-select-sm">
              <option value="">Tất cả</option>
              <option value="available" <?php echo $statusFilter === 'available' ? 'selected' : ''; ?>>Có sẵn</option>
              <option value="low_stock" <?php echo $statusFilter === 'low_stock' ? 'selected' : ''; ?>>Sắp hết</option>
              <option value="out_of_stock" <?php echo $statusFilter === 'out_of_stock' ? 'selected' : ''; ?>>Hết vé</option>
            </select>
          </div>
          <div class="col-md-2">
            <button class="btn btn-sm btn-outline-primary w-100" type="submit">
              <i class="bi bi-search"></i> Tìm
            </button>
          </div>
          <div class="col-md-1">
            <?php if (!empty($searchQuery) || !empty($airlineFilter) || !empty($priceFilter) || !empty($statusFilter)): ?>
            <a href="index.php" class="btn btn-sm btn-outline-secondary w-100" title="Xóa bộ lọc">
              <i class="bi bi-x-circle"></i>
            </a>
            <?php endif; ?>
          </div>
        </form>

        <!-- Products Grid -->
        <div id="productsContainer">
          <?php if (empty($products)): ?>
            <div class="text-center py-5">
              <i class="bi bi-airplane text-muted" style="font-size: 4rem;"></i>
              <h4 class="text-muted mt-3">Không tìm thấy sản phẩm nào</h4>
              <p class="text-muted">Thử thay đổi bộ lọc hoặc thêm sản phẩm mới</p>
            </div>
          <?php else: ?>
            <div class="row g-3" id="productsGrid">
              <?php foreach ($products as $product): ?>
                <div class="col-sm-6 col-lg-4 col-xl-3">
                  <div class="card product-card h-100" data-product-id="<?php echo $product['id']; ?>">
                    <!-- Product Image -->
                    <div class="product-image-container">
                      <a href="#" class="product-image-link" data-product-id="<?php echo $product['id']; ?>">
                        <img src="<?php echo htmlspecialchars($product['image']); ?>" 
                             class="card-img-top product-image" 
                             alt="<?php echo htmlspecialchars($product['product_name']); ?>"
                             loading="lazy">
                      </a>
                      
                      <!-- Discount Badge -->
                      <?php if ($product['discount'] > 0): ?>
                      <div class="discount-badge">
                        -<?php echo $product['discount']; ?>%
                      </div>
                      <?php endif; ?>
                      
                      <!-- Status Badge -->
                      <div class="status-badge status-<?php echo $product['status']; ?>">
                        <?php
                        switch ($product['status']) {
                          case 'available':
                            echo '<i class="bi bi-check-circle-fill"></i>';
                            break;
                          case 'low_stock':
                            echo '<i class="bi bi-exclamation-triangle-fill"></i>';
                            break;
                          case 'out_of_stock':
                            echo '<i class="bi bi-x-circle-fill"></i>';
                            break;
                        }
                        ?>
                      </div>
                      
                      <!-- Quick Actions -->
                      <div class="product-actions">
                        <button class="btn btn-sm btn-primary viewBtn" data-id="<?php echo $product['id']; ?>" title="Xem chi tiết">
                          <i class="bi bi-eye"></i>
                        </button>
                        <button class="btn btn-sm btn-secondary editBtn" data-id="<?php echo $product['id']; ?>" title="Chỉnh sửa">
                          <i class="bi bi-pencil"></i>
                        </button>
                        <button class="btn btn-sm btn-danger deleteBtn" data-id="<?php echo $product['id']; ?>" title="Xóa">
                          <i class="bi bi-trash"></i>
                        </button>
                      </div>
                    </div>

                    <!-- Product Info -->
                    <div class="card-body p-3">
                      <div class="product-header mb-2">
                        <div class="product-code"><?php echo htmlspecialchars($product['product_code']); ?></div>
                        <div class="airline-logo">
                          <?php
                          $airlineIcon = '';
                          switch ($product['airline']) {
                            case 'Vietnam Airlines':
                              $airlineIcon = 'bi-airplane';
                              break;
                            case 'VietJet Air':
                              $airlineIcon = 'bi-airplane-fill';
                              break;
                            case 'Bamboo Airways':
                              $airlineIcon = 'bi-airplane-engines';
                              break;
                          }
                          ?>
                          <i class="bi <?php echo $airlineIcon; ?>"></i>
                        </div>
                      </div>
                      
                      <h6 class="product-name mb-2"><?php echo htmlspecialchars($product['product_name']); ?></h6>
                      
                      <div class="flight-route mb-2">
                        <span class="departure"><?php echo explode(' ', $product['departure'])[0]; ?></span>
                        <i class="bi bi-arrow-right mx-2"></i>
                        <span class="arrival"><?php echo explode(' ', $product['arrival'])[0]; ?></span>
                        <small class="flight-time ms-2 text-muted"><?php echo $product['flight_time']; ?></small>
                      </div>
                      
                      <div class="price-section mb-2">
                        <?php if ($product['discount'] > 0): ?>
                          <div class="price-original"><?php echo number_format($product['price'], 0, ',', '.'); ?> VNĐ</div>
                          <div class="price-discounted"><?php echo number_format($product['price'] * (100 - $product['discount']) / 100, 0, ',', '.'); ?> VNĐ</div>
                        <?php else: ?>
                          <div class="price-current"><?php echo number_format($product['price'], 0, ',', '.'); ?> VNĐ</div>
                        <?php endif; ?>
                      </div>
                      
                      <div class="quantity-section">
                        <div class="quantity-info">
                          <i class="bi bi-ticket-perforated me-1"></i>
                          <span class="quantity-number"><?php echo $product['ticket_quantity']; ?></span>
                          <span class="quantity-label">vé có sẵn</span>
                        </div>
                        
                        <?php if ($product['status'] === 'low_stock'): ?>
                        <div class="quantity-warning">
                          <i class="bi bi-exclamation-triangle text-warning"></i>
                          <small class="text-warning">Sắp hết vé</small>
                        </div>
                        <?php elseif ($product['status'] === 'out_of_stock'): ?>
                        <div class="quantity-warning">
                          <i class="bi bi-x-circle text-danger"></i>
                          <small class="text-danger">Đã hết vé</small>
                        </div>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>

        <!-- Pagination -->
        <?php if (!empty($products)): ?>
        <div class="d-flex justify-content-between align-items-center mt-4">
          <div class="text-muted small">
            Hiển thị <?php echo count($products); ?> sản phẩm
          </div>
          <nav>
            <ul class="pagination pagination-sm mb-0">
              <li class="page-item disabled"><a class="page-link">Trước</a></li>
              <li class="page-item active"><a class="page-link">1</a></li>
              <li class="page-item"><a class="page-link">2</a></li>
              <li class="page-item"><a class="page-link">3</a></li>
              <li class="page-item"><a class="page-link">Sau</a></li>
            </ul>
          </nav>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <!-- Right: Quick Stats & Tools -->
  <div class="col-lg-3">
    <div class="card">
      <div class="card-header">
        <h6 class="card-title mb-0">
          <i class="bi bi-graph-up me-2"></i>Thống kê nhanh
        </h6>
      </div>
      <div class="card-body">
        <div class="quick-stats">
          <div class="stat-item stat-success">
            <div class="stat-icon">
              <i class="bi bi-check-circle-fill"></i>
            </div>
            <div class="stat-content">
              <div class="stat-number"><?php echo $availableProducts; ?></div>
              <div class="stat-label">Có sẵn</div>
            </div>
          </div>
          
          <div class="stat-item stat-warning">
            <div class="stat-icon">
              <i class="bi bi-exclamation-triangle-fill"></i>
            </div>
            <div class="stat-content">
              <div class="stat-number"><?php echo $lowStockProducts; ?></div>
              <div class="stat-label">Sắp hết</div>
            </div>
          </div>
          
          <div class="stat-item stat-danger">
            <div class="stat-icon">
              <i class="bi bi-x-circle-fill"></i>
            </div>
            <div class="stat-content">
              <div class="stat-number"><?php echo $outOfStockProducts; ?></div>
              <div class="stat-label">Hết vé</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card mt-3">
      <div class="card-header">
        <h6 class="card-title mb-0">
          <i class="bi bi-tools me-2"></i>Thao tác nhanh
        </h6>
      </div>
      <div class="card-body">
        <div class="d-grid gap-2">
          <a href="create_product.php" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle me-2"></i>Thêm sản phẩm
          </a>
          <button class="btn btn-outline-secondary btn-sm" id="bulkUpdateBtn">
            <i class="bi bi-arrow-clockwise me-2"></i>Cập nhật giá
          </button>
          <button class="btn btn-outline-info btn-sm" id="inventoryBtn">
            <i class="bi bi-box-seam me-2"></i>Quản lý tồn kho
          </button>
          <button class="btn btn-outline-warning btn-sm" id="reportBtn">
            <i class="bi bi-file-earmark-text me-2"></i>Báo cáo
          </button>
        </div>
      </div>
    </div>

    <div class="card mt-3">
      <div class="card-header">
        <h6 class="card-title mb-0">
          <i class="bi bi-info-circle me-2"></i>Thông tin
        </h6>
      </div>
      <div class="card-body">
        <div class="info-list">
          <div class="info-item">
            <small class="text-muted">Tổng giá trị kho:</small>
            <div class="fw-bold text-primary"><?php echo number_format($totalValue, 0, ',', '.'); ?> VNĐ</div>
          </div>
          <div class="info-item">
            <small class="text-muted">Vé bán được hôm nay:</small>
            <div class="fw-bold text-success">156 vé</div>
          </div>
          <div class="info-item">
            <small class="text-muted">Doanh thu hôm nay:</small>
            <div class="fw-bold text-warning">287,500,000 VNĐ</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Product Detail Modal -->
<div class="modal fade" id="productModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <i class="bi bi-airplane me-2"></i>Chi tiết sản phẩm
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" id="productDetails">
        <!-- Content will be loaded here -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="editProductBtn">Chỉnh sửa</button>
      </div>
    </div>
  </div>
</div>

<?php
// Page specific scripts
$page_scripts = '
  // Initialize product management
  document.addEventListener("DOMContentLoaded", function() {
    initializeProductManagement();
  });
';

// Include footer
include '../../includes/footer.php';
?>
