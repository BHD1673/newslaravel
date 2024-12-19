@extends('admin_dashboard.layouts.app')

@section('wrapper')
<div class="page-wrapper">
    <div class="page-content">
        <h1>Edit Ad</h1>
        <form action="{{ route('admin.ads.update', $ad->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="user_id">Người dùng</label>
                <select name="user_id" id="user_id" class="form-control">
                    <option value="">Chọn người dùng</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $ad->user_id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
                @error('user_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $ad->title) }}" required>
                @error('title')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            

            <div class="form-group">
                <label for="img">Image URL</label>
                <input type="text" name="img" id="img" class="form-control" value="{{ old('img', $ad->img) }}" required>
                @error('img')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="status">Trạng thái</label>
                <select name="status" id="status" class="form-control">
                    <option value="pending" {{ old('status', $ad->status ?? '') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="approved" {{ old('status', $ad->status ?? '') == 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="active" {{ old('status', $ad->status ?? '') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="cancelled" {{ old('status', $ad->status ?? '') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    <option value="completed" {{ old('status', $ad->status ?? '') == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="running" {{ old('status', $ad->status ?? '') == 'running' ? 'selected' : '' }}>Running</option>
                </select>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="link">Link</label>
                <input type="text" name="link" id="link" class="form-control" value="{{ old('link', $ad->link) }}">
                @error('link')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $ad->email) }}" required>
                @error('email')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $ad->phone) }}">
                @error('phone')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="start_time">Start Time</label>
                <input type="datetime-local" name="start_time" id="start_time" class="form-control" value="{{ old('start_time', \Carbon\Carbon::parse($ad->start_time)->format('Y-m-d\TH:i')) }}" required>
                @error('start_time')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="end_time">End Time</label>
                <input type="datetime-local" name="end_time" id="end_time" class="form-control" value="{{ old('end_time', \Carbon\Carbon::parse($ad->end_time)->format('Y-m-d\TH:i')) }}" required>
                @error('end_time')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="position_id">Position</label>
                <select name="position_id" id="position_id" class="form-control" required>
                    @foreach ($positions as $position)
                    <option value="{{ $position->id }}" {{ $ad->position_id == $position->id ? 'selected' : '' }}>{{ $position->position }}</option>
                    @endforeach
                </select>
                @error('position_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
