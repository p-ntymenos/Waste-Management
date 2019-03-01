<?php

$selectYear = ['2014'=>2014,'2015'=>2015,'2016'=>2016,'last-12'=>'Τελευταίοι 12 Μήνες'];

if(empty($chosenYear) )$chosenYear = 0;

if(!empty($breadCrumbText)):

?>

<div class="row breadcrumps">
    <div class="col-xs-7">
        <p><i class="icon <?php echo $breadCrumbIcon;?>"></i><?php echo $breadCrumbText;?></p>
    </div>
    <div class="col-xs-5">
        <?php if($chosenYear>0 || $chosenYear=='last-12'):?>
        <div class="dropdown">
            <button class="btn btn-default simple dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
                <?php  echo (!empty($chosenYear))? $selectYear[$chosenYear]:'';?>
                <i class="arrow-down"></i>
            </button>
            <div class="clearfix"></div>
            <?php if(!empty($availableYears)):?>
            <ul class="dropdown-menu right" aria-labelledby="dropdownMenu1">
                <li><a data-val="last-12" href="{{ url(Request::url().'?year=last-12') }}">Τελευταίοι 12 Μήνες</a></li>
                @foreach($availableYears as $y)
                    <li><a data-val="2016" href="{{ url(Request::url().'?year='.$y->year) }}">{{$y->year}}</a></li>
                @endforeach
<!--
                <li><a data-val="2016" href="{{ url('Request::url()/dashboard?year=2016') }}">2016</a></li>
                <li><a data-val="2015" href="{{ url('/dashboard?year=2015') }}">2015</a></li>
                <li><a data-val="2014" href="{{ url('/dashboard?year=2014') }}">2014</a></li>
-->
            </ul>
            <?php endif;?>
        </div>
        <?php endif;?>
    </div>
</div>


<?php endif;?>