  @include('layout.header')
  @include('layout.sidebar')
  <main id="main" class="main">

      <div class="pagetitle">
          <h1>Dashboard</h1>
          <nav>
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item active">{{ $title }}</li>
              </ol>
          </nav>
      </div><!-- End Page Title -->

      <section class="section dashboard">
          <div class="row">

              <!-- Left side columns -->
              <div class="col-lg-12">
                  <div class="row">

                      <!-- Sales Card -->
                      <div class="col-xxl-4 col-md-4">
                          <div class="card info-card sales-card">
                              <div class="card-body">
                                  <h5 class="card-title">Product <span>| This Year</span></h5>

                                  <div class="d-flex align-items-center">
                                      <div
                                          class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                          <i class="bi bi-handbag-fill"></i>

                                      </div>
                                      <div class="ps-3">
                                          <h6>{{ $totalProductCurrentYear }}</h6>
                                          <span class="text-success small pt-1 fw-bold">12%</span> <span
                                              class="text-muted small pt-2 ps-1">increase</span>

                                      </div>
                                  </div>
                              </div>

                          </div>
                      </div><!-- End Sales Card -->

                      <!-- Revenue Card -->
                      <div class="col-xxl-4 col-md-4">
                          <div class="card info-card revenue-card">
                              <div class="card-body">
                                  <h5 class="card-title">Highest price <span>| This Year</span></h5>

                                  <div class="d-flex align-items-center">
                                      <div
                                          class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                          <i class="bi bi-currency-dollar"></i>
                                      </div>
                                      <div class="ps-3">
                                          <h6>{{ $highestPrice }}</h6>
                                          <span class="text-success small pt-1 fw-bold">8%</span> <span
                                              class="text-muted small pt-2 ps-1">increase</span>

                                      </div>
                                  </div>
                              </div>

                          </div>
                      </div><!-- End Revenue Card -->

                      <!-- Customers Card -->
                      <div class="col-xxl-4 col-md-4">

                          <div class="card info-card customers-card">
                              <div class="card-body">
                                  <h5 class="card-title">Customers <span>| This Year</span></h5>

                                  <div class="d-flex align-items-center">
                                      <div
                                          class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                          <i class="bi bi-people"></i>
                                      </div>
                                      <div class="ps-3">
                                          <h6>{{ $customersThisYear }}</h6>
                                          <span class="text-danger small pt-1 fw-bold">{{ $percentage }}%</span>

                                      </div>
                                  </div>

                              </div>
                          </div>

                      </div><!-- End Customers Card -->

                      <!-- Reports -->
                      <div class="col-12">
                          <div class="card">
                              <div class="card-body">
                                  <h5 class="card-title">Reports <span>/Today</span></h5>

                                  <!-- Line Chart -->
                                  <div id="reportsChart"></div>

                                  <script>
                                      document.addEventListener("DOMContentLoaded", () => {
                                          new ApexCharts(document.querySelector("#reportsChart"), {
                                              series: [{
                                                  name: 'Sales',
                                                  data: [31, 40, 28, 51, 42, 82, 56],
                                              }, {
                                                  name: 'Revenue',
                                                  data: [11, 32, 45, 32, 34, 52, 41]
                                              }, {
                                                  name: 'Customers',
                                                  data: [15, 11, 32, 18, 9, 24, 11]
                                              }],
                                              chart: {
                                                  height: 350,
                                                  type: 'area',
                                                  toolbar: {
                                                      show: false
                                                  },
                                              },
                                              markers: {
                                                  size: 4
                                              },
                                              colors: ['#4154f1', '#2eca6a', '#ff771d'],
                                              fill: {
                                                  type: "gradient",
                                                  gradient: {
                                                      shadeIntensity: 1,
                                                      opacityFrom: 0.3,
                                                      opacityTo: 0.4,
                                                      stops: [0, 90, 100]
                                                  }
                                              },
                                              dataLabels: {
                                                  enabled: false
                                              },
                                              stroke: {
                                                  curve: 'smooth',
                                                  width: 2
                                              },
                                              xaxis: {
                                                  type: 'datetime',
                                                  categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z",
                                                      "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z",
                                                      "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z",
                                                      "2018-09-19T06:30:00.000Z"
                                                  ]
                                              },
                                              tooltip: {
                                                  x: {
                                                      format: 'dd/MM/yy HH:mm'
                                                  },
                                              }
                                          }).render();
                                      });
                                  </script>
                                  <!-- End Line Chart -->

                              </div>

                          </div>
                      </div><!-- End Reports -->

                      <!-- Top Selling -->
                      <div class="col-12">
                          <div class="card top-selling overflow-auto">
                              <div class="card-body pb-0">
                                  <h5 class="card-title">Top Produk <span>| Today</span></h5>

                                  <table class="table table-borderless">
                                      <thead>
                                          <tr>
                                              <th scope="col">Produk</th>
                                              <th scope="col">Harga</th>
                                              <th scope="col">Stok</th>
                                              <th scope="col">Kategori</th>
                                              <th scope="col">Merk</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          @foreach ($products as $item)
                                              <tr>
                                                  <td>{{ $item->name }}</td>
                                                  <td>{{ $item->price }}</td>
                                                  <td>{{ $item->stock }}</td>
                                                  <td>{{ $item->category }}</td>
                                                  <td>{{ $item->brand }}</td>
                                              </tr>
                                          @endforeach
                                      </tbody>
                                  </table>

                              </div>

                          </div>
                      </div><!-- End Top Selling -->

                  </div>
              </div><!-- End Left side columns -->

          </div>
      </section>

  </main><!-- End #main -->
  @include('layout.footer')
