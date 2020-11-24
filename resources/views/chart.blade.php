<link rel="stylesheet" href="{{url(urlnya().'bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url(urlnya().'bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{url(urlnya().'bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url(urlnya().'dist/css/AdminLTE.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{url(urlnya().'bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{url(urlnya().'dist/css/skins/_all-skins.min.css')}}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{url(urlnya().'bower_components/morris.js/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{url(urlnya().'bower_components/jvectormap/jquery-jvectormap.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{url(urlnya().'bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{url(urlnya().'bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{url(urlnya().'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    
        <div style="display:none">
        @foreach(calon() as $no=>$kec)
            <div class="col-lg-2 col-xs-6">
                <!-- small box -->
                <div class="small-box " style="background:{{$kec['warna']}}">
                    <div class="inner">
                        <h3>{{round((sub_total($kec['id'])/seluruh())*100,2)}}%</h3>

                        <p>{{$kec['singkatan']}}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            
        @endforeach
          <div class="col-lg-2 col-xs-6">
              <!-- small box -->
              <div class="small-box " style="background:#001F3F;color:#fff">
                  <div class="inner">
                      <h3>{{round((sub_total(0)/seluruh())*100,2)}}%</h3>

                      <p>Tidak Sah</p>
                  </div>
                  <div class="icon">
                      <i class="ion ion-pie-graph"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
          </div>
          <div class="col-lg-2 col-xs-6">
              <!-- small box -->
              <div class="small-box " style="background:red;color:#fff">
                  <div class="inner">
                      <h3>{{round((sub_total(11)/seluruh())*100,2)}}%</h3>

                      <p>Blanko</p>
                  </div>
                  <div class="icon">
                      <i class="ion ion-pie-graph"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
          </div>
        </div>
        <div style="text-align:center;width:100%">
        @foreach(calon() as $no=>$kec)
            <div class="col-md-2" style="border:solid 1px #ecdfdf;background:#dae4ea9c">
                <div class="small-box " style="background:{{$kec['warna']}};padding:10%;text-align:center">
                    <b>{{$kec['singkatan']}} &nbsp;&nbsp;&nbsp;</b><img src="{{paslon($kec['urut'])}}" width="90%"> 
                </div>
                <div class="small-box " style="background:#fff;padding:5px;font-size:20px">
                    <b> {{number_format(sub_total($kec['id']),0)}}</b><br>
                    <b> {{round((sub_total($kec['id'])/seluruh())*100,2)}}%</b>
                </div>
            </div>
            
        @endforeach
            <div class="col-md-2" style="border:solid 1px #ecdfdf;background:#dae4ea9c;">
                <div class="small-box " style="background:red;padding:10%;text-align:center">
                <b>TIDAK SAH </b><img src="{{paslon(0)}}" width="90%"> 
                </div>
                <div class="small-box " style="background:#fff;padding:5px;font-size:20px">
                    <b> {{number_format(sub_total(0),0)}}</b><br>
                    <b> {{round((sub_total(0)/seluruh())*100,2)}}%</b>
                </div>
            </div>
            <div class="col-md-2" style="border:solid 1px #ecdfdf;background:#dae4ea9c;">
                <div class="small-box " style="background:red;padding:10%;text-align:center">
                    <b>BLANKO </b><img src="{{paslon(0)}}" width="90%"> 
                </div>
                <div class="small-box " style="background:#fff;padding:5px;font-size:20px">
                    <b> {{number_format(sub_total(11),0)}}</b><br>
                    <b> {{round((sub_total(11)/seluruh())*100,2)}}%</b>
                </div>
            </div>
        </div>
        
        <div class="col-md-6" style="display:none">
          
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Area Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="areaChart" style="height:250px"></canvas>
              </div>
            </div>
           
          </div>
          
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Donut Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <canvas id="pieChart" style="height:250px"></canvas>
            </div>
            
          </div>
          
          

        </div>





        <div class="col-md-12" style="display:none">
            
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Hasil Rekapitulasi Pemilihan Umum </h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="chart">
                        <canvas id="lineChart" style="height:250px"></canvas>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Hasil Rekapitulasi Pemilihan Umum Kota Cilegon</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    
                    
                    <div class="chart">
                        <canvas id="batangChart" style="height:230px"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Hasil Rekapitulasi Pemilihan Umum Perkecamatan</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="chart">
                        <canvas id="barChart" style="height:230px"></canvas>
                    </div>
                </div>
            </div>
        </div>
        
        



<script src="{{url(urlnya().'bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{url(urlnya().'bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{url(urlnya().'bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- DataTables -->
<script src="{{url(urlnya().'bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{url(urlnya().'bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="{{url(urlnya().'bower_components/raphael/raphael.min.js')}}"></script>
<script src="{{url(urlnya().'bower_components/chart.js/Chart.js')}}"></script>
<script src="{{url(urlnya().'bower_components/morris.js/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{url(urlnya().'bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{url(urlnya().'plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{url(urlnya().'plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{url(urlnya().'bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{url(urlnya().'bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{url(urlnya().'bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{url(urlnya().'bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{url(urlnya().'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{url(urlnya().'bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{url(urlnya().'bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url(urlnya().'dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{url(urlnya().'dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url(urlnya().'dist/js/demo.js')}}"></script>
<script>


  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
    // This will get the first returned node in the jQuery collection.
    var areaChart       = new Chart(areaChartCanvas)

    var areaChartData = {
      labels  : [
        @foreach(kecamatan_get() as $det)
            '{{$det['name']}}',
        @endforeach
      ],
      datasets: [
        @foreach(calon() as $no=>$kec)
        {
          label               : '{{$kec['singkatan']}}',
          fillColor           : '{{$kec['warna']}}',
          strokeColor         : '{{$kec['warna']}}',
          pointColor          : '{{$kec['warna']}}',
          pointStrokeColor    : '{{$kec['warna']}}',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '{{$kec['warna']}})',
          data                :[ 
                                @foreach(kecamatan_get() as $x=>$det)
                                    {{total($kec['id'],$det['id'])}},
                                 @endforeach
                                ]
        },
        @endforeach
        {
          label               : 'Tidak Sah',
          fillColor           : '#001F3F',
          strokeColor         : '#001F3F',
          pointColor          : '#001F3F',
          pointStrokeColor    : '#001F3F',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '#001F3F',
          data                :[ 
                                 @foreach(kecamatan_get() as $x=>$det)
                                    {{total(0,$det['id'])}},
                                 @endforeach
                                ]
        },
        {
          label               : 'Blanko',
          fillColor           : 'red',
          strokeColor         : 'red',
          pointColor          : 'red',
          pointStrokeColor    : 'red',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'red',
          data                :[ 
                                 @foreach(kecamatan_get() as $x=>$det)
                                    {{total(11,$det['id'])}},
                                 @endforeach
                                ]
        },
        
      ]
    }
    var areaChartData5 = {
      labels  : [
        @foreach(calon() as $det)
            '{{$det['singkatan']}}',
        @endforeach
        'Tidak Sah',
        'Balnko'
      ],
      backgroundColor:[
        @foreach(calon() as $det)
            '{{$det['warna']}}',
        @endforeach
        'blue','yellow'
      ],
      datasets: [
        {
          label               : 'Electronics',
          fillColor           : [
              @foreach(calon() as $det)
                '{{$det['warna']}}',
              @endforeach
              'red','#000'
          ],
          strokeColor         : [
              @foreach(calon() as $det)
                '{{$det['warna']}}',
              @endforeach
              'red','#000'
          ],
          pointColor          : [
              @foreach(calon() as $det)
                '{{$det['warna']}}',
              @endforeach
              'red','#000'
          ],
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [
                                    @foreach(calon() as $no=>$kec)
                                        {{sub_total($kec['id'])}},
                                    @endforeach
                                    {{sub_total(0)}},
                                    {{sub_total(11)}}
                                ]
        },
        {
          
        },
        
      ]
    }
    var areaChartData2 = {
      labels  : ['Ratu -Sokh', 'Mumu-lian', 'Heldy-Sanuji','Iye-Awab'],
      datasets: [
        {
          label               : 'Electronics',
          fillColor           : 'rgba(210, 214, 222, 1)',
          strokeColor         : 'rgba(210, 214, 222, 1)',
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [
                                    @foreach(calon() as $no=>$kec)
                                        {{sub_total($kec['id'])}},
                                    @endforeach
                                ]
        },
        
      ]
    }
    

    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale               : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : false,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - Whether the line is curved between points
      bezierCurve             : true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension      : 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot                : false,
      //Number - Radius of each point dot in pixels
      pointDotRadius          : 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth     : 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius : 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke           : true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth      : 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill             : true,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio     : true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive              : true
    }

    //Create the line chart
    areaChart.Line(areaChartData, areaChartOptions)

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas          = $('#lineChart').get(0).getContext('2d')
    var lineChart                = new Chart(lineChartCanvas)
    var lineChartOptions         = areaChartOptions
    lineChartOptions.datasetFill = false
    lineChart.Line(areaChartData2, lineChartOptions)

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieChart       = new Chart(pieChartCanvas)
    var PieData        = [
      {
        value    : 700,
        color    : '#f56954',
        highlight: '#f56954',
        label    : 'Chrome'
      },
      {
        value    : 500,
        color    : '#00a65a',
        highlight: '#00a65a',
        label    : 'IE'
      },
      {
        value    : 400,
        color    : '#f39c12',
        highlight: '#f39c12',
        label    : 'FireFox'
      },
      {
        value    : 600,
        color    : '#00c0ef',
        highlight: '#00c0ef',
        label    : 'Safari'
      },
      {
        value    : 300,
        color    : '#3c8dbc',
        highlight: '#3c8dbc',
        label    : 'Opera'
      },
      {
        value    : 100,
        color    : '#d2d6de',
        highlight: '#d2d6de',
        label    : 'Navigator'
      }
    ]
    var pieOptions     = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke    : true,
      //String - The colour of each segment stroke
      segmentStrokeColor   : '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth   : 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps       : 100,
      //String - Animation easing effect
      animationEasing      : 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate        : true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale         : false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive           : true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio  : true,
      //String - A legend template
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions)

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = areaChartData
    barChartData.datasets[1].fillColor   = '#00a65a'
    barChartData.datasets[1].strokeColor = '#00a65a'
    barChartData.datasets[1].pointColor  = '#00a65a'
    var barChartOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)


    //-------------
    //- BATANG CHART -
    //-------------
    var barChartCanvas1                   = $('#batangChart').get(0).getContext('2d')
    var barChart1                        = new Chart(barChartCanvas1)
    var barChartData1                     = areaChartData5
    barChartData1.datasets[1].fillColor   = '#00a65a'
    barChartData1.datasets[1].strokeColor = '#00a65a'
    barChartData1.datasets[1].pointColor  = '#00a65a'
    var barChartOptions1                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions1.datasetFill = false
    barChart1.Bar(barChartData1, barChartOptions1)
  })
</script>
