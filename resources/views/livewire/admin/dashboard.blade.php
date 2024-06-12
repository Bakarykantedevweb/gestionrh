<div>
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Bienvenue {{ Auth::user()->name }}</h3>
                @php
                    use Carbon\Carbon;

                    // Définir la locale en français pour les dates
                    Carbon::setLocale('fr');

                    // Obtenir la date actuelle et la formater en "jour mois année" en français
                    $date = ucfirst(Carbon::now()->isoFormat('dddd, D MMMM YYYY', 'Do MMMM YYYY'));

                    echo $date; // Affiche la date formatée avec la première lettre en majuscule

                @endphp
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active">Tableau de Bord</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    <div class="row">
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="card-body">
                    <span class="dash-widget-icon"><i class="fa fa-users"></i></span>
                    <div class="dash-widget-info">
                        <h3>{{ $users }}</h3>
                        <span>Administrateurs</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="card-body">
                    <span class="dash-widget-icon"><i class="fa fa-money"></i></span>
                    <div class="dash-widget-info">
                        <h3>{{ $contrats }}</h3>
                        <span>Contrats</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="card-body">
                    <span class="dash-widget-icon"><i class="fa fa-user"></i></span>
                    <div class="dash-widget-info">
                        <h3>{{ $agents }}</h3>
                        <span>Agents</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="card-body">
                    <span class="dash-widget-icon"><i class="fa fa-users"></i></span>
                    <div class="dash-widget-info">
                        <h3>{{ $stagiaires }}</h3>
                        <span>Stagiaires</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 text-center">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Statistiques des Agents</h3>
                    <div id="bar-charts"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6 text-center">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Statistiques des Agents</h3>
                    <div id="line-charts"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('script')
    <script>
        $(document).ready(function() {
            var graphData = @json($graphData);
            Morris.Bar({
                element: "bar-charts",
                data: graphData,
                xkey: "y",
                ykeys: ["a"],
                labels: ["Nombre d'agents"],
                lineWidth: "1px",
                barColors: ["#2C7BE5"],
                resize: true,
                redraw: true,
            });
        });
        $(document).ready(function() {
            Morris.Line({
                element: 'line-charts',
                data: [{
                        y: '2006',
                        a: 50,
                        b: 90
                    },
                    {
                        y: '2007',
                        a: 75,
                        b: 65
                    },
                    {
                        y: '2008',
                        a: 50,
                        b: 40
                    },
                    {
                        y: '2009',
                        a: 75,
                        b: 65
                    },
                    {
                        y: '2010',
                        a: 50,
                        b: 40
                    },
                    {
                        y: '2011',
                        a: 75,
                        b: 65
                    },
                    {
                        y: '2012',
                        a: 100,
                        b: 50
                    }
                ],
                xkey: 'y',
                ykeys: ['a', 'b'],
                labels: ['Total Sales', 'Total Revenue'],
                lineColors: ['#f43b48', '#453a94'],
                lineWidth: '3px',
                resize: true,
                redraw: true
            });


        });
    </script>
@endsection
