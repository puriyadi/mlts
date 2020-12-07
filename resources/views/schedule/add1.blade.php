@extends('layouts.admin')

@section('title')
    <title>Schedule</title>
@endsection


@section('breadcrumb')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Schedule</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="/schedule">Schedule</a></li>
            <li class="breadcrumb-item active">Tambah Schedule</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
@endsection

@section('content')
<div id="modalform" class="modal fade">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Form Schedule</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" id="btnclosevehicle" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnsavevehicle">Save</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div class="container">
            <div class="card-title">
              <div class="row">
                <div class="col-xs-3">Schedule </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <form id="formschedule">
            @csrf
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label for="">Kode Schedule</label>
                  <div class="form-group">
                    <input type="text" class="form-control" id="sched_id" name="sched_id" placeholder="Kode Schedule"/>
                  </div>
                </div>
                <div class="col-md-3">
                  <label for="">Tanggal Schedule</label>
                  <div class="input-group">
                    <input type="text" class="form-control" id="sched_date" name="sched_date" placeholder="Tanggal Schedule"/> 
                  </div>
                </div>
                <div class="col-md-3">
                  <label for="">Cabang</label>
                  <div class="input-group">
                    <select class="form-control select2" name="branch_id" id="branch_id" onchange="getCust(this.value);">
                      <option value="" selected>--Pilih Cabang--</option>
                      @foreach($branchs as $branch) 
                        <option value="{{ $branch->branch_id }}">{{ $branch->branch_id."-".$branch->branch_name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <label for="">Total Dana Kerja</label>
                  <div class="input-group">
                    <input type="number" readonly class="form-control" id="grand_total" name="grand_total" min="0" value="0"/> 
                  </div>
                </div>
              </div>
            </div>

            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="pill" href="#tabhome" role="tab" aria-controls="tabhome" aria-selected="true">Kendaraan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="doc-tab" data-toggle="pill" href="#tabdoc" role="tab" aria-controls="tabdoc" aria-selected="false">Dokumen</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-below-messages-tab" data-toggle="pill" href="#custom-content-below-messages" role="tab" aria-controls="custom-content-below-messages" aria-selected="false">Messages</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-below-settings-tab" data-toggle="pill" href="#custom-content-below-settings" role="tab" aria-controls="custom-content-below-settings" aria-selected="false">Settings</a>
              </li>
            </ul>
            <div class="tab-content" id="custom-content-below-tabContent">
              <div class="tab-pane fade show active" id="tabhome" role="tabpanel" aria-labelledby="home-tab">
                <div class="form-group">
                  <label for=""></label>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-3">
                      <label for="">No SI</label>
                      <div class="form-group">
                        <input type="text" class="form-control" id="si_id" name="si_id" placeholder="No SI"/>
                      </div>
                    </div>
                     
                    <div class="col-md-3">
                      <label for="">Bisnis Unit</label>
                      <div class="input-group">
                        <select class="form-control select2" name="buss_unit" id="buss_unit">
                          <option value="" selected>--Pilih Bisnis Unit--</option>
                          <option value="IMPORT">IMPORT</option>
                          <option value="EXPORT">EXPORT</option>
                          <option value="REPO">REPO</option>
                          <option value="LOCAL">LOCAL</option>
                        </select>
                      </div>
                    </div>
                      
                    <div class="col-md-3">
                      <label for="">Depo</label>
                      <div class="input-group">
                        <input type="text" class="form-control" id="depo" name="depo" placeholder="Depo"/> 
                      </div>         
                    </div>
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="">Peta Tempat Muat</label>
                      <div class="form-group">
                        <input id="pac-inputMuat" class="pac-input controls" type="text" placeholder="Search Box" onkeypress="keyMapMuat();"/>
                        <div id="googleMapMuat" style="width:100%;height:400px;"></div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="">Peta Tempat Bongkar</label>
                      <div class="form-group">
                        <input id="pac-inputBongkar" class="pac-input controls" type="text" placeholder="Search Box" onkeypress="keyMapBongkar();"/>
                        <div id="googleMapBongkar" style="width:100%;height:400px;"></div>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="">Tempat Muat</label>
                      <div class="form-group">
                        <input type="text" class="form-control" id="pickup_name" name="pickup_name" placeholder="Tempat Muat"/>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="">Tempat Bongkar</label>
                      <div class="form-group">
                        <input type="text" class="form-control" id="dest_name" name="dest_name" placeholder="Tempat Bongkar"/>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-6">
                          <label for="">Latitude Muat</label>
                          <div class="form-group">
                            <input type="text" class="form-control" readonly id="latitude_muat" name="latitude_muat" placeholder="Latitude Muat"/>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label for="">Longitude Muat</label>
                          <div class="form-group">
                            <input type="text" class="form-control" readonly id="longitude_muat" name="longitude_muat" placeholder="Longitude Muat"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-6">
                          <label for="">Latitude Bongkar</label>
                          <div class="form-group">
                            <input type="text" class="form-control" readonly id="latitude_bongkar" name="latitude_bongkar" placeholder="Latitude Bongkar"/>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label for="">Longitude Bongkar</label>
                          <div class="form-group">
                            <input type="text" class="form-control" readonly id="longitude_bongkar" name="longitude_bongkar" placeholder="Longitude Bongkar"/>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="">Kontak Tempat Muat</label>
                      <div class="form-group">
                        <input type="text" class="form-control" id="pickup_contact" name="pickup_contact" placeholder="Kontak Tempat Muat"/>
                      </div>
                    </div>
                    
                    <div class="col-md-6">
                      <label for="">Kontak Tempat Bongkar</label>
                      <div class="form-group">
                        <input type="text" class="form-control" id="dest_contact" name="dest_contact" placeholder="Kontak Tempat Bongkar"/>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="">Alamat Tempat Muat</label>
                      <div class="form-group">
                        <textarea class="form-control" id="pickup_address" name="pickup_address" placeholder="Alamat Tempat Muat"></textarea>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="">Alamat Tempat Bongkar</label>
                      <div class="form-group">
                        <textarea class="form-control" id="dest_address" name="dest_address" placeholder="Alamat Tempat Bongkar"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="">Customer</label>
                  <select name="cust_id" id="cust_id" class="form-control select2" onchange="getCustAddress(this.value)">
                    <option value="" selected>--Pilih Customer--</option>
                  </select>
                </div>
                
                <div class="form-group">
                  <label for="">Alamat Customer</label>
                  <textarea class="form-control" id="cust_address" name="cust_address" placeholder="Customer Address Untuk Penagihan"></textarea>
                </div>
                
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-3">
                      <label for="">Container</label>
                      <div class="form-group">
                        <select id="cont_id" name="cont_id" class="form-control select2">
                          <option value="" selected>--Pilih Container--</option>
                          @foreach($containers as $cont)
                            <option value="{{ $cont->cont_id }}">{{ $cont->cont_name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <label for="">No Container</label>
                      <div class="form-group">
                        <input type="text" class="form-control" id="cont_no" name="cont_no" placeholder="No Container"/>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <label for="">No Seal</label>
                      <div class="input-group">
                        <input type="text" class="form-control" id="seal_no" name="seal_no" placeholder="No Seal"/> 
                      </div>
                    </div>
                    <div class="col-md-3">
                      <label for="">Gembok</label>
                      <div class="input-group">
                        <select class="form-control" id="padlock" name="padlock">
                          <option value="">--Gembok--</option>
                          <option value="Y"> Yes </option>
                          <option value="N"> No </option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-3">
                      <label for="">Sopir</label>
                      <div class="form-group">
                        <select name="drv_id" id="drv_id" class="form-control select2">
                          <option value="" selected>--Pilih Sopir--</option>
                          @foreach($drivers as $driver) 
                            <option value="{{ $driver->drv_id }}">{{ $driver->drv_name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <label for="">Kendaraan</label>
                      <div class="input-group">
                        <select name="vhc_id" id="vhc_id" class="form-control select2">
                          <option value="" selected>--Pilih Kendaraan--</option>
                          @foreach($vehicles as $vehicle) 
                            <option value="{{ $vehicle->vhc_id }}">{{ $vehicle->vhc_plat_no }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <label for="">Dana Kerja</label>
                      <div class="input-group">
                        <input type="number" class="form-control" min="0" id="amount" name="amount"/>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <label for=""></label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary" id="btnsaveschedule">Save</button>
                </div>    
              </div>
            </div>
        </form>

        <div class="tab-custom-content">
          <table id="tblsalesinvoice" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>SI</th>
                <th>Customer</th>
                <th>Muat</th>
                <th>Bongkar</th>
                <th>Sopir</th>
                <th>Kendaraan</th>
                <th>Action</th>
              </tr>
            </thead>
          </table>
          @csrf
        </div>

        <div class="tab-pane fade" id="tabdoc" role="tabpanel" aria-labelledby="doc-tab">
          Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna. 
        </div>
        <div class="tab-pane fade" id="custom-content-below-messages" role="tabpanel" aria-labelledby="custom-content-below-messages-tab">
          Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna. 
        </div>
        <div class="tab-pane fade" id="custom-content-below-settings" role="tabpanel" aria-labelledby="custom-content-below-settings-tab">
          Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis. 
        </div>
      </div>
    </div>
        <!-- /.card-body -->
  </div>
      <!-- /.card -->
</div>
@endsection

@push('dttable')
<script>
  'use strict'
  //Initialize Select2 Elements
  $('.select2').select2();
  $('#sched_date').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
  });
  
  var baseurl="";
  
  function initMap() {
    const mapMuat = new google.maps.Map(document.getElementById("googleMapMuat"), {
      center: { lat: -6.200000, lng: 106.816666 },
      zoom: 13
    });
    // Create the search box and link it to the UI element.
    const inputMuat = document.getElementById("pac-inputMuat");
    const searchBoxMuat = new google.maps.places.SearchBox(inputMuat);
    mapMuat.controls[google.maps.ControlPosition.LEFT].push(inputMuat);

    inputMuat.onkeypress = function(e){
      if(e.keyCode == 13) {
        e.preventDefault();
      }
      
      // Bias the SearchBox results towards current map's viewport.
      mapMuat.addListener("bounds_changed", () => {
        searchBoxMuat.setBounds(mapMuat.getBounds());
      });
      let markersMuat = [];
      // Listen for the event fired when the user selects a prediction and retrieve
      // more details for that place.
      searchBoxMuat.addListener("places_changed", () => {
        const placesMuat = searchBoxMuat.getPlaces();
        if (placesMuat.length == 0) {
          return;
        }
        // Clear out the old markers.
        markersMuat.forEach((marker) => {
          marker.setMap(null);
        });
        markersMuat = [];
        // For each place, get the icon, name and location.
        const boundsMuat = new google.maps.LatLngBounds();
        placesMuat.forEach((place) => {
        if (!place.geometry) {
          console.log("Returned place contains no geometry");
          return;
        }
        const iconMuat = {
          url: place.icon,
          size: new google.maps.Size(71, 71),
          origin: new google.maps.Point(0, 0),
          anchor: new google.maps.Point(17, 34),
          scaledSize: new google.maps.Size(25, 25),
        };
        // Create a marker for each place.
        markersMuat.push(
          new google.maps.Marker({
            mapMuat,
            iconMuat,
            title: place.name,
            position: place.geometry.location,
          })
        );

        document.getElementById('pickup_name').value = place.name;
        document.getElementById('latitude_muat').value = place.geometry.location.lat();
        document.getElementById('longitude_muat').value = place.geometry.location.lng();
        document.getElementById('pickup_address').value = searchBoxMuat.getPlaces()[0].formatted_address; 

        if (place.geometry.viewport) {
          // Only geocodes have viewport.
          boundsMuat.union(place.geometry.viewport);
        } else {
          boundsMuat.extend(place.geometry.location);
          }
        });
        mapMuat.fitBounds(boundsMuat);
      });
    };

    //---------------------- map bongkar ---------------------------
    const mapBongkar = new google.maps.Map(document.getElementById("googleMapBongkar"), {
      center: { lat: -6.200000, lng: 106.816666 },
      zoom: 13
    });
    // Create the search box and link it to the UI element.
    const inputBongkar = document.getElementById("pac-inputBongkar");
    const searchBoxBongkar = new google.maps.places.SearchBox(inputBongkar);
    mapBongkar.controls[google.maps.ControlPosition.LEFT].push(inputBongkar);

    inputBongkar.onkeypress = function(e){
      if(e.keyCode == 13) {
        e.preventDefault();
      }
      
      // Bias the SearchBox results towards current map's viewport.
      mapBongkar.addListener("bounds_changed", () => {
        searchBoxBongkar.setBounds(mapBongkar.getBounds());
      });
      let markersBongkar = [];
      // Listen for the event fired when the user selects a prediction and retrieve
      // more details for that place.
      searchBoxBongkar.addListener("places_changed", () => {
        const placesBongkar = searchBoxBongkar.getPlaces();
        if (placesBongkar.length == 0) {
          return;
        }
        // Clear out the old markers.
        markersBongkar.forEach((marker) => {
          marker.setMap(null);
        });
        markersBongkar = [];
        // For each place, get the icon, name and location.
        const boundsBongkar = new google.maps.LatLngBounds();
        placesBongkar.forEach((place) => {
        if (!place.geometry) {
          console.log("Returned place contains no geometry");
          return;
        }
        const iconBongkar = {
          url: place.icon,
          size: new google.maps.Size(71, 71),
          origin: new google.maps.Point(0, 0),
          anchor: new google.maps.Point(17, 34),
          scaledSize: new google.maps.Size(25, 25),
        };
        // Create a marker for each place.
        markersBongkar.push(
          new google.maps.Marker({
            mapBongkar,
            iconBongkar,
            title: place.name,
            position: place.geometry.location,
          })
        );

        document.getElementById('dest_name').value = place.name;
        document.getElementById('latitude_bongkar').value = place.geometry.location.lat();
        document.getElementById('longitude_bongkar').value = place.geometry.location.lng();
        document.getElementById('dest_address').value = searchBoxBongkar.getPlaces()[0].formatted_address; 
      
        if (place.geometry.viewport) {
          // Only geocodes have viewport.
          boundsBongkar.union(place.geometry.viewport);
        } else {
          boundsBongkar.extend(place.geometry.location);
          }
        });
        mapBongkar.fitBounds(boundsBongkar);
      });
    };
 
  }
</script>
@endpush