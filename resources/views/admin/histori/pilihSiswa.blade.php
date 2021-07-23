@extends('sbadmin/master')
@section('title', 'semester')

@section('content')
 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          	<div class="card">
			   	<div class="card-header">
			        <h3 class="card-title">Semester</h3>
			    </div>
			    <div class ="card-body">
			    	{{-- <a href="{{url('admin/semester/create')}}" class="btn btn-success my-2"><i class="fas fa-user-plus mr-1"></i>Tambah Data</a> --}}
					<table id="example1" class="table table-bordered ">
					  <thead class="table-success">
					  	<tr>
					  		<th>No</th>
                            <th>Tahun Ajaran</th>
					  		<th>Semester</th>
					  		<th>Aksi</th>
					  	</tr>
					  </thead>
					  <tbody>
					  	@foreach($semester as $row)
						    <tr>
						    	<td>{{$loop->iteration}}</td>
                                <td>{{$row->tahunAjaran}}</td>
						    	<td>{{ $row->keterangan }}</td>
						    	<td>
						    		<a href="{{url('/admin/histori/show-histori/'.$id.'/'.$row->idSemester)}}" class="btn btn-outline-primary"><i class="fas fa-search"></i></i></a>
						    		{{-- <a href="{{url('/admin/semester/edit/'.$row->idSemester)}}" class="btn btn-outline-success"><i class="fas fa-edit"></i>edit</a>

						    		<form action="{{$row->idSemester}}" method="post" class="d-inline">
						    		@method('delete')
						    		@csrf
						    		<button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt mr-1"></i>delete</button> --}}
						    		</form>
						    	</td>
						    </tr>
						 @endforeach
					  </tbody>
					</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection
