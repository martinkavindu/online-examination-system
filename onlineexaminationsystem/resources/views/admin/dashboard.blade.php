
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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script type="text/javascript" src="{{ asset('js/multiselect-dropdown.js') }}"></script>

    <title>admin dashboard</title>
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
                    <li class="sidebar-header">
                        Tools & Components
                    </li>
                
                    </li>
                    <li class="sidebar-item">
                        <a href="{{route('allsubject')}}" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#pages"
                            aria-expanded="false" aria-controls="pages">
                            <i class="fa-regular fa-file-lines pe-2"></i>
                       Subjects
                        </a>
                        <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="{{route('allsubject')}}" class="sidebar-link">All subjects</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{route('addsubject')}}" class="sidebar-link">Add Subject</a>
                            </li>
                           
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{route('allexam')}}" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#pages"
                            aria-expanded="false" aria-controls="pages">
                            <i class="fa fa-pencil-square" aria-hidden="true"></i>  Exam

                        </a>
                        <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="{{route('allexam')}}" class="sidebar-link">All </a> </li>

                                <li class="sidebar-item">
                                    <a href="{{route('marks')}}" class="sidebar-link"> <i class="fa fa-check" aria-hidden="true"></i>  Marks</a> </li>

                                    <li class="sidebar-item">
                                        <a href="{{route('reviewexams')}}" class="sidebar-link"> <i class="fa fa-file-text-o" aria-hidden="true"></i> Exam Review</a> </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{route('allqna')}}" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#pages"
                            aria-expanded="false" aria-controls="pages">
                            <i class="fa fa-question-circle" aria-hidden="true"></i>  Q&As

                        </a>
                        <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="{{route('addqsn')}}" class="sidebar-link">Add Questions</a>

                            </li>
                            <li class="sidebar-item">
                                <a href="{{route('addanswer')}}" class="sidebar-link">Add Answers</a>

                            </li>
                            <li class="sidebar-item">
                                <a href="{{route('allqna')}}" class="sidebar-link">All</a>

                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{route('students')}}" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#multi"
                            aria-expanded="false" aria-controls="multi">
                            <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                            Students
                        </a>
                        <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#multi-two" aria-expanded="false" aria-controls="multi-two">
                                  More
                                </a>
                                <ul id="multi-two" class="sidebar-dropdown list-unstyled collapse">
                                    <li class="sidebar-item">
                                        <a href="{{route('students')}}" class="sidebar-link">All Students</a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{route('addstudent')}}" class="sidebar-link">Add student</a>
                                    </li>
                                </ul>
                            </li>
                            
                        </ul>
                    </li>

                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#auth"
                            aria-expanded="false" aria-controls="auth">
                            <i class="fa-regular fa-user pe-2"></i>
                          Profile
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
      <script>
        function addAnswer() {
            const answersContainer = document.getElementById('answers-container');
            const answerInput = document.createElement('div');
            answerInput.classList.add('answer-input');
            answerInput.innerHTML = `
                <input type="text" name="answers[]" placeholder="Enter answer" required>
                <label class="text-white mt-2">
                    <input type="radio" name="is_correct" class="is_correct">
                    Correct Answer
                </label>
            `;
            answersContainer.appendChild(answerInput);
        }
      </script>

      <!-- <script>
    // $(document).ready(function () {
    //     $('form').submit(function (event) {
    //         event.preventDefault();

    //         var checkIsCorrect = false;

    //         for(let i =0 ;i<$('.is_correct').length;i++){
    //             if($('.is_correct:eq('+i+')').prop('checked') == true)
    //             {
    //                 checkIsCorrect =true;
    //                 $('.is_correct:eq('+i+')').val($('.is_correct:eq('+i+')').next().find('input').val());
    //             }
    //         }

    //         if (checkIsCorrect) {
    //             var formData = $(this).serialize();

    //             $.ajax({
    //                 url: "",
    //                 type: "POST",
    //                 data: formData,
    //                 success: function (data) {
    //                     console.log(data);
    //                     if (data.success) {
    //                         location.reload();
    //                     } else {
    //                         alert(data.message);
    //                     }
    //                 },
    //                 error: function (error) {
    //                     console.log(error);
    //                 }
    //             });
    //         } else {
    //             $('.error').text('Please select the correct answer');

    //             setTimeout(function () {
    //                 $('.error').text('');
    //             }, 2000);
    //         }
    //     });
    // });
</script> -->

//show answers code
<script>

    $(document).ready(function(){
  
      var totalQna = 0;
  
      $('.editMarks').click(function(){
  
        var exam_id = $(this).attr('data-id');
        var marks = $(this).attr('data-marks');
        var totalq = $(this).attr('data-totalq');
  
        $('#marks').val(marks);
         $('#exam_id').val(exam_id);
         $('#tmarks').val(marks*totalq);
         totalQna = totalq;
  
      });
  
      $('#marks').keyup(function(){
  
      $('#tmarks').val($(this).val() * totalQna);
  
      });
      $('#editMarks').submit(function(event){
        event.preventDefault();

        var fornData = $(this).serialize();
        $.ajax({

            url:"{{route('updatemarks')}}",
            method:'POST',
            data:fornData,
            success:function(data){

                if(data.success == true){
                    location.reload();
                }else
                {
                    alert('error occured')
                }

            }
        })
      })
    })
  </script>
 
</body>

</html>
    

