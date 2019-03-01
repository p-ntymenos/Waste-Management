<h5 class="top45">Client:</h5>
<div class="row">
    <div class="col-xs-12">
        <select id="client" name="customer_id">
            <option value = "0">Επιλογή Πελάτη</option>
            @foreach($clientsList as $client)
            @if(!empty($user))
            <option <?=($client->cusid === $user->customer_id )?'selected':'';?> value = "{!!$client->cusid!!}">{!!$client->customer!!}</option>
            @else
            <option value = "{!!$client->cusid!!}">{!!$client->customer!!}</option>
            @endif
            @endforeach
        </select>
    </div>
</div>


<h5 class="top45">Networks of stores:</h5>
<div class="row">
    <div class="col-xs-12">
        <select style="width:434px;" id="network" name="network_id">
            <option value = "0">Επιλογή Δικτύου</option>
            @foreach($networkList as $row)
            @if(!empty($user))
            <option <?=($row->name == $user->network_id)?'selected':''; ?> value = "{!!$row->name!!}">{!!$row->name!!}</option>
            @else
            <option value = "{!!$row->name!!}">{!!$row->name!!}</option>
            @endif
            @endforeach
        </select>
    </div>
</div>

<h5 class="top45">Region:</h5>
<div class="row">
    <div class="col-xs-12">

        <select style="width:434px;" id="regions" name="region_id">
            <option value = "0">Επιλογή Περιφέρειας</option>
            @foreach($regionsList as $region)
            @if(!empty($user))
            <option <?=($region->id == $user->region_id)?'selected':''; ?> value = "{!!$region->id!!}">{!!$region->name!!}</option>
            @else
            <option value = "{!!$region->id!!}">{!!$region->name!!}</option>
            @endif

            @endforeach
        </select>
    </div>
</div>

<h5 class="top45">Sub Region:</h5>
<div class="row">
    <div class="col-xs-12">
        <select style="width:434px;" id="subregions" name="subregion_id">
            <option value = "0">Επιλογή Περιφέρειακής Ενότητας</option>
            @foreach($subregionsList as $row)
            @if(!empty($user))
            <option <?=($row->id == $user->subregion_id)?'selected':''; ?> value = "{!!$row->id!!}">{!!$row->name!!}</option>
            @else
            <option value = "{!!$row->id!!}">{!!$row->name!!}</option>
            @endif
            @endforeach
        </select>
    </div>
</div>

<h5 class="top45">Municipalities:</h5>
<div class="row">
    <div class="col-xs-12">
        <select style="width:434px;" id="municipalities" name="municipality_id">
            <option value = "0">Επιλογή Δήμου</option>
            @foreach($municipalitiesList as $row)
            @if(!empty($user))
            <option <?=($row->id == $user->municipality_id)?'selected':''; ?> value = "{!!$row->id!!}">{!!$row->name!!}</option>
            @else
            <option value = "{!!$row->id!!}">{!!$row->name!!}</option>
            @endif
            @endforeach
        </select>
    </div>
</div>


<h5 class="top45">Storage Plant:</h5>
<div class="row">
    <div class="col-xs-12">
        <select style="width:434px;" id="storages" name="mex_id">
            <option value = "0">Μονάδα Ενδιάμεσου Χειρισμού</option>
            @foreach($storagesPlantsList as $row)
            @if(!empty($user))
            <option <?=($row->name == $user->mex_id)?'selected':''; ?> value = "{!!$row->name!!}">{!!$row->name!!}</option>
            @else
            <option value = "{!!$row->name!!}">{!!$row->name!!}</option>
            @endif
            @endforeach
        </select>
    </div>
</div>

<h5 class="top45">Proccesing Plant:</h5>
<div class="row">
    <div class="col-xs-12">
        <select id="processing" name="finalunit_id">
            <option value = "0">Μονάδα Τελικής Διάθεσης</option>
            @foreach($processingPlantsList as $row)
            @if(!empty($user))
            <option <?=($row->name == $user->finalunit_id)?'selected':''; ?> value = "{!!$row->name!!}">{!!$row->name!!}</option>
            @else
            <option  value = "{!!$row->name!!}">{!!$row->name!!}</option>
            @endif
            @endforeach
        </select>
    </div>
</div>