@extends('admin.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>categories</h2>
                     </div>
                     <div class="card-body">
                        @include('admin.partial.flash')
                         <table class="table table-bordered table stripped">
                             <thead>
                                 <th>#</th>
                                 <th>Name</th>
                                 <th>slug</th>
                                 <th>parent</th>
                                 <th>action</th>

                             </thead>
                             <body>
                                 @forelse ($categories as $category)
                                 <tr>
                                 <td>{{$category->id}}</td>
                                 <td>{{$category->name}}</td>
                                 <td>{{$category->slug}}</td>
                                 <td>{{$category->parent ? $category->parent->name : ''}}</td>
                                 <td>
                                    <a href="{{ url('admin/categories/'. $category->id .'/edit') }}" class="btn btn-warning btn-sm">edit</a>
                                           
                                            {!! Form::open(['url' => 'admin/categories/'. $category->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
                                            {!! Form::hidden('_method', 'DELETE') !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                            {!! Form::close() !!}
                                 </td>
                                 </tr>
                                 @empty
                                 <tr>
                                     <td colspan='5'>no records found</td>
                                 </tr>
                                     
                                 @endforelse
                             </body>
                         </table>
                        <div>

                        </div>
            </div>
            <div class="card-footer text-right">
                <a href="{{url('admin/categories/create')}}" class="btn btn-primary">Add New </a>
            </div>
        </div>
    </div>
@endsection