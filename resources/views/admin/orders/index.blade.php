@extends('layouts.admin')

@section('content')
@if (session('message'))
<div class="alert alert-success" role="alert">
    <strong>{{ session('message') }}</strong>
</div>
@endif
<div class="container stat_container my-3 d-none">
    <div class="d-flex justify-content-between align-items-center pt-4">
        <h2>Monthly Sales</h2>
        <button class="btn btn-outline-light py-2 px-3 text-end tabs-btn">&LeftArrow; Back to orders <i class="fa-solid fa-clipboard-list"></i></button>
    </div>
    <canvas id="myChart"></canvas>
</div>
<div class="tab_container my-3">
    <div class="d-flex justify-content-between align-items-center py-4">
        <h2>Orders</h2>
        <button class="btn btn-outline-light py-2 px-3 text-end stats-btn"><i class="fa-solid fa-chart-line"></i> Go to
            stats &RightArrow;</button>
    </div>
    <div class="table-responsive rounded mb-3">
        <table class="table table-striped">

            <thead>
                <tr class="align-middle">
                    <th scope="col">ID</th>
                    <th scope="col">Fullname</th>
                    <th scope="col">address</th>
                    <th scope="col">phone</th>
                    <th scope="col">email</th>
                    <th scope="col">tot price</th>
                    <th scope="col">status</th>
                    <th scope="col">actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                <tr class="align-middle">
                    <td scope="row">{{ $order->id }}</td>
                    <td scope="row">
                        {{ $order->fullname }}
                    </td>
                    <td scope="row">{{ $order->address }}</td>
                    <td scope="row">{{ $order->phone }}</td>
                    <td scope="row">{{ $order->email }}</td>
                    <td scope="row">{{ $order->total_price }}</td>
                    <td scope="row">{{ $order->status }}</td>
                    <td scope="row">
                        <a class="btn btn-info" href="{{ route('admin.orders.show', $order) }}">
                            <i class="fa-solid fa-eye text-white"></i>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td scope="row">No orders found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('myChart');
    const statsBtn = document.querySelector('.stats-btn');
    const tabsBtn = document.querySelector('.tabs-btn');
    const tabContainer = document.querySelector('.tab_container');
    const statsContainer = document.querySelector('.stat_container');

    statsBtn.addEventListener('click', function() {
        tabContainer.classList.add('d-none');
        statsContainer.classList.remove('d-none');
    });

    tabsBtn.addEventListener('click', function() {
        statsContainer.classList.add('d-none');
        tabContainer.classList.remove('d-none');
    });

    const orderData = @json($orderData);

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: orderData.months,
            datasets: [{
                label: '# of Orders',
                data: orderData.orderCounts,
                borderWidth: 1,
                tension: 0.3
            }]
        },
        options: {

            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection