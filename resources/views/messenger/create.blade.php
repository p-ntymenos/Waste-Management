@extends('app')

@section('content')




<!-- =========================== BREADCRUMBS =========================== -->
<div class="row breadcrumps">
    <div class="col-xs-12">
        <p><i class="icon gicon-envelope-90"></i>Μηνύματα / Δημιουργία Νέου Μηνύματος</p>
    </div>
</div>
<!-- =========================== /BREADCRUMBS =========================== -->


<!-- =========================== MAIN SECTION =========================== -->
<div class="section no-bt-padding">
    <div class="row">
        <div class="col-xs-12">
            <h4 class="sec-head"><i class="icon gicon-my-profile-edit"></i>ΔΗΜΙΟΥΡΓΙΑ ΜΗΝΥΜΑΤΟΣ</h4>
        </div>
        <div class="col-xs-12">
            <div class="users-back">
                <a href="messages.php" class="arrow-left"><i class="icon gicon-arrow-down"></i><span class="prev">Πίσω στα Μηνύματα</span></a>
            </div>
        </div>
    </div>
</div>
<!-- =========================== /MAIN SECTION =========================== -->

<!-- =========================== TABLE =========================== -->
<div class="section top25">
    {!! Form::open(['route' => 'messages.store']) !!}
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 top30">
            <label for="search" class="newnotif-label">Αποστολή μηνύματος σε</label>
        </div>

        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 top20">
            <div class="radio">
                <input type="radio" name="search" id="to-user" value="user" checked>
                <label for="to-user"><span></span>Χρήστες</label>
            </div>
            <div class="radio">
                <input type="radio" name="search" id="to-teams" value="teams">
                <label for="to-teams"><span></span>Ομάδες Χρηστών</label>
            </div>
            <div class="radio">
                <input type="radio" name="search" id="to-all" value="all_users">
                <label for="to-all"><span></span>Όλους</label>
            </div>
        </div>

        <div class="col-lg-5 col-lg-offset-2 col-md-5 col-md-offset-2 col-sm-12 col-xs-12 top30">
            @if($users->count() > 0)
            <select class="notification-to" multiple="multiple" name="recipients[]">
                @foreach($users as $user)
                <option value="{!!$user->id!!}">{!!$user->name!!}</option>
                @endforeach
            </select>
            @endif
            <script>
                $(".notification-to").select2({
                    tags: true
                });
            </script>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 top80">
            <label for="notif-type" class="newnotif-label">Θέμα</label>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 top80">
            <input id="notif-type" type="text" name="subject" class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
            <!--<select id="notif-type" name="subject">
                <option value="12">Επιλογή τύπου...</option>
                <option value="general">General</option>
                <option value="success">Success</option>
                <option value="warning">Warning</option>
                <option value="error">Error</option>
            </select>-->
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 top80">
            <label for="filter" class="newnotif-label-area">Μήνυμα</label>

        </div>
        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 top80">
            <textarea name="message" id="notification-text" cols="50" rows="5"></textarea>
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



