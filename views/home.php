<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"></h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-4">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="far fa-user"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total de clientes</span>
                        <span class="info-box-number">150</span>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-4">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fa fa-shopping-cart"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total de produtos</span>
                        <span class="info-box-number">850</span>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-4">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fa fa-money-bill"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total em vendas</span>
                        <span class="info-box-number">R$18.000,00</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">

                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Vendas da semana</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="chartVendasDiarias" ></canvas>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->        

            </div>

            <div class="col-sm-6">

                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Totais por finalizadora</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="chartTotaisFinalizadora"></canvas>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->        

            </div>

        </div>

    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content -->

