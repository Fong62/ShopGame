<?php
// Xử lý và lọc các tham số tìm kiếm
$search_params = [
    'gia' => isset($_GET['gia']) && in_array($_GET['gia'], ['1', '2', '3']) ? $_GET['gia'] : '',
    'sort' => isset($_GET['sort']) && in_array($_GET['sort'], ['asc', 'desc']) ? $_GET['sort'] : '',
    'star5' => isset($_GET['star5']) && is_numeric($_GET['star5']) ? (int)$_GET['star5'] : '',
    'acc_id' => isset($_GET['acc_id']) && is_numeric($_GET['acc_id']) ? (int)$_GET['acc_id'] : '',
    'slug' => isset($_GET['slug']) ? check_string($_GET['slug']) : ''
];

$group_slug = !empty($search_params['slug']) ? $search_params['slug'] : 'mac-dinh';
?>

<div class="col-lg-3 mb-4">
    <div class="p-3 filter-box">
        <h5 class="text-center mb-3">Tìm kiếm </h5>
        <form method="GET" action="/groups/<?= $group_slug ?>">
         
            
            <!-- Trường lọc theo giá -->
            <div class="form-group mb-2">
                <label>Giá</label>
                <select name="gia" class="form-control">
                    <option value="">Chọn giá</option>
                    <option value="1" <?= $search_params['gia'] === '1' ? 'selected' : '' ?>>Dưới 100K</option>
                    <option value="2" <?= $search_params['gia'] === '2' ? 'selected' : '' ?>>100K - 300K</option>
                    <option value="3" <?= $search_params['gia'] === '3' ? 'selected' : '' ?>>Trên 300K</option>
                </select>
            </div>
            
            <!-- Trường sắp xếp -->
            <div class="form-group mb-2">
                <label>Sắp xếp giá</label>
                <select name="sort" class="form-control">
                    <option value="" <?= empty($search_params['sort']) ? 'selected' : '' ?>>Mặc định</option>
                    <option value="asc" <?= $search_params['sort'] === 'asc' ? 'selected' : '' ?>>Tăng dần</option>
                    <option value="desc" <?= $search_params['sort'] === 'desc' ? 'selected' : '' ?>>Giảm dần</option>
                </select>
            </div>
            
            <!-- Trường số lượng nhân vật 5 sao -->
            <div class="form-group mb-2">
                <label>Nhân vật 5 sao</label>
                <input type="number" name="star5" class="form-control" 
                       placeholder="Số lượng" 
                       value="<?= $search_params['star5'] !== '' ? $search_params['star5'] : '' ?>"
                       min="0">
            </div>
            
            <!-- Trường ID tài khoản -->
            <div class="form-group mb-3">
                <label>ID acc</label>
                <input type="number" name="acc_id" class="form-control" 
                       placeholder="Nhập ID" 
                       value="<?= $search_params['acc_id'] !== '' ? $search_params['acc_id'] : '' ?>"
                       min="1">
            </div>
            
           
            <button type="submit" class="btn btn-warning w-100 fw-bold">🔍 Tìm kiếm</button>
            
           
            <?php if (array_filter($search_params, function($v, $k) { 
              return !in_array($k, ['slug']) && $v !== '';
            }, ARRAY_FILTER_USE_BOTH)): ?>
                <a href="/groups/<?= $group_slug?>" class="btn btn-outline-secondary w-100 mt-2">
                    Xóa bộ lọc
                </a>
            <?php endif; ?>
        </form>
    </div>
</div>

<style>
.filter-box {
    background: #fdf3e6;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    position: sticky;
    top: 20px;
}
</style>