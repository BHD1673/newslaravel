<?php $__env->startSection("style"); ?>
<!-- <link href="<?php echo e(asset('admin_dashboard_assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css')); ?>" rel="stylesheet" /> -->
<link href="<?php echo e(asset('admin_dashboard_assets/plugins/select2/css/select2.min.css')); ?>" rel="stylesheet" />
<link href="<?php echo e(asset('admin_dashboard_assets/plugins/select2/css/select2-bootstrap4.css')); ?>" rel="stylesheet" />

<link href="<?php echo e(asset('admin_dashboard_assets/plugins/input-tags/css/tagsinput.css')); ?>" rel="stylesheet" />
<script src="https://cdn.tiny.cloud/1/5nk94xe9fcwk22fkp6gou9ymszwidnujnr2mu3n3xe2biap3/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<style>
	.upload-area {
		border: 2px dashed #ccc;
		padding: 20px;
		border-radius: 10px;
		text-align: center;
	}

	.file-preview {
		display: flex;
		flex-wrap: wrap;
		margin-top: 10px;
	}

	.file-preview img {
		max-width: 100px;
		margin: 5px;
		border: 1px solid #ccc;
		border-radius: 5px;
	}

	.remove-file {
		cursor: pointer;
		color: red;
		font-weight: bold;
		margin-left: 5px;
	}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("wrapper"); ?>
<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">
		<!--breadcrumb-->
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Bài viết</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="<?php echo e(route('admin.index')); ?>"><i class="bx bx-home-alt"></i></a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Thêm mới bài viết</li>
					</ol>
				</nav>
			</div>
		</div>
		<!--end breadcrumb-->

		<div class="card">
			<div class="card-body p-4">
				<h5 class="card-title">Thêm bài viết mới</h5>
				<hr />
				<form action="<?php echo e(route('admin.posts.store')); ?>" method="POST" enctype="multipart/form-data">
					<?php echo csrf_field(); ?>

					<div class="form-body mt-4">
						<div class="row">
							<div class="col-lg-12">
								<div class="border border-3 p-4 rounded">
									<div class="mb-3">
										<label for="inputProductTitle" class="form-label">Tiêu đề bài viết</label>
										<input type="text" value=' <?php echo e(old("title" )); ?>' name="title" required class="inputPostTitle form-control" id="inputProductTitle" placeholder="Nhập tiêu đề bài viết">

										<?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
										<p class="text-danger"><?php echo e($message); ?></p>
										<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
									</div>

									<div class="mb-3">
										<label for="inputProductTitle" class="form-label">Slug - liên kết</label>
										<input type="text" value=' <?php echo e(old("slug" )); ?>' name="slug" required class="slugPost form-control" id="inputProductTitle" placeholder="Nhập slug">

										<?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
										<p class="text-danger"><?php echo e($message); ?></p>
										<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
									</div>

									<div class="mb-3">
										<label for="inputProductDescription" class="form-label">Mô tả</label>
										<textarea required name="excerpt" class="form-control" id="inputProductDescription" rows="3"><?php echo e(old("excerpt")); ?></textarea>


										<?php $__errorArgs = ['excerpt'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
										<p class="text-danger"><?php echo e($message); ?></p>
										<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

									</div>

									<div class="mb-3">
										<label for="inputProductTitle" class="form-label">Danh mục bài viết</label>
										<div class="card">
											<div class="card-body">
												<div class="p-3 rounded">
													<div class="mb-3">
														<select name="category_id" required class="single-select">
															<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<option value="<?php echo e($key); ?>"><?php echo e($category); ?></option>
															<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
														</select>

														<?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
														<p class="text-danger"><?php echo e($message); ?></p>
														<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="mb-3">
										<label class="form-label">Từ khóa</label>
										<input type="text" class="form-control" name="tags" data-role="tagsinput">
									</div>

									<!-- <input id="image-uploadify" name="thumbnail" type="file" id="file" accept="image/*" multiple> -->
									<div class="row">
										<div class="mb-3 <?php echo e($isReporter ? 'col-12' : 'col-6'); ?>">
											<label for="inputProductDescription" class="form-label">Hình ảnh bài viết</label>
											<!-- <input id="thumbnail" require name="thumbnail" type="file" id="file"> -->
											<div class="upload-area">
												<input type="file" name="files[]" multiple id="file-input" onchange="previewFiles()">
												<div class="file-preview" id="file-preview"></div>
											</div>

											<?php $__errorArgs = ['files'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
											<p class="text-danger"><?php echo e($message); ?></p>
											<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

										</div>
										<?php if(!$isReporter): ?>
											<div class="col-6 mb-3">
												<label for="inputProductDescription" class="form-label">Trạng thái bài viết</label>
												<select class="form-select" name="approved" aria-label="Default select example">
													<option value="1">Chưa phê duyệt</option>
													<option value="2">Từ chối</option>
													<option value="3">Duyệt bài viết</option>
												</select>
											</div>
										<?php endif; ?>
										
									</div>
									<div class="mb-3">
										<label for="inputProductDescription" class="form-label">Nội dung bài viết</label>
										<textarea name="body" id="post_content" class="form-control" id="inputProductDescription" rows="3"><?php echo e(old("body" )); ?></textarea>

										<?php $__errorArgs = ['body'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
										<p class="text-danger"><?php echo e($message); ?></p>
										<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

									</div>

									<button class="btn btn-primary" type="submit">Thêm bài viết</button>

								</div>
							</div>
						</div>
					</div>

				</form>
			</div>
		</div>


	</div>
</div>
<!--end page wrapper -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection("script"); ?>
<!-- <script src="<?php echo e(asset('admin_dashboard_assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js')); ?>"></script> -->
<script src="<?php echo e(asset('admin_dashboard_assets/plugins/select2/js/select2.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin_dashboard_assets/plugins/input-tags/js/tagsinput.js')); ?>"></script>
<script>
	$(document).ready(function() {
		// $('#image-uploadify').imageuploadify();

		$('.single-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});

		$('.multiple-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});

		tinymce.init({
			selector: '#post_content',
			// plugins: 'advlist autolink lists link image media charmap print preview hr anchor pagebreak',
			plugins: 'advlist autolink lists link image media charmap preview anchor pagebreak',
			toolbar_mode: 'floating',
			height: '500',

			toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image code | rtl ltr',
			toolbar_mode: 'floating',

			image_title: true,
			automatic_uploads: true,

			images_upload_handler: function(blobinfo, success, failure) {
				let formData = new FormData();
				let _token = $("input[name='_token']").val();
				let xhr = new XMLHttpRequest();
				xhr.open('post', "<?php echo e(route('admin.upload_tinymce_image')); ?>");
				xhr.onload = () => {
					if (xhr.status !== 200) {
						failure("Http Error: " + xhr.status);
						return
					}
					let json = JSON.parse(xhr.responseText);
					if (!json || typeof json.location != 'string') {
						failure("Invalid JSON: " + xhr.responseText);
						return
					}
					success(json.location);

				}

				formData.append('_token', _token);
				formData.append('file', blobinfo.blob(), blobinfo.filename());
				xhr.send(formData);
			}

		});

		setTimeout(() => {
			$(".general-message").fadeOut();
		}, 5000);

	});
</script>

<script>
	$(document).on('change', '.inputPostTitle', (e) => {
		e.preventDefault();

		let $this = e.target;

		let csrf_token = $($this).parents("form").find("input[name='_token']").val();
		let titlePost = $($this).parents("form").find("input[name='title']").val();

		let formData = new FormData();
		formData.append('_token', csrf_token);
		formData.append('title', titlePost);

		$.ajax({
			url: "<?php echo e(route('admin.posts.to_slug')); ?>",
			data: formData,
			type: 'POST',
			dataType: 'JSON',
			processData: false,
			contentType: false,
			success: function(data) {
				if (data.success) {
					$('.slugPost').val(data.message);

				} else {
					alert("Bị lỗi khi nhập title !")
				}
			}
		})
	})
</script>

<script>
	function previewFiles() {
		const fileInput = document.getElementById('file-input');
		const filePreview = document.getElementById('file-preview');
		filePreview.innerHTML = ''; 

		Array.from(fileInput.files).forEach(file => {
			const reader = new FileReader();

			reader.onload = function(e) {
				const img = document.createElement('img');
				img.src = e.target.result;

				const removeButton = document.createElement('span');
				removeButton.textContent = '✖';
				removeButton.classList.add('remove-file');
				removeButton.onclick = () => {
					const newFiles = Array.from(fileInput.files).filter(f => f !== file);
					const dataTransfer = new DataTransfer();
					newFiles.forEach(f => dataTransfer.items.add(f));
					fileInput.files = dataTransfer.files;
					filePreview.removeChild(img);
					filePreview.removeChild(removeButton);
				};

				filePreview.appendChild(img);
				filePreview.appendChild(removeButton);
			};

			reader.readAsDataURL(file);
		});
	}
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin_dashboard.layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Project\newslaravel\resources\views/admin_dashboard/posts/create.blade.php ENDPATH**/ ?>