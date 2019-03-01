@if (count($errors) > 0)
<<<<<<< HEAD
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
=======
<div class="messages">
    <!--<div class="alert alert-msg alert-msg-warning fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <i class="icon gicon-alert-msgs-warning"></i>
        <p><strong>Whoops!</strong> There were some problems with your input.<br><br></p>
    </div>-->
    @foreach ($errors->all() as $error)
    <div class="alert alert-msg alert-msg-warning fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <i class="icon gicon-alert-msgs-warning"></i>
        <p>{{ $error }}</p>
    </div>
    @endforeach

</div>

>>>>>>> newGorilla
@endif