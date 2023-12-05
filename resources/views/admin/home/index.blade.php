<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-success pull-right">Joined</span>
                    <h5>Number of Users</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{ $number_of_users }}</h1>
                    <div class="stat-percent font-bold text-success">Increasing <i class="fa fa-bolt"></i></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-primary pull-right">Supported</span>
                    <h5>Number of Categories</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{ $number_of_device_categories }}</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-danger pull-right">Online</span>
                    <h5>Number of Hubs</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{ $number_of_hubs }} </h1>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-info pull-right">Subcribed</span>
                    <h5>Number of Devices</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{ $number_of_devices }}</h1>
                </div>
            </div>
        </div>


    </div>
    <div class="row">
        <div class="col-lg-6">
            <canvas id="lineChart" width="400" height="200"></canvas>
        </div>
        <div class="col-lg-6">
            <canvas id="barChart" width="400" height="200"></canvas>
        </div>
    </div>
    <br>
    <div class="row">

        <canvas id="weatherChart" width="400" height="200"></canvas>

    </div>
</div>
<!-- Thêm thư viện Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('/frontend/js/weather.js') }}"></script>
<script>
    // Tạo dữ liệu ngẫu nhiên
    function generateRandomData() {
        return Array.from({
            length: 7
        }, () => Math.floor(Math.random() * 50) + 10);
    }

    // Lấy canvas và context cho Line Chart
    var lineCanvas = document.getElementById('lineChart');
    var lineContext = lineCanvas.getContext('2d');

    // Lấy canvas và context cho Bar Chart
    var barCanvas = document.getElementById('barChart');
    var barContext = barCanvas.getContext('2d');

    // Tạo đồ thị Line Chart
    var lineChart = new Chart(lineContext, {
        type: 'line',
        data: {
            labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
            datasets: [{
                label: 'Access Times',
                borderColor: 'rgba(75, 192, 192, 1)',
                data: generateRandomData(),
            }]
        },
    });

    // Tạo đồ thị Bar Chart
    var barChart = new Chart(barContext, {
        type: 'bar',
        data: {
            labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
            datasets: [{
                label: 'Working Time',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1,
                data: generateRandomData(),
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
<script>
    function drawChart(temperature, humidity) {
        const ctx = document.getElementById('weatherChart').getContext('2d');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Temperature', 'Humidity'],
                datasets: [{
                    label: 'Weather in Hanoi',
                    backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)'],
                    borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)'],
                    borderWidth: 1,
                    data: [temperature, humidity],
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                responsive: true,
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        fontColor: 'black', // Đổi màu chữ của legend
                    },
                },
                plugins: {
                    datalabels: {
                        anchor: 'end',
                        align: 'end',
                        color: 'black', // Đổi màu chữ của giá trị trên biểu đồ
                        formatter: function(value, context) {
                            return value; // Hiển thị giá trị của thanh trên biểu đồ
                        }
                    }
                }
            }
        });
    }
</script>
