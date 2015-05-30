@extends('layouts.main')

@section('todos')

<div class="row-fluid">
	<div class="row-fluid" style="margin-bottom: 20px;">
		<h1>
			<div class="col-md-7">
			<form action="newtodo" method="post" class="form-inline">
				 <div class="form-group">
				    <label for="newtodo">Let's Do Awsome</label>
				    <input type="text" id="newtodo" class="form-control" name="todo" placeholder="what i am going to do ?"/>
				    <input type="submit" class="btn btn-success" value="create New"/>
				  </div>
			</form>
			</div>
			<div class="col-md-3">
				{{ $today = date("d M Y"); }}
			</div>
			<div class="col-md-2">
				<form action="{{ url('/') }}/" method="post" class="form-inline">
					@if(!$archieve)
					<input type="hidden" name="archieve"  value="1"/>
					<button class="btn btn-default"><i class="glyphicon glyphicon-inbox"></i> Track Your Today</button>
					@else
					<input type="hidden" name="archieve"  value="0"/>
					<button class="btn btn-default"><i class="glyphicon glyphicon-home"></i> Home</button>					
					@endif
				</form>
			</div>
		</h1>
	</div>

@if(!empty($allTodos))
<div class="col-md-12 table-responsive" style="margin-top: 20px;">
<table class="table table-striped">
	<tbody>
	<tr>
		<th>Todo</th>	
		<th>@if(!$archieve) Is it Done ? @else Don't need ? @endif</th>
		<th  class="hidden-xs">@if(!$archieve) Created @else DoneOn @endif</th>	
	</tr>
	@foreach($allTodos as $todo)
	<tr>
		<td>{{$todo->todo}}</td>	
		<td>
			<form action="updatetodo" method="post">
				<input type="hidden" name="todo_id" value="{{$todo->id}}"/>
				@if($todo->status == 0)
				<button class="btn btn-warning"><i class="glyphicon glyphicon-saved"></i></button>
				@else
				<input type="hidden" name="delete" value="1"/>
				<button class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
				@endif
			</form>
		</td>

		<td class="hidden-xs">@if(date("d M Y", strtotime($todo->updated_at)) == $today) Today @else {{ date("d M Y", strtotime($todo->created_at))}} @endif</td>
	</tr>
	@endforeach
	</tbody>
</table>
</div>
@else
	<div class="jumbotron">
		<h3>Nothing todo, Let's do something :P</h3>
	</div>
@endif

 </div>
@endsection
