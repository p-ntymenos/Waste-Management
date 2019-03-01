@extends('app')


@section('content')



<!-- =========================== MAIN CONTENT =========================== -->


<!-- =========================== MAIN SECTION =========================== -->
                <div class="section">
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1 col-xs-12">
                            <div class="page-rantevou">
                                <div class="text-center">
                                    <h2>Κλείστε ραντεβού</h2>
                                    <p class="top15">Σκοπός μας είναι να σας βοηθήσουμε όσο το δυνατόν ταχύτερα και αποτελεσματικότερα. Μπορείτε να υποβάλετε εδώ το αίτημα σας για την παραλαβή αποβλήτων.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1 col-xs-12">
                            <form id="form-rantevou" action="steile.php" method="POST">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" placeholder="Ονοματεπώνυμο *" value="" required />
                                        <input type="text" placeholder="Τηλέφωνο (Σταθερό) *" value="" required  />
                                        <input type="text" placeholder="Τηλέφωνο (Κινητό) *" value="" required />
                                        <input type="text" placeholder="Πόλη *" required value="" required />
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="Είδος Επιχέιρησης *" value="" required />
                                        <input type="email" placeholder="your@email.com" value="" required />
                                        <input type="text" placeholder="Τόπος φόρτωσης (Οδός και Αριθμός) *" />
                                        <input type="text" placeholder="ΤΚ *" required />
                                    </div>
                                    <div class="col-xs-12">
                                        <input type="text" placeholder="Περιγραφή εμπορεύματος">
                                    </div>
                                </div>
                                <div class="row top80">
                                    <div class="col-sm-4 col-xs-12">
                                        <p class="small-text">*Υποχρεωτικά πεδία</p>
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                                        <input type="submit" value="ΑΠΟΣΤΟΛΗ" class="">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row top80">
                        <div class="col-sm-6 col-sm-offset-1 col-xs-12">
                            <p>Σημείωση: Για τη δική σας διευκόλυνση κάποια από τα παραπάνω πεδία είναι προσυμπληρωμένα. Αν χρειάζετε να επεξεργαστείτε οποιοδήποτε από αυτά απλώς πατήστε πάνω του.</p>
                        </div>
                    </div>

                    <div class="row top170">
                        <div class="contact">
                            <div class="col-md-3 col-md-offset-1 col-sm-4 col-xs-12">
                                <h5>ΚΕΝΤΡΙΚΑ ΓΡΑΦΕΙΑ</h5>
                                <h4>Ελλάδα</h4>
                                <p>Λεωφόρος Αθήνας 7</p>
                                <p>Καβούρι - Βουλιαγμένη, 166 71</p>
                                <p>Αθήνα, Ελλάδα</p>
                                <p class="top10"><span class="blue">Tel.</span>+30 210.89.60.100</p>
                                <p><span class="blue">Fax.</span>+30 210.89.61.100</p>
                            </div>
                            <div class="col-md-3 col-sm-4 col-xs-12">
                                <h5>ΤΗΛΕΦΩΝΑ ΕΞΥΠΗΡΕΤΗΣΗΣ</h5>
                                <h4>Ώρες Υποστήριξης</h4>
                                <p>8.00 με 19.00 Δευτέρα εως Παρασκευή.<br/> Θα κάνουμε το καλύτερο δυνατόν <br/>για να σας απαντήσουμε εντός 24 ωρών.</p>
                                <p class="top10"><span class="blue">Tel.</span>+30 210.89.60.100</p>
                                <p><span class="blue">Fax.</span>+30 210.89.61.100</p>
                                <p class="top10"><a href="mailto:info@gorilla_app.com"><span class="blue">info@gorilla_app.com</span></a></p>
                            </div>
                            <div class="col-md-3 col-sm-4 col-xs-12">
                                <h5>ΤΕΧΝΙΚΗ ΥΠΟΣΤΗΡΙΞΗ</h5>
                                <h4>Χρειάζεστε βοήθεια;</h4>
                                <p>Είμαστε εδώ για να βοηθήσουμε.<br/>Επιλέξτε τον τρόπο επικοινωνίας<br/> και θα συνδεθείτε με το άρτια<br/> καταρτισμένο προσωπικό μας.</p>
                                <p class="top10"><span class="blue">Gorilla App Γραμμή Υποστήριξης:</span></p>
                                <p>+30 210.89.60.100</p>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- =========================== /MAIN SECTION =========================== -->
  




@endsection

@section('javascript')

@endsection