@extends('ajax')

@section('content')
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Δραστηριότητα Παραγωγών</th>
                <th>Ποσότητα (tn)</th>
            </tr>
            </thead>
            <tbody>
            @foreach($drastiriotites as $per)
                <tr>
                    <td></td>
                    <td><a href="<?php echo url('dashboard');?>">{!! $per->occupation !!}</a></td>
                    <td>{!! $per->qty !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! with(new \App\Presenter\CustomPagination($drastiriotites->appends(['type' => 'perEnotites'])))->render() !!}
    </div>
@endsection