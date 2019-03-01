@extends('ajax')

@section('content')
<<<<<<< HEAD
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
=======
<div class="table-responsive">

    <div class="" style="padding:10px 0px;">
        <select style="padding:5px;">
            <option>20</option>
            <option>30</option>
        </select>
        Records
    </div>


    <div>

        <input type="text" name="searchPerifereies" id="perifereiesSearch" placeholder="search"/>

    </div>

    <table class="table table-striped">
        <thead>
>>>>>>> newGorilla
            <tr>
                <th>#</th>
                <th>Περιφεριακή ενότητα</th>
                <th>Ποσότητα (tn)</th>
            </tr>
<<<<<<< HEAD
            </thead>
            <tbody>
            @foreach($perifEnotites as $per)
                <tr>
                    <td></td>
                    <td><a href="<?php echo url('dashboard');?>">{!! $per->Ygeodescr !!}</a></td>
                    <td>{!! $per->qty !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! with(new \App\Presenter\CustomPagination($perifEnotites->appends(['type' => 'perEnotites'])))->render() !!}
    </div>
=======
        </thead>
        <tbody>
            @foreach($perifEnotites as $key => $per)
            <tr>
                <td><?php echo ($key+1);?></td>
                <td><a href="<?php echo url('dashboard');?>">{!! $per->Ygeodescr !!}</a></td>
                <td>{!! $per->qty !!}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! with(new \App\Presenter\CustomPagination($perifEnotites->appends(['type' => 'perEnotites'])))->render() !!}
</div>
>>>>>>> newGorilla
@endsection