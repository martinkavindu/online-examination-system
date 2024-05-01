

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('js/script.js')}}" data-qcount="{{ $qcount ?? 0 }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
      <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>students portal</title>
</head>

<body>
    @include('sweetalert::alert')
    <div class="wrapper">
        <!-- Sidebar -->
        <aside id="sidebar">
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="#">OES</a>
                    <i class="fa fa-graduation-cap " aria-hidden="true"></i>
                </div>
                <!-- Sidebar Navigation -->
                <ul class="sidebar-nav">
                    <li class="sidebar-item">
                        <a href="{{route('dashboard')}}" class="sidebar-link collapsed " data-bs-toggle="collapse" data-bs-target="#auth"
                            aria-expanded="false" aria-controls="auth">
                            <i class="fa-regular fa-user pe-2"></i> 
                    <span class="text-success text-capitalize"> {{Auth::user()->name}}</span>  
                        </a>
                        <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">update Profile</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{route('logout')}}" class="sidebar-link">Logout</a>
                            </li>
                        </ul>
                    </li>
                
                    </li>
                    <li class="sidebar-item">
                        <a href="{{'dashboard'}}" class="sidebar-link collapsed">
                            <i class="fa fa-question-circle" aria-hidden="true"></i>
                      Exams
                        </a>
                       
                    </li>
          
                    <li class="sidebar-item">
                        <a href="{{'paidexams'}}" class="sidebar-link collapsed">
                            <i class="fa fa-tasks" aria-hidden="true"></i>
                     Paid Exams
                        </a>
                       
                    </li>

                    <li class="sidebar-item">
                        <a href="{{'results'}}" class="sidebar-link collapsed">
                            <i class="fa fa-list-alt" aria-hidden="true"></i>
                   Results
                        </a>
                       
                    </li>
                    
                </ul>
            </div>
        </aside>
        <!-- Main Component -->
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <!-- Button for sidebar toggle -->
                <button class="btn" type="button" data-bs-theme="dark">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>
            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="mb-3">

                     @yield('content')

                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{asset('js/script.js')}}"></script>
    


    @if (Session::has('message'))
  <script>
    toastr.options = {
      'progressBar': true,
      'closeButton': true,
      'positionClass': 'toast-top-right', 
      'showDuration': '300',
      'hideDuration': '1000',
      'timeOut': '5000',
      'extendedTimeOut': '1000',
      'showEasing': 'swing',
      'hideEasing': 'linear',
      'showMethod': 'fadeIn',
      'hideMethod': 'fadeOut',
      'onShown': function () {
       
        $('.toast').css('background-color', '#28a745'); 
        $('.toast').css('color', '#fff'); 
      }
    };
    toastr.success("{{ Session::get('message') }}", 'Success!', { timeOut: 3000 });
  </script>
@endif
<script>

    function confirmation(ev) {
      ev.preventDefault();
      var urlToRedirect = ev.currentTarget.getAttribute('href');
      console.log(urlToRedirect);
    
      swal({
        title: 'Are you sure to delete',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
        customClass: {
          popup: 'swal-small', 
        },
      })
    
      .then((willCancel) => {
        if (willCancel) {
          window.location.href = urlToRedirect;
        }
      });
    }
    
      </script>
      
{{-- copy examlink --}}
      <script>
        $(document).ready(function () {
            $('.copy').click(function () {
                $(this).parent().prepend('<span class="copied_text">Copied</span>')

                var code = $(this).attr('data-code');
                var url = '{{URL::to('/')}}/exam/' + code;

                var $temp = $("<input>");
                $("body").append($temp);
                $temp.val(url).select();

                document.execCommand('copy');
                $temp.remove();
                setTimeout(() => {
                    $('.copied_text').remove();
                }, 1000);
            });
        });
    </script>

<script>
    $(document).ready(function () {

        var qcount = $('script[data-qcount]').data('qcount');

        $('.select_ans').click(function () {
            var no = $(this).attr('data-id');
            $('#ans_' + no).val($(this).val());
        });

       
    });

    function isValid() {
        var result = true;

        var qlength = parseInt(qcount) - 1;
        $('.error_msg').remove();

        for (let i = 1; i <= qlength; i++) {
            if ($('#ans_' + i).val() == "") {
                result = false;
                $('#ans_' + i).parent().append('<span style="color:red;" class="error_msg">Please select answer</span>');

                setTimeout(() => {
                    $('.error_msg').remove();
                }, 3000);
            }
        }
        return result;
    }
</script>


</body>

{{-- </html>
<script>
var time = @json($time);
$('.time').text(time[0]+':'+time[1]+':00 left time');
var seconds = 60;
var hours = time[0];
var minutes = time[1];

var  timer = setInterval(() => {


if(hours == 0 && minutes == 0 && seconds == 0){
    clearInterval(timer);




    $('#exam_form').submit();

    
}
    if(seconds <=0){

        minutes--;
        seconds = 60;
    }

    if(minutes <= 0 && hours != 0){
        hours --;
        minutes = 59;
        secomds = 60;
    }

    let tempHours = hours.toString().length > 1? hours:'0'+hours;
    let tempMinutes = minutes.toString().length > 1? minutes:'0'+hours;
    let tempSeconds = seconds.toString().length > 1? seconds:'0'+hours;
    $('.time').text(tempHours+':'+tempMinutes+':'+tempSeconds+ 'left time');

    seconds--;
    
}, 1000);

</script> --}}


<script>
    $(document).ready(function(){
        $('.reviewqsn').click(function(){

    var id = $(this).attr('data-id');

    $.ajax({

        url:"{{route('studentqsn')}}",
        type:"GET",
        data:{attempt_id:id},

        success:function(data){

            var html = ''
 
            if (data.success == true) {
            var data =  data.data;

            if (data.length >0) {
        for (let i = 0; i< data.length; i++) {
            let answer = data[i]['answers']['answer'];
            let is_correct = '<span style = "color:red;" class = "fa fa-close">  </span>';

            if (data[i]['answers']['is_correct'] == 1) {
             is_correct = '<span style = "color:green;" class = "fa fa-check">  </span>';
   
            }
            html+=`
            <div class="row">
            <div class = "col-sm-12">
            <h6> Q (`+(i+1)+`).`+data[i]['question']['question']+`</h6>
            <p>Ans:- `+answer+`  `+is_correct+`</p>
            </div>
            </div>
            
            `;
            
        }
               
            } 
         else
            {
         html+= '<h6>You didnt attempt any question</h6>'
            }

            }else{
                html+='<p>Error occured  server side</p>'

            }
       $('.review-qsn').html(html);

        }
    })
            
        })
    })
    </script>
        <script>
            $(document).ready(function(){
    
            $('.paynow').click(function(){
    
        var price = $(this).attr('data-id');
        var acc = $(this).attr('data-acc');

        
        $('.prices').val(price);
        $('.account').val(acc);
            })
            })
    
            </script>