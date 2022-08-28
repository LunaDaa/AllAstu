<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<form>
  <select name="school" onchange="open(school)">
    @foreach($school as $s)
       <option>{{$s->name}}</option>
    @endforeach
  </select>

  <select name="department" id="">
    
  </select>
</form>

<script type="text/javascript">
  function open(x) {
    // body...

  }
</script>
</body>
</html>