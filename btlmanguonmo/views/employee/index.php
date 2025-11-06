<?php
// Page configuration
$page_title = 'Quản lý nhân viên - AirAgent Admin';
$page_description = 'Hệ thống quản lý thông tin nhân viên';
$current_page = 'employee';
$css_files = ['../../css/main.css', '../../css/employee.css'];
$js_files = ['../../js/employee.js'];

$username = 'Admin';
$role = 'Administrator';

// Include functions để lấy data (giả lập data nhân viên)
$employees = [
    [
        'id' => 1,
        'employee_code' => 'NV001',
        'employee_name' => 'Nguyễn Văn An',
        'agent_code' => 'AG001',
        'agent_name' => 'Đại lý Hà Nội',
        'position' => 'Nhân viên bán hàng',
        'age' => 28,
        'gender' => 'Nam',
        'salary' => 15000000,
        'phone' => '0987654321',
        'email' => 'nva@airagent.com',
        'hire_date' => '2023-01-15',
        'status' => 'active'
    ],
    [
        'id' => 2,
        'employee_code' => 'NV002', 
        'employee_name' => 'Trần Thị Bình',
        'agent_code' => 'AG001',
        'agent_name' => 'Đại lý Hà Nội',
        'position' => 'Quản lý',
        'age' => 32,
        'gender' => 'Nữ',
        'salary' => 25000000,
        'phone' => '0912345678',
        'email' => 'ttb@airagent.com',
        'hire_date' => '2022-03-10',
        'status' => 'active'
    ],
    [
        'id' => 3,
        'employee_code' => 'NV003',
        'employee_name' => 'Lê Hoàng Cường',
        'agent_code' => 'AG002',
        'agent_name' => 'Đại lý TP.HCM',
        'position' => 'Kế toán',
        'age' => 29,
        'gender' => 'Nam',
        'salary' => 18000000,
        'phone' => '0908765432',
        'email' => 'lhc@airagent.com',
        'hire_date' => '2022-08-20',
        'status' => 'active'
    ],
    [
        'id' => 4,
        'employee_code' => 'NV004',
        'employee_name' => 'Phạm Thị Dung',
        'agent_code' => 'AG003',
        'agent_name' => 'Đại lý Đà Nẵng',
        'position' => 'Nhân viên hỗ trợ',
        'age' => 24,
        'gender' => 'Nữ',
        'salary' => 12000000,
        'phone' => '0934567890',
        'email' => 'ptd@airagent.com',
        'hire_date' => '2023-06-01',
        'status' => 'active'
    ],
    [
        'id' => 5,
        'employee_code' => 'NV005',
        'employee_name' => 'Hoàng Văn Em',
        'agent_code' => 'AG002',
        'agent_name' => 'Đại lý TP.HCM',
        'position' => 'Giám sát',
        'age' => 35,
        'gender' => 'Nam',
        'salary' => 22000000,
        'phone' => '0923456789',
        'email' => 'hve@airagent.com',
        'hire_date' => '2021-12-05',
        'status' => 'inactive'
    ]
];

// Xử lý search và filter
$searchQuery = isset($_GET['q']) ? trim($_GET['q']) : '';
$positionFilter = isset($_GET['position']) ? $_GET['position'] : '';
$agentFilter = isset($_GET['agent']) ? $_GET['agent'] : '';
$genderFilter = isset($_GET['gender']) ? $_GET['gender'] : '';

if (!empty($searchQuery) || !empty($positionFilter) || !empty($agentFilter) || !empty($genderFilter)) {
    $filteredEmployees = [];
    foreach ($employees as $employee) {
        $matchSearch = empty($searchQuery) || 
                      stripos($employee['employee_name'], $searchQuery) !== false ||
                      stripos($employee['employee_code'], $searchQuery) !== false ||
                      stripos($employee['email'], $searchQuery) !== false ||
                      stripos($employee['phone'], $searchQuery) !== false;
        
        $matchPosition = empty($positionFilter) || $employee['position'] === $positionFilter;
        $matchAgent = empty($agentFilter) || $employee['agent_code'] === $agentFilter;
        $matchGender = empty($genderFilter) || $employee['gender'] === $genderFilter;
        
        if ($matchSearch && $matchPosition && $matchAgent && $matchGender) {
            $filteredEmployees[] = $employee;
        }
    }
    $employees = $filteredEmployees;
}

// Tính toán statistics
$totalEmployees = count($employees);
$activeEmployees = 0;
$inactiveEmployees = 0;
$totalSalary = 0;
$averageAge = 0;

foreach ($employees as $employee) {
    if ($employee['status'] === 'active') {
        $activeEmployees++;
    } else {
        $inactiveEmployees++;
    }
    $totalSalary += $employee['salary'];
    $averageAge += $employee['age'];
}

if ($totalEmployees > 0) {
    $averageAge = round($averageAge / $totalEmployees, 1);
}

// Breadcrumbs
$breadcrumbs = [
    ['title' => 'Quản lý nhân viên', 'url' => '']
];

// Page header settings
$show_page_title = true;
$page_subtitle = 'Danh sách và thông tin chi tiết nhân viên';
$page_actions = '
  <a href="create_employee.php" class="btn btn-primary">
    <i class="bi bi-plus-lg me-2"></i>Thêm nhân viên
  </a>
';

// Include header
include '../../includes/header.php';
?>

<!-- Stats Cards -->
<div class="row g-3 mb-4">
  <div class="col-sm-6 col-lg-3">
    <div class="card stats-card h-100">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <div class="stats-value"><?php echo $activeEmployees; ?></div>
            <div class="stats-label">Nhân viên đang làm</div>
          </div>
          <div class="stats-icon text-success">
            <i class="bi bi-people-fill"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-lg-3">
    <div class="card stats-card h-100">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <div class="stats-value"><?php echo $totalEmployees; ?></div>
            <div class="stats-label">Tổng nhân viên</div>
          </div>
          <div class="stats-icon text-primary">
            <i class="bi bi-person-badge"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-lg-3">
    <div class="card stats-card h-100">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <div class="stats-value"><?php echo number_format($totalSalary, 0, ',', '.'); ?></div>
            <div class="stats-label">Tổng lương (VNĐ)</div>
          </div>
          <div class="stats-icon text-warning">
            <i class="bi bi-currency-dollar"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-lg-3">
    <div class="card stats-card h-100">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <div class="stats-value"><?php echo $averageAge; ?></div>
            <div class="stats-label">Tuổi trung bình</div>
          </div>
          <div class="stats-icon text-info">
            <i class="bi bi-graph-up"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Main Content -->
<div class="row g-4">
  <!-- Left: Table & Filters -->
  <div class="col-lg-9">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h5 class="card-title mb-0">
            <i class="bi bi-people me-2"></i>Danh sách nhân viên
          </h5>
          <div class="d-flex gap-2">
            <button class="btn btn-outline-secondary btn-sm" id="exportBtn">
              <i class="bi bi-download"></i> Export
            </button>
            <a href="create_employee.php" class="btn btn-primary btn-sm">
              <i class="bi bi-plus-lg"></i> Thêm mới
            </a>
          </div>
        </div>

        <!-- Filters -->
        <form id="filterForm" class="row g-2 align-items-end mb-3" method="GET">
          <div class="col-md-4">
            <label class="form-label small">Tìm kiếm</label>
            <input class="form-control form-control-sm" type="search" 
                   name="q" id="q" 
                   value="<?php echo htmlspecialchars($searchQuery); ?>"
                   placeholder="Tên, mã NV, email, SĐT..." />
          </div>
          <div class="col-md-2">
            <label class="form-label small">Chức vụ</label>
            <select name="position" id="positionFilter" class="form-select form-select-sm">
              <option value="">Tất cả</option>
              <option value="Nhân viên bán hàng" <?php echo $positionFilter === 'Nhân viên bán hàng' ? 'selected' : ''; ?>>Nhân viên bán hàng</option>
              <option value="Quản lý" <?php echo $positionFilter === 'Quản lý' ? 'selected' : ''; ?>>Quản lý</option>
              <option value="Kế toán" <?php echo $positionFilter === 'Kế toán' ? 'selected' : ''; ?>>Kế toán</option>
              <option value="Nhân viên hỗ trợ" <?php echo $positionFilter === 'Nhân viên hỗ trợ' ? 'selected' : ''; ?>>Nhân viên hỗ trợ</option>
              <option value="Giám sát" <?php echo $positionFilter === 'Giám sát' ? 'selected' : ''; ?>>Giám sát</option>
            </select>
          </div>
          <div class="col-md-2">
            <label class="form-label small">Đại lý</label>
            <select name="agent" id="agentFilter" class="form-select form-select-sm">
              <option value="">Tất cả</option>
              <option value="AG001" <?php echo $agentFilter === 'AG001' ? 'selected' : ''; ?>>AG001</option>
              <option value="AG002" <?php echo $agentFilter === 'AG002' ? 'selected' : ''; ?>>AG002</option>
              <option value="AG003" <?php echo $agentFilter === 'AG003' ? 'selected' : ''; ?>>AG003</option>
            </select>
          </div>
          <div class="col-md-2">
            <label class="form-label small">Giới tính</label>
            <select name="gender" id="genderFilter" class="form-select form-select-sm">
              <option value="">Tất cả</option>
              <option value="Nam" <?php echo $genderFilter === 'Nam' ? 'selected' : ''; ?>>Nam</option>
              <option value="Nữ" <?php echo $genderFilter === 'Nữ' ? 'selected' : ''; ?>>Nữ</option>
            </select>
          </div>
          <div class="col-md-2">
            <button class="btn btn-sm btn-outline-primary w-100" type="submit">
              <i class="bi bi-search"></i> Tìm
            </button>
          </div>
        </form>

        <?php if (!empty($searchQuery) || !empty($positionFilter) || !empty($agentFilter) || !empty($genderFilter)): ?>
        <div class="mb-3">
          <a href="index.php" class="btn btn-sm btn-outline-secondary">
            <i class="bi bi-x-circle"></i> Xóa bộ lọc
          </a>
        </div>
        <?php endif; ?>

        <!-- Table -->
        <div class="table-responsive">
          <table class="table table-hover align-middle employee-table">
            <thead class="table-light">
              <tr>
                <th style="width: 80px;">Mã NV</th>
                <th style="width: 180px;">Tên nhân viên</th>
                <th style="width: 80px;">Mã ĐL</th>
                <th style="width: 150px;">Tên đại lý</th>
                <th style="width: 120px;">Chức vụ</th>
                <th style="width: 60px;">Tuổi</th>
                <th style="width: 80px;">Giới tính</th>
                <th style="width: 120px;" class="text-end">Lương</th>
                <th style="width: 100px;">Hành động</th>
              </tr>
            </thead>
            <tbody>
              <?php if (empty($employees)): ?>
                <tr>
                  <td colspan="9" class="text-center text-muted py-4">
                    <i class="bi bi-inbox me-2"></i>Chưa có nhân viên nào
                  </td>
                </tr>
              <?php else: ?>
                <?php foreach ($employees as $employee): ?>
                  <tr data-employee-id="<?php echo $employee['id']; ?>">
                    <td>
                      <span class="employee-code"><?php echo htmlspecialchars($employee['employee_code']); ?></span>
                    </td>
                    <td>
                      <div class="employee-info">
                        <div class="fw-semibold"><?php echo htmlspecialchars($employee['employee_name']); ?></div>
                        <div class="text-muted small"><?php echo htmlspecialchars($employee['email']); ?></div>
                      </div>
                    </td>
                    <td>
                      <span class="agent-code"><?php echo htmlspecialchars($employee['agent_code']); ?></span>
                    </td>
                    <td><?php echo htmlspecialchars($employee['agent_name']); ?></td>
                    <td>
                      <span class="badge position-badge bg-secondary"><?php echo htmlspecialchars($employee['position']); ?></span>
                    </td>
                    <td class="text-center"><?php echo $employee['age']; ?></td>
                    <td>
                      <span class="gender-badge <?php echo $employee['gender'] === 'Nam' ? 'male' : 'female'; ?>">
                        <i class="bi bi-<?php echo $employee['gender'] === 'Nam' ? 'gender-male' : 'gender-female'; ?>"></i>
                        <?php echo htmlspecialchars($employee['gender']); ?>
                      </span>
                    </td>
                    <td class="text-end">
                      <span class="salary"><?php echo number_format($employee['salary'], 0, ',', '.'); ?> VNĐ</span>
                    </td>
                    <td>
                      <div class="btn-group" role="group">
                        <button class="btn btn-sm btn-outline-primary viewBtn" 
                                data-id="<?php echo $employee['id']; ?>" 
                                title="Xem chi tiết">
                          <i class="bi bi-eye"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-secondary editBtn" 
                                data-id="<?php echo $employee['id']; ?>" 
                                title="Chỉnh sửa">
                          <i class="bi bi-pencil"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-danger deleteBtn" 
                                data-id="<?php echo $employee['id']; ?>" 
                                title="Xóa">
                          <i class="bi bi-trash"></i>
                        </button>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php endif; ?>
            </tbody>
          </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-between align-items-center mt-3">
          <div class="text-muted small">
            Hiển thị <?php echo count($employees); ?> nhân viên
          </div>
          <nav>
            <ul class="pagination pagination-sm mb-0">
              <li class="page-item disabled"><a class="page-link">Trước</a></li>
              <li class="page-item active"><a class="page-link">1</a></li>
              <li class="page-item"><a class="page-link">2</a></li>
              <li class="page-item"><a class="page-link">Sau</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>

  <!-- Right: Quick Actions & Info -->
  <div class="col-lg-3">
    <div class="card">
      <div class="card-header">
        <h6 class="card-title mb-0">
          <i class="bi bi-speedometer2 me-2"></i>Thống kê nhanh
        </h6>
      </div>
      <div class="card-body">
        <div class="quick-stats">
          <div class="stat-item">
            <div class="stat-icon text-success">
              <i class="bi bi-check-circle-fill"></i>
            </div>
            <div class="stat-content">
              <div class="stat-number"><?php echo $activeEmployees; ?></div>
              <div class="stat-label">Đang làm việc</div>
            </div>
          </div>
          
          <div class="stat-item">
            <div class="stat-icon text-danger">
              <i class="bi bi-x-circle-fill"></i>
            </div>
            <div class="stat-content">
              <div class="stat-number"><?php echo $inactiveEmployees; ?></div>
              <div class="stat-label">Đã nghỉ việc</div>
            </div>
          </div>
          
          <div class="stat-item">
            <div class="stat-icon text-info">
              <i class="bi bi-calendar"></i>
            </div>
            <div class="stat-content">
              <div class="stat-number"><?php echo $averageAge; ?></div>
              <div class="stat-label">Tuổi TB</div>
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
          <a href="create_employee.php" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle me-2"></i>Thêm nhân viên
          </a>
          <button class="btn btn-outline-secondary btn-sm" id="importBtn">
            <i class="bi bi-upload me-2"></i>Import Excel
          </button>
          <button class="btn btn-outline-info btn-sm" id="reportBtn">
            <i class="bi bi-file-earmark-text me-2"></i>Báo cáo
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Employee Detail Modal -->
<div class="modal fade" id="employeeModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <i class="bi bi-person-circle me-2"></i>Chi tiết nhân viên
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" id="employeeDetails">
        <!-- Content will be loaded here -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="editEmployeeBtn">Chỉnh sửa</button>
      </div>
    </div>
  </div>
</div>

<?php
// Page specific scripts
$page_scripts = '
  // Initialize employee management
  document.addEventListener("DOMContentLoaded", function() {
    initializeEmployeeTable();
  });
';

// Include footer
include '../../includes/footer.php';
?>
