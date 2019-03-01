{!! Form::open(['action' => 'ReportsController@index']) !!}

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top40">
        <label for="date" class="filter-label">Ημερομηνία</label>
        <select id="date" name="year">
            <option <?php if($selectedYear == 'last-12'){echo "selected";} ?> value="last-12">Τελευταίους 12 μήνες</option>
            @foreach ($availableYears as $row)
            <option <?php if($selectedYear == $row->year){echo "selected";} ?> value="{{$row->year}}">{{$row->year}}</option>
            @endforeach
        </select>
        <input type="text" name="date-from" value="01/10/2014">
        <input type="text" name="date-to" value="01/10/2015">
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top30">
        <label for="category" class="filter-label">Κατηγορία</label>
        <select id="category" name="reportType">
            <option value="">Όλες οι κατηγορίες</option>
            <option {{ 'rep-cat' == Request::input('reportType') ? 'selected' : '' }} value="rep-cat">Κατηγορίες ΖΥΠ</option>
            <option {{ 'rep-mater' == Request::input('reportType') ? 'selected' : '' }} value="rep-mater">Είδος </option>
            <option {{ 'rep-temp' == Request::input('reportType') ? 'selected' : '' }} value="rep-temp">Θερμοκρασία</option>
            <option {{ 'rep-pack' == Request::input('reportType') ? 'selected' : '' }} value="rep-pack">Συσκευασία</option>
            <option {{ 'rep-conf' == Request::input('reportType') ? 'selected' : '' }} value="rep-conf">Κατάσχεση</option>
            <option {{ 'rep-proc' == Request::input('reportType') ? 'selected' : '' }} value="rep-proc">Επεξεργασία</option>
            <option {{ 'rep-prod' == Request::input('reportType') ? 'selected' : '' }} value="rep-prod">Παραγωγοί</option>
            <option {{ 'rep-routes' == Request::input('reportType') ? 'selected' : '' }} value="rep-routes">Δρομολόγια</option>
        </select>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top30">
        <label for="filter" class="filter-label">Φίλτρο</label>
        <select id="groupBy2" name="groupBy2">
            <option value="geographical">Περιφέρειες</option>
            <option value="producers">Παραγωγοί</option>
        </select>
    </div>
    <div id="geographicalWrap">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top30" >
            <label for="search" class="filter-label">Αναζήτηση ανά</label>
            <div class="radio">
                <input type="radio" name="geoGroup" id="filtby-periferies" value="periferies">
                <label for="filtby-periferies"><span></span>Περιφέρειες</label>
            </div>
            <div class="radio">
                <input type="radio" name="geoGroup" id="filtby-enotites" value="enotites">
                <label for="filtby-enotites"><span></span>Περιφερειακές Ενότητες</label>
            </div>
            <div class="radio">
                <input type="radio" name="geoGroup" id="filtby-dimoi" value="dimoi" checked>
                <label for="filtby-dimoi"><span></span>Δήμους</label>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top30">
            <label for="search" class="filter-label"></label>
            <div class="open-dropdowns">
                <select id="regions" name="region">
                    <option value = "0">Όλες οι περιφέρειες</option>
                    @foreach($regionsList as $row)
                    <option {{ $row->id == Request::input('region') ? 'selected' : '' }} value = "{!!$row->id!!}">{!!$row->name!!}</option>
                    @endforeach
                </select>
                <select id="subregions" name="subregion">
                    <option value = "0">Όλες οι περιφερειακές ενότητες</option>
                    @foreach($subregionsList as $row)
                    <option {{ $row->id == Request::input('subregion') ? 'selected' : '' }} value = "{!!$row->id!!}">{!!$row->name!!}</option>
                    @endforeach
                </select>
                <select id="municipalities" name="municipality">
                    <option value = "0">Όλοι οι δήμοι</option>
                    @foreach($municipalitiesList as $row)
                    <option {{ $row->id == Request::input('municipality') ? 'selected' : '' }} value = "{!!$row->id!!}">{!!$row->name!!}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div id="producersWrap" style="display:none;">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top30"  >
            <label for="search" class="filter-label">Αναζήτηση ανά</label>
            <div class="radio">
                <input type="radio" name="producersGroup" id="filtby-networs" value="periferies" checked>
                <label for="filtby-networs"><span></span>Δίκτυα</label>
            </div>
            <div class="radio">
                <input type="radio" name="producersGroup" id="filtby-substores" value="enotites">
                <label for="filtby-substores"><span></span>Υποκαταστήματα</label>
            </div>
            <div class="radio">
                <input type="radio" name="producersGroup" id="filtby-singlestore" value="dimoi" >
                <label for="filtby-singlestore"><span></span>Μεμονωμένο Κατάστημα</label>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top30">
            <label for="search" class="filter-label"></label>
            <div class="open-dropdowns">
                <select id="client" name="client">
                    <option value = "0">Επιλογή Πελάτη</option>
                    @foreach($clientsList as $row)
                    <option {{ $row->cusid == Request::input('client') ? 'selected' : '' }} value = "{!!$row->cusid!!}">{!!$row->customer!!}</option>
                    @endforeach
                </select>
                <select id="network" name="substore">
                    <option value = "0">Όλες οι περιφερειακές ενότητες</option>
                    @foreach($networkList as $row)
                    <option {{ $row->name == Request::input('substore') ? 'selected' : '' }} value = "{!!$row->name!!}">{!!$row->name!!}</option>
                    @endforeach
                </select>
                
            </div>
        </div>
    </div>

    <div class="filter-buttons">
        <div class="col-sm-2 col-xs-6">
            {!! Form::submit('ΕΚΤΕΛΕΣΗ', ['class' => 'run']) !!}
        </div>
        <div class="col-sm-2 col-xs-6">
            <input type="submit" value="ΑΚΥΡΩΣΗ" class="cancel">
        </div>
    </div>

</div>

{!! Form::close() !!}


<script>

    $(document).ready(function(){

//        $('#geographicalWrap select').select2();
//        $('#producersWrap select').select2();

        $('#groupBy2').change(function(){
            if($(this).val() == 'geographical'){
                $('#geographicalWrap').show();
                $('#producersWrap').hide();
            }else{
                $('#geographicalWrap').hide();
                $('#producersWrap').show();
            }
        })

    })

</script>