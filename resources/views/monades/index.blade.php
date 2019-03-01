
@extends('app')

@section('content')

<div class="section no-bt-padding">
    <div class="row">
        <div class="col-sm-6 col-xs-12">
            <h4 class="sec-head no-icon">ΜΟΝΑΔΑ</h4>
        </div>
        <div class="col-sm-6 col-xs-12">
            <a class="newnotification pull-right" href="{{url('/monades/create')}}">ΔΗΜΙΟΥΡΓΙΑ ΜΟΝΑΔΑΣ</a>
        </div>
    </div>
</div>


<div class="section top25">
    <div class="row">
        <div class="col-xs-12">
            <div class="table-full-wrapper table-border">

                <div class="filters">
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            <div class="perpage">
                                <select>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="40">40</option>
                                    <option value="50">50</option>
                                </select>
                                <span>Καταχωρήσεις</span>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="search">
                                <form action="#">
                                    <input type="text" placeholder="Αναζήτηση">
                                    <input type="submit" value="">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content">
                    <div class="tab-pane fade in active">

                        <div class="table-responsive">
                            <table class="table table-hover messages-table">
                                <thead>
                                    <tr>
                                        <th><a href="#">Μονάδα<i class="icon gicon-sort-by"></i></a></th>
                                        <th><a href="#">Επεξεργασία<i class="icon gicon-sort-by"></i></a></th>
                                        <th><a href="#">Λάσπες</a></th>
                                        <th><a href="#">Φυτικά</a></th>
                                        <th class="mem-category mem-black"><a href="#">Κατ. 1</a></th>
                                        <th class="mem-category mem-yellow"><a href="#">Κατ. 2</a></th>
                                        <th class="mem-category mem-green"><a href="#">Κατ. 3</a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($rows as $row)
                                    <tr>
                                        <td><a href="{{url('/monades/'.$row->id.'/edit')}}" >{!! $row->name!!}</td>
                                        <td>{!! $row->kafsis_code!!}</td>
                                        <td>{!! $row->Cat1!!}</td>
                                        <td>{!! $row->Cat2!!}</td>
                                        <td>{!! $row->Cat3!!}</td>
                                        <td>{!! $row->Laspi!!}</td>
                                        <td>{!! $row->Fytika!!}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="row">
                            <div class="table-pagination">
                                <div class="col-sm-6 col-xs-12">
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                     {!! (new App\Pagination($rows))->render() !!}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection







