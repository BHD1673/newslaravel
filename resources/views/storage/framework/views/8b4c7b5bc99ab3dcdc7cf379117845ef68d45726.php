		
<?php $__env->startSection("style"); ?>
	<link href="<?php echo e(asset('admin_dashboard_assets/plugins/datatable/css/dataTables.bootstrap5.min.css')); ?>" rel="stylesheet" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection("wrapper"); ?>
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Liên hệ</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.index')); ?>"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Tất cả liên hệ</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        
        <div class="card">
            <div class="card-body">
            <div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Họ và Tên</th>
										<th>Email</th>
										<th>Tiêu đề</th>
										<th>Nội dung</th>
										<th>Chức năng</th>
									</tr>
								</thead>
								<tbody>
                                    <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td><?php echo e($contact->first_name); ?> <?php echo e($contact->last_name); ?></td>
										<td><?php echo e($contact->email); ?></td>
										<td><?php echo e($contact->first_subject); ?></td>
										<td><?php echo e($contact->message); ?></td>
                                        <td>
                                        <div class="d-flex order-actions">
                                            <a href="#" onclick="event.preventDefault(); document.querySelector('#delete_form_<?php echo e($contact->id); ?>').submit();" class="ms-3"><i class='bx bxs-trash'></i></a>

                                            <form method="post" action="<?php echo e(route('admin.contacts.destroy',  $contact)); ?>" id="delete_form_<?php echo e($contact->id); ?>">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                            </form>
                                        
                                        </div>
                                        </td>
									</tr>
                                   
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
            </div>
        </div>


    </div>
</div>
<!--end page wrapper -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection("script"); ?>
    <script src="<?php echo e(asset('admin_dashboard_assets/plugins/datatable/js/jquery.dataTables.min.js')); ?>"></script>
	<script src="<?php echo e(asset('admin_dashboard_assets/plugins/datatable/js/dataTables.bootstrap5.min.js')); ?>"></script>
	<script>
		$(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'excel', 'pdf']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );

            setTimeout(()=>{
				$(".general-message").fadeOut();
            },5000);

		} );
	</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("admin_dashboard.layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\newslaravel-main\resources\views/admin_dashboard/contacts/index.blade.php ENDPATH**/ ?>