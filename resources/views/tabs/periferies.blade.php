@extends('ajax')

@section('content')
<<<<<<< HEAD
    <div class="table-responsive">
        <div class="row">
        
            <div class="col-md-2 pull-left" style="padding:20px 0px ;">
            <div class="dropdown pull-right">
                <select style="padding:5px;">
=======


    <div class="table-responsive">
        <div class="" style="padding:10px 0px;">
            <select style="padding:5px;" id="">
>>>>>>> newGorilla
                    <option>20</option>
                    <option>30</option>
                </select>
                Records
<<<<<<< HEAD
            </div></div>
=======
        </div>
        
        
        <div>
        
            <input type="text" name="searchPerifereies" id="perifereiesSearch" value="search" ng-change= "loadData(this, 'periferies')" />
>>>>>>> newGorilla
            
        </div>
        
        
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Περιφέρειες</th>
                <th>Ποσότητα ΖΥΠ (tn)</th>
                @foreach($categories as $category)
                    <th>{!! $category->descr !!}</th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            @foreach($perifereies as $key=>$per)
                <tr>
                    <td><?php echo ($key+1);?></td>
<<<<<<< HEAD
                    <td><a href="<?php echo url('dashboard?district=');?>{!! $per->Kpefdescr !!}">{!! $per->Kpefdescr !!}</a></td>
=======
                    <td><a href="<?php echo url('regions?district=');?>{!! $per->CODEID !!}">{!! $per->Kpefdescr !!}</a></td>
>>>>>>> newGorilla
                    <td>{!! $total[$per->Kpefdescr] !!}</td>
                    @foreach($categories as $category)
                        <td>{!! (isset($posotites[$per->Kpefdescr][$category->descr])) ? $posotites[$per->Kpefdescr][$category->descr] : '' !!}</td>
                    @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>
<<<<<<< HEAD
        {!! with(new \App\Presenter\CustomPagination($perifereies->appends(['type' => 'perifereies'])))->render() !!}
=======
        
>>>>>>> newGorilla
    </div>
@endsection