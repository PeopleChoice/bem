@extends('layouts.app')


@section('content')

    <section class="content">
         <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-12 col-md-4">
                  <!-- small box -->
                  <div class="small-box bg-info">
                    <div class="inner">
                      <h3>
                            @php
                                 $ecole = App\Models\Ecole::where('libelle','BEM')->orWhere('libelle','bem')->first();
                               
                                 $compteurBem = App\Models\FicheTraitementAppelEntrant::where('ecole_id',$ecole->id)->whereBetween('created_at',[date("Y-m-d")." 00.00.00",date("Y-m-d")." 23:00.00"])->count();
                                 echo $compteurBem."  Appels traités";
                            @endphp
                      </h3>
      
                      <p>BEM</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ route('admin.filtre') }}" class="small-box-footer">Voir Plus <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-12 col-md-4">
                  <!-- small box -->
                  <div class="small-box bg-success">
                    <div class="inner">
                      <h3>
                        @php
                            $ecole = App\Models\Ecole::where('libelle','BEMTECH')->orWhere('libelle','bemtech')->first();
                            $compteurBemtech = App\Models\FicheTraitementAppelEntrant::where('ecole_id',$ecole->id)->whereBetween('created_at',[date("Y-m-d")." 00.00.00",date("Y-m-d")." 23:00.00"])->count();
                            echo $compteurBemtech." Appels traités";
                        @endphp
                      </h3>
      
                      <p>BEMTECH</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{ route('admin.filtre') }}" class="small-box-footer">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
               
                <!-- ./col -->
                <div class="col-lg-4 col-12 col-md-4">
                  <!-- small box -->
                  <div class="small-box bg-danger">
                    <div class="inner">
                      <h3>
                        @php
                            $ecole = App\Models\Ecole::where('libelle','IMMI')->orWhere('libelle','immi')->first();
                            $compteurImmi = App\Models\FicheTraitementAppelEntrant::where('ecole_id',$ecole->id)->whereBetween('created_at',[date("Y-m-d")." 00.00.00",date("Y-m-d")." 23:00.00"])->count();
                            echo $compteurImmi."  Appels traités";
                        @endphp
                      </h3>
      
                      <p>IMMI</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-pie-gAPPELS RECUSph"></i>
                    </div>
                    <a href="{{ route('admin.filtre') }}" class="small-box-footer">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
              </div>
              <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="donutChart" style="min-height: 250px; height: 550px; max-height: 350px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
              </div>
              <!-- /.row -->
      
         </div>
    </section>

@endsection

@push('scripts')
  <script>
       $(function(){
        const bem = "<?php echo $compteurBem; ?>";
        const bemtech = "<?php echo $compteurBemtech; ?>";
        const immi = "<?php echo $compteurImmi; ?>";

        
           var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
            var donutData = {
                    labels: [
                        'IMMI',
                        'BEMTECH',
                        'BEM',
                       
                       
                    ],
                    datasets: [
                        {

                        data: [immi,bemtech,bem],
                        backgroundColor : ['#f56954', '#00a65a', '#3c8dbc', ],
                        }
                    ]
              }
                var donutOptions = {
                maintainAspectRatio : false,
                responsive : true,
                }       

                new Chart(donutChartCanvas, {
                    type: 'doughnut',
                    data: donutData,
                    options: donutOptions
                })
       });
  </script>
@endpush