
<!DOCTYPE html>
<html>
 <head>
  <title>Ajax Dynamic Dependent Dropdown in Laravel</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="{{asset('jquery/jquery-3.4.1.js')}}"></script>
  <!-- <script type="text/javascript">
  	alert("jksdhfkjsdh");
  </script> -->
  <style type="text/css">
   .box{
    width:600px;
    margin:0 auto;
    border:1px solid #ccc;
   }
  </style>
 </head>
 <body>
  <br />
  <div class="container box">
   <h3 align="center">Ajax Dynamic Dependent Dropdown in Laravel</h3><br />
   <div class="form-group">
    <select name="country" id="school_id" class="form-control input-lg dynamic" data-dependent="department" data-id="dept_id">
     <option value="">Select Country</option>
     @foreach($school as $country)
     <option value="{{ $country->school_id}}">{{ $country->name }}</option>
     @endforeach
    </select>
   </div>
   <br />
   <div class="form-group">
    <select name="department" id="dept_id" class="form-control input-lg dynamic" data-dependent="course">
     <option value="">Select department</option>
    </select>
   </div>
   <br />
   <div class="form-group">
    <select name="course" id="course" class="form-control input-lg">
     <option value="">Select course</option>
    </select>
   </div>
   {{ csrf_field() }}
   <br />
   <br />
  </div>
 </body>
</html>

<script>
	$(document).ready(function(){

 $('.dynamic').change(function(){

  if($(this).val() != '')
  {
   var select = $(this).attr("id");
   var value = $(this).val();
   var dependent = $(this).data('dependent');
   var _token = $('input[name="_token"]').val();

   var dependent_id=$(this).data('id');
  /* console.log(select);
   console.log(value);
   console.log(dependent);*/
   $.ajax({
    url:"{{ route('try.fetch') }}",
    method:"POST",
    data:{select:select, value:value, _token:_token, dependent:dependent},
    success:function(result)
    {
     console.log(result);
     $('#dept_id').html(result);
      console.log(dependent_id);
    }

   })
  }
 });

 $('#school_id').change(function(){
  $('#dept_id').val('');
  $('#course').val('');
 });

 $('#department').change(function(){
  $('#course').val('');
 });
 

});
</script>