@extends("admin_dashboard.layouts.app")

@section("wrapper")
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Ads Payments</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Payments</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="d-lg-flex align-items-center mb-4 gap-3">
                    <div class="position-relative">
                        <input type="text" class="form-control ps-5 radius-30" placeholder="Search payments">
                        <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
                    </div>
                    <div class="ms-auto">
                            {{-- <a href="{{ route('admin.ads_payment.create') }}" class="btn btn-primary radius-30 mt-2 mt-lg-0">
                                <i class="bx bxs-plus-square"></i> Add New Payment
                            </a> --}}
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Khách Hàng</th>
                                <th>Tổng tiền</th>
                                <th>Trạng Thái</th>
                                <th>Phương Thức</th>
                                <th>Thời Gian Thanh Toán</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                            <tr>
                                <td>#{{ $payment->id }}</td>
                                <td>
                                    @if ($payment->ad && $payment->ad->user)
                                    {{ $payment->ad->user->name }}
                                @else
                                    <span class="text-muted">Unknown User</span>
                                @endif
                                </td>
                              
                                <td>{{ $payment->amount }}</td>
                                <td>{{ ucfirst($payment->payment_status) }}</td>
                                <td>{{ ucfirst($payment->payment_method) }}</td>
                                <td>{{ $payment->paid_at }}</td>
                                <td>
                                    <div class="d-flex order-actions">
                                        <a href="{{ route('admin.ads_payment.edit', $payment->id) }}" class=""><i class='bx bxs-edit'></i></a>
                                        <a href="#" onclick="event.preventDefault(); document.querySelector('#delete_form_{{ $payment->id }}').submit();" class="ms-3"><i class='bx bxs-trash'></i></a>

                                        <form method="post" action="{{ route('admin.ads_payment.destroy', $payment->id) }}" id="delete_form_{{ $payment->id }}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
