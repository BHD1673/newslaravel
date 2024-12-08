
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <div class="container">
        <h1>Thanh toán quảng cáo</h1>

        <form action="{{ route('ads.processPayment', $ad->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="amount">Tổng tiền</label>
                <input type="text" name="amount" id="amount" class="form-control" value="{{ $deposit + $paid_amount }}" readonly>
            </div>

            <div class="form-group">
                <label for="deposit">Tiền cọc (20%)</label>
                <input type="text" name="deposit" id="deposit" class="form-control" value="{{ $deposit }}" readonly>
            </div>

            <div class="form-group">
                <label for="paid_amount">Tiền gốc (80%)</label>
                <input type="text" name="paid_amount" id="paid_amount" class="form-control" value="{{ $paid_amount }}" readonly>
            </div>

            <div class="form-group">
                <label for="payment_method">Phương thức thanh toán</label>
                <select name="payment_method" id="payment_method" class="form-control" required>
                    <option value="VNPay">VNPay</option>
                    <option value="bank_transfer">Chuyển khoản ngân hàng</option>
                    <option value="other">Phương thức khác</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Thanh toán</button>
        </form>
    </div>
