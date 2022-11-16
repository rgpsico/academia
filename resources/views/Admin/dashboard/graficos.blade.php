@extends('adminlte::page')

@section('title', 'Nova Pagina')

@section('content_header') 

<script>  
    var year = ['2013','2014','2015', '2016'];  
    var data_click = <?php echo $inativo; ?>;  
    var data_viewer = <?php echo $ativo; ?>;  
  
    var barChartData = {  
        labels: year,  
        datasets: [{  
            label: 'Click',  
            backgroundColor: "rgba(220,220,220,0.5)",  
            data: data_click  
        }, {  
            label: 'ativo',  
            backgroundColor: "rgba(151,187,205,0.5)",  
            data: data_viewer  
        }]  
    };  
  
    window.onload = function() {  
        var ctx = document.getElementById("canvas").getContext("2d");  
        window.myBar = new Chart(ctx, {  
            type: 'bar',  
            data: barChartData,  
            options: {  
                elements: {  
                    rectangle: {  
                        borderWidth: 2,  
                        borderColor: 'rgb(0, 255, 0)',  
                        borderSkipped: 'bottom'  
                    }  
                },  
                responsive: true,  
                title: {  
                    display: true,  
                    text: 'Yearly Website Visitor'  
                }  
            }  
        });  
  
    };  
</script>  
  
<div class="container">  
    <div class="row">  
        <div class="col-md-10 col-md-offset-1">  
            <div class="panel panel-default">  
                <div class="panel-heading">Dashboard</div>  
                <div class="panel-body">  
                    <canvas id="canvas" height="280" width="600"></canvas>  
                </div>  
            </div>  
        </div>  
    </div>  
</div>  
  
@endsection  
