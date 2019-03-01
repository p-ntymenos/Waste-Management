@extends('app')

@section('content')
<<<<<<< HEAD
<div id="rightSideHeight" class="col-lg-10 col-md-9 col-sm-8 col-xs-12">
    <div class="row" style="padding: 10px;">
        <p class="blockTitle">Users</p>
        {!! link_to_route('users.create', 'Create new user',[], ['class'=>'btn btn-info']) !!}

    @if($users)
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>E-mail</th>
                    <th>Roles</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{!! $user->id !!}</td>
                    <td>{!! $user->name !!}</td>
                    <td>{!! $user->username !!}</td>
                    <td>{!! $user->email !!}</td>
                    <td>
                        <ul>
                            @foreach($user->roles as $role)
                                <li>{!! $role->display_name !!}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{!! link_to_action('UsersController@edit', 'Edit user',['user_id' => $user->id]) !!}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
=======
<div class="section no-bt-padding">
    <div class="row">
        <div class="col-sm-6 col-xs-12"><h4 class="sec-head no-icon">ΔΙΑΧΕΙΡΙΣΗ ΧΡΗΣΤΩΝ</h4></div>
        <div class="col-sm-6 col-xs-12">
            {!! link_to_route('users.create', 'ΠΡΟΣΘΗΚΗ ΧΡΗΣΤΗ',[], ['class'=>'newuser pull-right']) !!}
        </div>
    </div>
</div>

<?php

if(!empty($_GET['limit']))$limit = $_GET['limit'];
else $limit = 10;

?>


<div class="section top25">
    <div class="row">
        <div class="col-xs-12">
            <div class="table-full-wrapper table-border">
                <div class="filters">
                    <form id="searchFormUsers" action="<?=url('users');?>">
                        <div class="col-sm-6 col-xs-12">
                            <?php
                            $availPagination = array('5','10','20','30','50','100')
                            ?>
                            <div class="perpage">
                                <select name="limit" onchange="jQuery('#searchFormUsers').submit();">
                                    <?php foreach($availPagination as $val):?>

                                    <option <?php if($limit == $val ){echo "selected";}?> value = "<?php echo $val;?>"><?php echo $val;?></option>

                                    <?php endforeach;?>
                                </select>
                                <span>Καταχωρήσεις</span>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="search">

                                <input type="text" placeholder="Αναζήτηση" name="searchUser" value="<?=(!empty($_REQUEST['searchUser']))?$_REQUEST['searchUser']:'';?>">
                                <input type="submit" value="">

                            </div>

                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
                <div class="content">
                    <div class="tab-pane fade in active">
                        <div class="table-responsive">
                            <table class="table table-hover user-table">
                                <thead>
                                    <tr>
<!--                                        <th>#</th>-->
                                        <th>Id</th>
                                        <th>Ονοματεπώνυμο</th>
                                        <th>Όνομα Χρήστη</th>
                                        <th>E-mail</th>
                                        <th>Ρόλος</th>
                                        <th>Διεργασία</th>
                                        <th>Κατάσταση</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $key=>$user)
                                    <tr>
<!--                                        <td>{!! $key+1 !!}</td>-->
                                        <td>{!! $user->id !!}</td>
                                        <td>{!! $user->name !!}</td>
                                        <td>{!! $user->username !!}</td>
                                        <td>{!! $user->email !!}</td>
                                        <td>
                                            <ul>
                                                @foreach($user->roles as $role)
                                                <li>{!! $role->display_name !!}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>

                                            <a href="{{url('/users/'.$user->id.'/edit')}}"><i class="icon gicon-my-profile-edit"></i></a>
                                            <a class="deleteBtn" data-id="{{$user->id}}" dhref="{{url('/users/'.$user->id.'/delete')}}"><i class="icon gicon-d-trash-can"></i></a>

                                        </td>

                                        <td><span class="<?php if($user->status == 1){echo "active-user";}else{echo "blocked-user";}?>"> <?php if($user->status == 1){echo "Active";}else{echo "Blocked";}?></span></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="row">
                            <div class="table-pagination">
                                <div class="col-sm-6 col-xs-12">
                                    <p>Showing <span><?=$startOffset;?></span> to <span><?=$endOffset;?></span> of <span><?=$allRows;?></span> entries</p>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <?php 
                                    
                                    (!empty($_REQUEST['limit']))?$limit=$_REQUEST['limit']:$limit=5; 
                                    (!empty($_REQUEST['searchUser']))?$searchUser=$_REQUEST['searchUser']:$searchUser=''; 
                                    
                                    
                                    ?>
                                    <?php if(count($availPages)>0):?>
                                    <div class="table-pagination-nav pull-right">
                                        <a href="users?limit=<?php echo $limit;?>&searchUser=<?php echo $searchUser;?>&page={{$prevPage}}" class="arrow-left">
                                            <i class="icon gicon-arrow-down"></i><span class="prev">Previous</span>
                                        </a>
                                        <span class="pages">
                                            @foreach($availPages as $page)
                                            <a href="users?limit=<?php echo $limit;?>&searchUser=<?php echo $searchUser;?>&page={{$page+1}}">{{$page+1}}</a>
                                            @endforeach
                                        </span>
                                        <a href="users?limit=<?php echo $limit;?>&searchUser=<?php echo $searchUser;?>&page={{$nextPage}}" class="arrow-right">
                                            <span class="next">Next</span><i class="icon gicon-arrow-down"></i>
                                        </a>
                                    </div>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<script>

    $(document).ready(function(){


        $('a.deleteBtn').click(function(){

            var result = confirm("Want to delete?");
            if (result) {
                //Logic to delete the item
                console.log($(this).data('id'));
                document.location.href = 'users/'+$(this).data('id')+'/delete';
            }


        })


    })



</script>

<div style="display:none;" id="rightSideHeight" class="col-lg-10 col-md-9 col-sm-8 col-xs-12">
    <div class="row" style="padding: 10px;">
        <p class="blockTitle">Users</p>
        @if($users)
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>E-mail</th>
                        <th>Roles</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{!! $user->id !!}</td>
                        <td>{!! $user->name !!}</td>
                        <td>{!! $user->username !!}</td>
                        <td>{!! $user->email !!}</td>
                        <td>
                            <ul>
                                @foreach($user->roles as $role)
                                <li>{!! $role->display_name !!}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>{!! link_to_action('UsersController@edit', 'Edit user',['user_id' => $user->id]) !!}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
>>>>>>> newGorilla
    </div>
</div>
@endsection
