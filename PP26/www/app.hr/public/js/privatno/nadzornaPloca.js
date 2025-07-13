let uvjet='';
$( '#uvjet' ).autocomplete({
    source: function(req,res){
        uvjet = req.term;
       $.ajax({
           url: url + 'nadzornaploca/trazi/' + uvjet,
           success:function(odgovor){
            res(odgovor);
            //console.log(odgovor);
        }
       }); 
    },
    minLength: 2,
    select:function(dogadaj,ui){
       // console.log(ui.item);
       window.location.href = url + ui.item.vrsta + '/promjena/' + ui.item.sifra;
    }
}).autocomplete( 'instance' )._renderItem = function( ul, item ) {
    
    //console.log(uvjet);
    let sadrzaj = item.tekst;
   //https://stackoverflow.com/questions/13838468/change-part-of-the-string-with-case-sensitive
    var querystr = uvjet;
var output = sadrzaj;
var reg = new RegExp(querystr, 'gi');
var final_str = output.replace(reg, function(str) {return str.bold().fontcolor("Blue")});


    return $( '<li>' )
      .append( '<div>' + final_str + ' (' + item.vrsta + ')<div>')
      .appendTo( ul );
  };

$('#uvjet').focus();





// Data retrieved from https://netmarketshare.com
Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Broj polaznika po grupama',
        align: 'left'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.y}</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.y}'
            }
        }
    },
    series: [{
        name: 'Polaznika',
        colorByPoint: true,
        data: podaci
    }]
});
