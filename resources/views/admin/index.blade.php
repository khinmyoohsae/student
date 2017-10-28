@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">You are logged in as ADMIN!</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
               <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Students</h2>
            </div>
            <div class="pull-right">
               
            </div>
        </div>

                <table class="table">
                        <thead class="thead-inverse">
                            <tr>
                            <th>Student's Name</th>
                            <th>Home Address</th>
                            <th>Current Address</th>
                            </tr>
                        </thead>
                        <tbody>
                         <?php $i=0;$j=0; ?><!-- for home address -->
                         @foreach($students as $student)
                            <tr>
                            <td>{{$student->name}}</td>
                            <td><?php echo $first_address[$i]->home_address; ?></td>
                            <td><?php echo $second_address[$j]->current_address; ?></td>
                            </tr>
                            <?php $i++;$j++; ?><!-- for home address -->
                         @endforeach 
                        </tbody>
                    </table>
                     </div>
        </div>
    </div>
</div>
@endsection
