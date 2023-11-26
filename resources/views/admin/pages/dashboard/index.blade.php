@extends('admin.shares.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 pl-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="row p-2" id="app-dashboard">
            <div class="col-md-3">
                <div class="col-6 col-md-12">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>@{{ total_order }}</h3>
                            <p>New Orders</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-6 col-md-12">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>@{{ total_user }}</h3>
                            <p>User Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <div>
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        new Vue({
            el: "#app-dashboard",
            data: {
                total_user: 0,
                total_order: 0,
            },
            created() {
                this.getTotalUser();
                this.getTotalOrder();
            },
            methods: {
                getTotalUser() {
                    axios
                        .get('/adminlte/dashboard/get-total-user')
                        .then((res) => {
                            this.total_user = res.data.data;
                        });
                },
                getTotalOrder() {
                    axios
                        .get('/adminlte/dashboard/get-total-order')
                        .then((res) => {
                            this.total_order = res.data.data;
                        });
                },
            },
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var labels = {!! json_encode($labels) !!};
        var data_js = {!! json_encode($data_js) !!};
        const data = {
            labels: labels,
            datasets: [{
                label: 'Total money in a month',
                backgroundColor: '#999966',
                borderColor: '#999966',
                data: data_js,
                barThickness: 90,
            }]
        };
        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        type: 'linear',
                        min: 0,
                        max: Math.max(...data_js) + 2,
                        ticks: {
                            stepSize: 2
                        }
                    },
                },

            }
        };
    </script>
    <script>
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
@endsection
