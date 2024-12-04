<?php

function checkPermission($name)
{
    $route_arr = auth()->user()->role->permissions;
    $route = $route_arr->where('name', $name)->count();
    if ($route == 1) {
        return true;
    }
    return false;
}


function checkAdmin()
{
    return auth()->check() && auth()->user()->role->name == 'admin';
}

?>
<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="<?php echo e(asset('kcnew/frontend/img/image_iconLogo.png')); ?>" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 style="color: #00b249" class="logo-text">TDQ - News</h4>
        </div>
        <div style="color: #00b249" class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <?php if(checkPermission("admin.index")): ?>
        <li>
            <a href="<?php echo e(route('admin.index')); ?>">
                <div class="parent-icon"><i class='bx bx-home-circle'></i></div>
                <div class="menu-title">Bảng điều khiển</div>
            </a>
        </li>
        <?php endif; ?>

        <?php if(checkPermission("admin.posts.index") || checkPermission("admin.posts.create") ): ?>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                </div>
                <div class="menu-title">Bài viết</div>
            </a>

            <ul>
                <?php if(checkPermission("admin.posts.index")): ?>
                <li> <a href="<?php echo e(route('admin.posts.index')); ?>"><i class="bx bx-right-arrow-alt"></i>Tất cả bài viết</a>
                </li>
                <?php endif; ?>

                <?php if(checkPermission("admin.posts.create")): ?>
                <li> <a href="<?php echo e(route('admin.posts.create')); ?>"><i class="bx bx-right-arrow-alt"></i>Thêm bài viết mới</a>
                </li>
                <?php endif; ?>

            </ul>
        </li>
        <?php endif; ?>

        <?php if(checkPermission("admin.categories.index") || checkPermission("admin.categories.create") ): ?>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-menu'></i>
                </div>
                <div class="menu-title">Danh mục bài viết</div>
            </a>

            <ul>
                <?php if(checkPermission("admin.categories.index")): ?>
                <li> <a href="<?php echo e(route('admin.categories.index')); ?>"><i class="bx bx-right-arrow-alt"></i>Tất cả danh mục</a>
                </li>
                <?php endif; ?>

                <?php if(checkPermission("admin.categories.create")): ?>
                <li> <a href="<?php echo e(route('admin.categories.create')); ?>"><i class="bx bx-right-arrow-alt"></i>Thêm danh mục mới</a>
                </li>
                <?php endif; ?>
            </ul>
        </li>
        <?php endif; ?>

        <?php if(checkPermission("admin.tags.index")): ?>
        <li>
            <a href="<?php echo e(route('admin.tags.index')); ?>">
                <div class="parent-icon"><i class='bx bx-purchase-tag'></i></div>
                <div class="menu-title">Từ khóa</div>
            </a>
        </li>
        <?php endif; ?>

        <?php if(checkPermission("admin.comments.index") || checkPermission("admin.comments.create") ): ?>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-comment-dots'></i>
                </div>
                <div class="menu-title">Bình luận</div>
            </a>

            <ul>
                <?php if(checkPermission("admin.comments.index")): ?>
                <li> <a href="<?php echo e(route('admin.comments.index')); ?>"><i class="bx bx-right-arrow-alt"></i>Tất cả bình luận</a>
                </li>
                <?php endif; ?>

                <?php if(checkPermission("admin.comments.create")): ?>
                <li> <a href="<?php echo e(route('admin.comments.create')); ?>"><i class="bx bx-right-arrow-alt"></i>Thêm bình luận mới</a>
                </li>
                <?php endif; ?>

            </ul>
        </li>
        <?php endif; ?>

        <hr>

        <?php if(checkPermission("admin.roles.index") || checkPermission("admin.roles.create") ): ?>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-key'></i>
                </div>
                <div class="menu-title">Phân Quyền</div>
            </a>

            <ul>
                <?php if(checkPermission("admin.roles.index")): ?>
                <li> <a href="<?php echo e(route('admin.roles.index')); ?>"><i class="bx bx-right-arrow-alt"></i>Tất cả quyền</a>
                </li>
                <?php endif; ?>

                <?php if(checkPermission("admin.roles.create")): ?>
                <li> <a href="<?php echo e(route('admin.roles.create')); ?>"><i class="bx bx-right-arrow-alt"></i>Thêm quyền mới</a>
                </li>
                <?php endif; ?>
            </ul>
        </li>
        <?php endif; ?>

        <?php if(checkPermission("admin.post-history.index")): ?>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-history'></i>
                </div>
                <div class="menu-title">Lịch sử </div>
            </a>

            <ul>
                <?php if(checkPermission("admin.post-history.index")): ?>
                <li> <a href="<?php echo e(route('admin.post-history.index')); ?>"><i class="bx bx-history"></i>Lịch sử thao tác</a>
                </li>
                <?php endif; ?>
            </ul>
        </li>
        <?php endif; ?>

        <?php if(checkPermission("admin.post-soft-delete")): ?>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-trash'></i>
                </div>
                <div class="menu-title">Bài viết đã xóa</div>
            </a>

            <ul>
                <?php if(checkPermission("admin.post-soft-delete")): ?>
                <li> <a href="<?php echo e(route('admin.post-soft-delete')); ?>"><i class="bx bx-trash"></i>Bài viết đã xóa</a>
                </li>
                <?php endif; ?>
            </ul>
        </li>
        <?php endif; ?>

        <?php if(checkPermission("admin.users.index") || checkPermission("admin.users.create") ): ?>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-user'></i>
                </div>
                <div class="menu-title">Tài khoản</div>
            </a>

            <ul>

                <?php if(checkPermission("admin.users.index")): ?>
                <li> <a href="<?php echo e(route('admin.users.index')); ?>"><i class="bx bx-right-arrow-alt"></i>Tất cả tài khoản</a>
                </li>
                <?php endif; ?>

                <?php if(checkPermission("admin.users.create")): ?>
                <li> <a href="<?php echo e(route('admin.users.create')); ?>"><i class="bx bx-right-arrow-alt"></i>Thêm tài khoản mới</a>
                </li>
                <?php endif; ?>

            </ul>
        </li>
        <?php endif; ?>

        <?php if(checkPermission("admin.contacts")): ?>
        <li>
            <a href="<?php echo e(route('admin.contacts')); ?>">
                <div class="parent-icon"><i class='bx bx-mail-send'></i></div>
                <div class="menu-title">Liên hệ</div>
            </a>
        </li>
        <?php endif; ?>

        <?php if(checkPermission("admin.setting.edit")): ?>
        <li>
            <a href="<?php echo e(route('admin.setting.edit')); ?>">
                <div class="parent-icon"><i class='bx bx-info-square'></i></div>
                <div class="menu-title">Cài đặt</div>
            </a>
        </li>
        <?php endif; ?>

        <hr>

        <?php if(checkAdmin()): ?>
        <li>
            <a href="<?php echo e(route('home')); ?>">
                <div class="parent-icon "><i class='bx bx-pointer '></i></div>
                <div class="menu-title">Trang chủ </div>
            </a>
        </li>
        <?php endif; ?>


    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper --><?php /**PATH C:\laragon\www\Project\newslaravel\resources\views/admin_dashboard/layouts/nav.blade.php ENDPATH**/ ?>