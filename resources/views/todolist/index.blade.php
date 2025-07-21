@extends('todolist.layout')
@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2> To do List </h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('todolist.create') }}"> Create New list</a>

            </div>

        </div>

    </div>
        <div class="alert alert-success">
            <p></p>
        </div>

    <table class="table table-bordered">

        <tr>

            <th>No</th>

            <th>date</th>

            <th>title</th>
            <th>description</th>
            <th width="280px">Action</th>

        </tr>

      
  @foreach($todolists as $todolist)
        <tr>
      
            <td>{{ ++$i }}</td>

            <td>{{ $todolist->date}}</td>

            <td>{{ $todolist->title}}</td>
            <td>{{ $todolist->description}}</td>

            <td>
                <form action="{{ route('todolist.destroy',$todolist->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('todolist.show',$todolist->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('todolist.edit',$todolist->id) }}">Edit</a>
                    @csrf

                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>

                </form>
            </td>
      
        </tr>

        @endforeach 
    </table>
 
      

@endsection