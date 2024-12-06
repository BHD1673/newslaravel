@extends('main_layouts.master')

@section('content')
<!-- resources/views/ads/form.blade.php -->
<style>
    .form-container {
    max-width: 400px;
    margin: 20px auto;
    padding: 20px;
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    font-family: Arial, sans-serif;
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

.form-select, .form-input {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.form-button {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    color: #fff;
    background-color: #007bff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.form-button:hover {
    background-color: #0056b3;
}

</style>

<form action="{{ route('ads.store') }}" method="POST" class="p-4 bg-light rounded shadow-sm" mut>
    @csrf
    <div class="mb-3" style="margin-bottom: 20px;left: 10px;">
        <label for="position" class="form-label">Vị trí quảng cáo:</label>
        <select name="position" id="position" class="form-select">
            @foreach ($positions as $position)
                <option value="{{ $position }}">{{ ucfirst($position) }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3" style="margin-bottom: 20px;">
        <label for="time_slot" class="form-label">Khung giờ:</label>
        <select name="time_slot" id="time_slot" class="form-select">
            @foreach ($timeSlots as $slot)
                <option value="{{ $slot }}">{{ ucfirst($slot) }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3" style="margin-bottom: 20px;">
        <label for="date" class="form-label">Chọn ngày:</label>
        <input type="date" name="date" id="date" class="form-control" >
    </div>
    

    <button type="submit" class="btn btn-primary w-100" style="margin-bottom: 20px;">Kiểm tra</button>
</form>




<script>
$('#position, #time_slot, #date').on('change', function() {
    const position = $('#position').val();
    const timeSlot = $('#time_slot').val();
    const date = $('#date').val();

    $.ajax({
        url: '/ads/check-availability',
        method: 'POST',
        data: {
            position: position,
            time_slot: timeSlot,
            date: date,
            _token: '{{ csrf_token() }}',
        },
        success: function(response) {
            alert(response.message);
        }
    });
});

</script>
@endsection