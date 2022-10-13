@extends('layouts.master') 
@section('title')
   Task
@endsection 
@section('main-content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
              
            

                <a class="text-center"><h4>Completed Task</h4></a>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered zero-configuration" id="Cheque">
                        <thead>
                            <tr>
                               
                                <th>Employee Id</th>
                                <th>Employee Name</th>
                                <th>Page</th>
                                <th>Pin</th>
                                <th>Done At</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->employee_id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->page_name }}</td>
                                <td>{{ $item->pin }}</td>
                                <td>{{ \Carbon\Carbon::parse( $item->created_at)->diffForHumans() }}</td>
                           
                               
                            </tr>
                                
                            @endforeach
                     
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Employee Id</th>
                                <th>Employee Name</th>
                                <th>Page</th>
                                <th>Pin</th>
                                <th>Done At</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection