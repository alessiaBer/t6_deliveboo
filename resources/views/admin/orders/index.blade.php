@extends('layouts.admin')

@section('content')
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            <strong>{{ session('message') }}</strong>
        </div>
    @endif


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

    <div>
        <div class="container my-5">
            <canvas id="myChart"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('myChart');

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
