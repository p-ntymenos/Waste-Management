@extends('ajax')

@section('content')
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Περιφεριακή ενότητα</th>
                <th>Ποσότητα (tn)</th>
            </tr>
            </thead>
            <tbody>
            @foreach($dimoi as $per)
                <tr>
                    <td></td>
                    <td><a href="<?php echo url('dashboard');?>">{!! $per->Kgeodescr !!}</a></td>
                    <td>{!! $per->qty !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! with(new \App\Presenter\CustomPagination($dimoi->appends(['type' => 'perEnotites'])))->render() !!}
    </div>
@endsection