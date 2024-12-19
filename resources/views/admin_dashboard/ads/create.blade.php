@extends('admin_dashboard.layouts.app')

@section('wrapper')
<div class="page-wrapper">
    <div class="page-content">
        <h1>Create Ad</h1>
        <form action="{{ route('admin.ads.store') }}" method="POST">
            @csrf
            <div class="form-group position-relative">
    <label for="user_id">Người dùng</label>
    <input type="text" id="user_input" class="form-control" placeholder="Nhập tên người dùng...">
    <ul class="dropdown-menu w-100" id="user_list" style="display: none; max-height: 200px; overflow-y: auto;">
        @foreach ($users as $user)
            <li class="dropdown-item" data-id="{{ $user->id }}">{{ $user->name }}</li>
        @endforeach
    </ul>
    <input type="hidden" name="user_id" id="selected_user_id">
    @error('user_id')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>



            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="img">Image URL</label>
                <input type="text" name="img" id="img" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="status">Trạng thái</label>
                <select name="status" id="status" class="form-control">
                    <option value="pending" {{ old('status', $ad->status ?? '') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="approved" {{ old('status', $ad->status ?? '') == 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="active" {{ old('status', $ad->status ?? '') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="cancelled" {{ old('status', $ad->status ?? '') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    <option value="completed" {{ old('status', $ad->status ?? '') == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="Running" {{ old('status', $ad->status ?? '') == 'Running' ? 'selected' : '' }}>Running</option>
                </select>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="link">Link</label>
                <input type="text" name="link" id="link" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control">
            </div>
            <div class="form-group">
                <label for="start_time">Start Time</label>
                <input type="datetime-local" name="start_time" id="start_time" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="end_time">End Time</label>
                <input type="datetime-local" name="end_time" id="end_time" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="position_id">Position</label>
                <select name="position_id" id="position_id" class="form-control" required>
                    @foreach ($positions as $position)
                    <option value="{{ $position->id }}">{{ $position->position }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>


<script>
document.addEventListener('DOMContentLoaded', function () {
    const userInput = document.getElementById('user_input');
    const userList = document.getElementById('user_list');
    const userIdInput = document.getElementById('selected_user_id');
    const dropdownItems = Array.from(userList.querySelectorAll('.dropdown-item'));

    // Hiển thị danh sách khi input được focus
    userInput.addEventListener('focus', function () {
        userList.style.display = 'block';
    });

    // Ẩn danh sách khi input mất focus
    userInput.addEventListener('blur', function () {
        setTimeout(() => {
            userList.style.display = 'none';
        }, 200); // Đợi một chút để xử lý sự kiện click trên item
    });

    // Lọc danh sách khi nhập
    userInput.addEventListener('input', function () {
        const filter = userInput.value.toLowerCase();
        dropdownItems.forEach(item => {
            if (item.textContent.toLowerCase().includes(filter)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });

    // Chọn người dùng từ danh sách
    userList.addEventListener('click', function (e) {
        if (e.target.classList.contains('dropdown-item')) {
            userInput.value = e.target.textContent;
            userIdInput.value = e.target.getAttribute('data-id');
            userList.style.display = 'none';
        }
    });
});


</script>
@endsection
