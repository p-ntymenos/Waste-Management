@extends('app')

@section('content')




<!-- =========================== BREADCRUMBS =========================== -->
<div class="row breadcrumps">
    <div class="col-xs-12">
        <p><i class="icon gicon-envelope-90"></i>Μονάδες / Δημιουργία Νέας Μονάδας</p>
    </div>
</div>
<!-- =========================== /BREADCRUMBS =========================== -->


<!-- =========================== MAIN SECTION =========================== -->
<div class="section no-bt-padding">
    <div class="row">
        <div class="col-xs-12">
            <h4 class="sec-head"><i class="icon gicon-my-profile-edit"></i>ΔΗΜΙΟΥΡΓΙΑ ΜΟΝΑΔΑΣ</h4>
        </div>
        <div class="col-xs-12">
            <div class="users-back">
                <a href="{{url('monades')}}" class="arrow-left"><i class="icon gicon-arrow-down"></i><span class="prev">Πίσω στις μονάδες </span></a>
            </div>
        </div>
    </div>
</div>
<!-- =========================== /MAIN SECTION =========================== -->

<!-- =========================== TABLE =========================== -->
<div class="section top25">
    {!! Form::open(['route' => 'monades.update']) !!}

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 top80">
            <label for="notif-type" class="newnotif-label">Κωδικός Kafsis</label>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 top80">
            <input type="text" name="kafsis_code" class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 top80">
            <label for="notif-type" class="newnotif-label">Όνομα</label>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 top80">
            <input type="text" name="name" class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
        </div>
    </div>


    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 top80">
            <label for="notif-type" class="newnotif-label">Τύπος Μονάδας</label>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 top80">
            <input type="text" name="proc_type" class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
        </div>
    </div>


    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 top80">
            <label for="notif-type" class="newnotif-label">Επεξεργάζεται:</label>
        </div>
        <div class="col-md-3 top80">
            <div class="checkbox " title="Category 1">
                <input type="checkbox" name="Cat1" value="1" id="role-category1" > 
                <label for="role-category1"></label>
            </div>
        </div>

        <div class="col-md-3 top80">
            <div class="checkbox" title="Category 2">
                <input type="checkbox" name="Cat2" value="1" id="role-category2"> 
                <label for="role-category2"></label>
            </div>
        </div>


        <div class="col-md-3 top80">
            <div class="checkbox" title="Category 3">
                <input type="checkbox" name="Cat3" value="1" id="role-category3"> 
                <label for="role-category3"></label>
            </div>
        </div>


        <div class="col-md-3 top80">
            <div class="checkbox" title="Laspi">
                <input type="checkbox" name="Laspi" value="1" id="role-laspi"> 
                <label for="role-laspi"></label>
            </div>
        </div>


        <div class="col-md-3 top80">
            <div class="checkbox" title="Fytika">
                <input type="checkbox" name="Fytika" value="1" id="role-fytika"> 
                <label for="role-fytika"></label>
            </div>
        </div>  


    </div>


    <div class="filter-buttons">
        <div class="col-sm-2 col-xs-6">
            <!--                            <input type="submit" value="ΑΠΟΣΤΟΛΗ" class="run">-->
            {!! Form::submit('ΑΠΟΣΤΟΛΗ', ['class' => 'run']) !!}
        </div>
        <div class="col-sm-2 col-xs-6">
            <input type="submit" value="ΑΚΥΡΩΣΗ" class="cancel">
        </div>
    </div>



    {!! Form::close() !!}

</div>

<!-- =========================== /TABLE =========================== -->


@endsection



