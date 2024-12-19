@extends("admin_dashboard.layouts.app")
@section("style")

<link href="{{ asset('admin_dashboard_assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('admin_dashboard_assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />

<link href="{{ asset('admin_dashboard_assets/plugins/input-tags/css/tagsinput.css') }}" rel="stylesheet" />
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

	.img-container img {
		max-width: 100px;
		margin: 5px;
		border: 1px solid #ccc;
		border-radius: 5px;
	}
</style>

<script src="https://cdn.tiny.cloud/1/lznr63210nbzoewpj5ol9gmlo87s0u29t65bf1essng7cak1/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>@endsection

@section("wrapper")
<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">
		<!--breadcrumb-->
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Bài viết</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Bài viết</li>
					</ol>
				</nav>
			</div>
		</div>
		<!--end breadcrumb-->

		<div class="card">
			<div class="card-body p-4">
				<h5 class="card-title">Sửa bài viết: {{ $post->title}}</h5>
				<hr />
				<form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
					@csrf
					@method('PATCH')
					<div class="form-body mt-4">
						<div class="row">
							<div class="col-lg-12">
								<div class="border border-3 p-4 rounded">
									<div class="mb-3">
										<label for="inputProductTitle" class="form-label">Tiêu đề bài viết</label>
										<input type="text" {{ $isEmployee ? 'disabled' : '' }} value='{{ old("title", $post->title) }}' name="title"  class="inputPostTitle form-control" id="inputProductTitle" placeholder="Nhập tiêu đề bài viết">

										@error('title')
										<p class="text-danger">{{ $message }}</p>
										@enderror
									</div>

									<div class="mb-3">
										<label for="inputProductTitle" class="form-label">Slug - liên kết</label>
										<input type="text" {{ $isEmployee ? 'disabled' : '' }} value='{{ old("slug", $post->slug) }}' name="slug"  class="slugPost form-control" id="inputProductTitle" placeholder="Nhập slug">

										@error('slug')
										<p class="text-danger">{{ $message }}</p>
										@enderror
									</div>

									<div class="mb-3">
										<label for="inputProductDescription" class="form-label">Mô tả</label>
										<textarea  name="excerpt" {{ $isEmployee ? 'disabled' : '' }} class="form-control" id="inputProductDescription" rows="3">{{ old("excerpt", $post->excerpt) }}</textarea>

										@error('excerpt')
										<p class="text-danger">{{ $message }}</p>
										@enderror

									</div>

									<div class="mb-3">
										<label for="inputProductTitle" class="form-label">Danh mục bài viết</label>
										<div class="card">
											<div class="card-body">
												<div class="p-3 rounded">
													<div class="mb-3">
														<select {{ $isEmployee ? 'disabled' : '' }} name="category_id"  class="single-select form-control">
															@foreach( $categories as $key => $category )

															<option {{ $post->category_id === $key ? 'selected' : '' }} value="{{ $key }}">{{ $category }}</option>
															@endforeach
														</select>

														@error('category_id')
														<p class="text-danger">{{ $message }}</p>
														@enderror

													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="mb-3 disabled:opacity-75">
										<label class="form-label">Từ khóa</label>
										<input type="text" {{ $isEmployee ? 'disabled' : '' }} id="removeonlyinput" class="form-control {{ $isEmployee ? 'opacity-75' : '' }}" value="{{ $tags }}" name="tags" data-role="tagsinput">
									</div>

									<!-- <input id="image-uploadify" name="thumbnail" type="file" id="file" accept="image/*" multiple> -->
									<div class="mb-3">
										<div class="row">
											<div class="col-md-6">
												<label for="inputProductDescription" class="form-label">Hình ảnh bài viết</label>

												<div class="upload-area">
													<input {{ $isEmployee ? 'disabled' : '' }} type="file" name="files[]" multiple id="file-input" onchange="previewFiles()">
													<div class="file-preview my-4" id="file-preview">
													</div>

													@if(isset($postImages) && count($postImages) > 0)
													<div class="img-container d-flex justify-content-center">
														@foreach($postImages as $image)
														<div class="image-wrapper">
															<img accept="image/*" src="{{ asset($image->path) }}" data-id="{{ $image->id }}" alt="Image" />
															<span class="remove-post-img" role="button" data-id="{{ $image->id }}">x</span>
														</div>
														@endforeach
													</div>
													@endif
												</div>
												<input type="hidden" name="removed_post_images" id="removed_post_images" value="" />
												@error('files')
												<p class="text-danger">{{ $message }}</p>
												@enderror
											</div>
											<div class="col-md-6">
												<label for="inputProductDescription" class="form-label">Video bài viết</label>

												<div class="upload-area">
													<input {{ $isEmployee ? 'disabled' : '' }} type="file" accept=".mp3,.mp4" name="videos[]" multiple id="file-input-video" onchange="previewFileVideos()">
													<div class="mt-3" id="preview-container">
														<ul id="preview-list"></ul>
													</div>
												

												<div class="mt-3" id="preview-container">
													<ul id="preview-list">
														@if(!empty($videoFiles))
														@foreach($videoFiles as $videoFile)
														<li id="video-{{ $loop->index }}">
															<video width="300" controls>
																<source src="{{ asset('storage/videos/' . $post->id . '/' . basename($videoFile)) }}" type="video/mp4">
																Your browser does not support the video tag.
															</video>
															<button type="button" onclick="removeVideo('{{ $loop->index }}', '{{ basename($videoFile) }}')">Xóa</button>
														</li>
														@endforeach
														@endif
													</ul>
													<input type="hidden" name="removed_post_videos" id="removed_post_videos" value="" />
												</div>
											</div>
										</div>
									</div>

								</div>

							</div>

							<div class="mb-3">
								<label for="inputProductDescription" class="form-label">Nội dung bài viết</label>
								<textarea {{ $isEmployee ? 'disabled' : '' }} name="body" id="post_content" class="form-control" rows="3">{{ old("body", str_replace('../../', '../../../', $post->body )) }}</textarea>
								@error('body')
								<p class="text-danger">{{ $message }}</p>
								@enderror
							</div>

							<div class="mb-3 col-12 col-md-6 {{ $isReporter ? 'd-none' : ''  }}">
								<label for="inputProductDescription" class="form-label">Trạng thái bài viết</label>
								<select
									{{ $postLog ? $postLog->role_log === 'admin' && $isEmployee ? 'disabled' : ''  : ''}}
									onclick="toggleReasonField(this)" id="flexSwitchChecked" class="form-select" name="approved" aria-label="Default select example">
									<option value="1" {{ $post->approved === 1 ? 'selected' : '' }}>Chưa phê duyệt</option>
									<option value="2" {{ $post->approved === 2 ? 'selected' : '' }}>Từ chối</option>
									<option value="3" {{ $post->approved === 3 ? 'selected' : '' }}>Duyệt bài viết</option>
								</select>
							</div>
							@if(!$isReporter)
							<div id="reasonField" class="my-3" style="display: none;">
								<label for="inputProductDescription" class="form-label">
									Lý do từ chối {{ $postLog ? $postLog->role_log === 'employee' ? "Employee" : "" : "" }}
									<b>
										{{ $postLog ? $postLog->role_log === 'admin' && $isEmployee ? 'bạn không thể duyệt bài khi quản trị đã không đồng ý duyệt bài này' : ' '  : " (*) người dùng bắt buộc phải nhập"}}
									</b>
								</label>
								<input type="hidden" name="id_post_log" value="{{  $postLog ? $postLog->id : '' }}" />
								<textarea  {{ $postLog ? $postLog->role_log === 'admin' && $isEmployee ? 'disabled' : ''  : ''}} name="note" class="form-control" rows="3">{{ $postLog ? $postLog->note : ""  }}</textarea>
								@error('note')
								<p class="text-danger">{{ $message }}</p>
								@enderror
							</div>
							@endif

							<button
								{{ ( $isEmployee && $post->approved === 3 ) || ( $postLog ? $postLog->role_log === 'admin' && $isEmployee : '') ? 'disabled' : '' }}
								class="btn btn-primary {{ $isReporter && $post->approved === 3 ? 'd-none' : "" }}"
								type="submit">
								{{ $isEmployee ? 'Duyệt bài' : 'Sửa bài viết' }}
							</button>
							

							<a class="btn btn-danger {{ ($isEmployee && $post->approved === 3) || $post->approved === 3  ? 'd-none' : '' }}" onclick="event.preventDefault(); document.getElementById('delete_post_{{ $post->id }}').submit();"
								href="#">Xóa bài viết</a>

						</div>
					</div>
			</div>
		</div>

		</form>

		<form id="delete_post_{{ $post->id }}" action="{{ route('admin.posts.destroy', $post) }}" method="post">
			@csrf
			@method('DELETE')
		</form>

	</div>
</div>


</div>
</div>
<!--end page wrapper -->
@endsection

@section("script")
<!-- <script src="{{ asset('admin_dashboard_assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js') }}"></script> -->
<script src="{{ asset('admin_dashboard_assets/plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('admin_dashboard_assets/plugins/input-tags/js/tagsinput.js') }}"></script>
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
			selector: 'textarea#post_content',
			plugins: 'advlist autolink lists link image media charmap preview anchor pagebreak',
			toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image code | rtl ltr',
			/* enable title field in the Image dialog*/
			image_title: true,
			toolbar_mode: 'floating',
			height: '500',
			/* enable automatic uploads of images represented by blob or data URIs*/
			automatic_uploads: true,
			/*
			  URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
			  images_upload_url: 'postAcceptor.php',
			  here we add custom filepicker only to Image dialog
			*/
			file_picker_types: 'image',
			/* and here's our custom image picker*/
			file_picker_callback: (cb, value, meta) => {
				const input = document.createElement('input');
				input.setAttribute('type', 'file');
				input.setAttribute('accept', 'image/*');

				input.addEventListener('change', (e) => {
					const file = e.target.files[0];

					const reader = new FileReader();
					reader.addEventListener('load', () => {
						/*
						  Note: Now we need to register the blob in TinyMCEs image blob
						  registry. In the next release this part hopefully won't be
						  necessary, as we are looking to handle it internally.
						*/
						const id = 'blobid' + (new Date()).getTime();
						const blobCache = tinymce.activeEditor.editorUpload.blobCache;
						const base64 = reader.result.split(',')[1];
						const blobInfo = blobCache.create(id, file, base64);
						blobCache.add(blobInfo);

						/* call the callback and populate the Title field with the file name */
						cb(blobInfo.blobUri(), {
							title: file.name
						});
					});
					reader.readAsDataURL(file);
				});

				input.click();
			},
			content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
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
			url: "{{ route('admin.posts.to_slug') }}",
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

<script>
	document.addEventListener('DOMContentLoaded', function() {
		const removeButtons = document.querySelectorAll('.remove-post-img');
		const removedImagesInput = document.getElementById('removed_post_images');
		removeButtons.forEach(button => {
			button.addEventListener('click', function() {
				const imageId = this.getAttribute('data-id');


				// Ẩn phần tử ảnh hiện tại
				this.closest('.image-wrapper').style.display = 'none';

				// Cập nhật danh sách ảnh đã bị xóa
				let removedImages = removedImagesInput.value.split(',').filter(Boolean);
				if (!removedImages.includes(imageId)) {
					removedImages.push(imageId);
				}
				removedImagesInput.value = removedImages.join(',');
			});
		});
	});
</script>

<script>
	// sử lú hiện thị form từ trối
	function toggleReasonField(select) {
		const reasonField = document.getElementById('reasonField');
		if (select.value === '2') {
			reasonField.style.display = 'block';
		} else {
			reasonField.style.display = 'none';
		}
	}

	document.addEventListener('DOMContentLoaded', function() {
		toggleReasonField(document.getElementById('flexSwitchChecked'));
	});
</script>
<script>
	//updaload video 
	function previewFileVideos() {
		const fileInput = document.getElementById('file-input-video')
		const previewContainer = document.getElementById('preview-list');
		const files = fileInput.files;

		// Clear the previous preview content
		previewContainer.innerHTML = '';

		for (const file of files) {
			const fileExtension = file.name.split('.').pop().toLowerCase();

			if (fileExtension === 'mp4') {
				const listItem = document.createElement('li');
				const video = document.createElement('video');
				const source = document.createElement('source');
				const deleteButton = document.createElement('button');

				// Tạo video và source
				source.src = URL.createObjectURL(file);
				source.type = 'video/mp4';
				video.controls = true;
				video.width = 300;
				video.appendChild(source);

				// Tạo nút xóa
				deleteButton.textContent = 'X';
				deleteButton.style.background = 'red';
				deleteButton.style.color = 'white';
				deleteButton.style.border = 'none';
				deleteButton.style.padding = '5px 10px';
				deleteButton.style.margin = '5px';
				deleteButton.style.cursor = 'pointer';

				// Xử lý khi bấm nút xóa
				deleteButton.onclick = function() {
					// Xóa video khỏi danh sách hiển thị
					listItem.remove();
					// Xóa file khỏi input
					const index = Array.from(fileInput.files).indexOf(file);
					const dt = new DataTransfer();
					for (let i = 0; i < fileInput.files.length; i++) {
						if (i !== index) {
							dt.items.add(fileInput.files[i]);
						}
					}
					fileInput.files = dt.files;
				};

				// Thêm video và nút xóa vào danh sách
				listItem.appendChild(video);
				listItem.appendChild(deleteButton);
				previewContainer.appendChild(listItem);
			}
		}
	}

	function removeVideo(index, videoFile) {
        // Xóa video khỏi giao diện
        const videoItem = document.getElementById('video-' + index);
        if (videoItem) {
            videoItem.remove();
        }

        // Cập nhật video bị xóa vào input ẩn
        let removedVideos = document.getElementById('removed_post_videos').value;
        removedVideos += videoFile + ','; // Thêm video đã xóa vào danh sách
        document.getElementById('removed_post_videos').value = removedVideos;
    }
</script>

@endsection