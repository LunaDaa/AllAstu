
<script type="text/javascript">
	function populate(s1,s2,s3,s4,s5) {
		var s1=document.getElementById(s1);
		var s2=document.getElementById(s2);
		var s3=document.getElementById(s3);
		var s4=document.getElementById(s4);
		var s5=document.getElementById(s5);
		s2.innerHTML='';
		s3.innerHTML='';
		s4.innerHTML='';
		s5.innerHTML='';

		//fech all departments in the school
		//fech all courses in the school
		//fech all intructors in te school
		var optionArraySchool=[];
        var optionArrayDept=[];
        var optionArraySection=[];
        var optionArrayCourse=[];
        var optionArrayInstructor=[];

		var selected=s1.value;
	}
</script>


<label>school</label>
<select id="school" onchange="populate(this.id,dept,sec,course,instructor)">
	<option value="All">All</option>
	
	@foreach($school as $s)
	<option value="{{$s->school_id}}">{{$s->name}}</option>
    @endforeach
	
</select>
<label>department</label>
<select id="dept">
	<option value="All">All</option>
	@foreach($dept as $dept)
	<option value="{{$dept->dept_id}}">{{$dept->name}}</option>
    @endforeach
</select>
<label>section</label>
<select id="sec">
	<option value="All">All</option>
</select>
<label>course</label>
<select id="course">
	<option value="All">All</option>
	@foreach($course as $c)
	<option value="{{$c->course_id}}">{{$c->name}}</option>
    @endforeach
</select>
<label>Instructor</label>
<select id="instructor">
	<option value="All">All</option>
	@foreach($instructor as $inst)
	<option value="{{$inst->id}}">{{$inst->first_name}} {{$inst->last_name}}</option>
    @endforeach
</select>




<button class="btn btn-primary">Go</button>
