@extends('layouts.master')

@section('content')
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="<?= base_url() ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Biasa</li>
  </ol>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus"></i> Baru</button>
  <hr>
  {{-- Filter --}}
  {{-- <div class="form-group">
    <label>Tahun :</label>
    <select name="tahun" class="form-control">
      <option value="">- Semua -</option>
      <option value="2018">2018</option>
      <option value="2019">2019</option>
    </select>
  </div>
  <div class="form-group">
    <label>Bulan :</label>
    <select name="bulan" class="form-control" disabled>
      <option value="">- Semua -</option>
      <option value="januari">Januari</option>
      <option value="februari">Februari</option>
      <option value="maret">Maret</option>
      <option value="april">April</option>
      <option value="mei">Mei</option>
      <option value="juni">Juni</option>
      <option value="juli">Juli</option>
      <option value="agustus">Agustus</option>
      <option value="september">September</option>
      <option value="oktober">Oktober</option>
      <option value="november">November</option>
      <option value="desember">Desember</option>
    </select>
  </div>
  <hr> --}}
  <!-- DataTables Example -->
  <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr class="text-center">
            <th>No. Surat</th>
            <th>Tanggal</th>
            <th>Perihal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
      @foreach ($surat as $s)
        <tr>
          <td>{{ $s->no_surat }}</td>
          <td>{{ $s->tanggal }}</td>
          <td>{{ $s->perihal }}</td>
          <td>
            <button type="button" class="btn btn-primary btn-sm" onclick="Edit({{ $s->id_surat }})"><i class="fas fa-pencil-alt"></i></button>
            <button type="button" class="btn btn-danger btn-sm" onclick="Hapus({{ $s->id_surat }})"><i class="fas fa-trash-alt"></i></button>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  {{-- MODAL --}}
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Baru</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form type="POST" id="tambah"  autocomplete="off">
          <!-- Modal body -->
          <div class="modal-body">
            <div class="row">
              <div class="col-sm-7">
                <div class="form-group">
                  <label>No. Surat</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="append">B/WDIII/</span>
                    </div>
                    <input class="form-control" type="text" id="no-surat" size="2" autofocus>
                    <div class="input-group-append">
                      <span class="input-group-text" id="prepend"></span>
                    </div>
                    <input type="text" name="no-surat" hidden>
                  </div>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Tanggal</label>
                  <div class="input-group">
                    <input class="form-control" data-inputmask-inputformat="yyyy/mm/dd" type="text" name="tgl" id="tgl">
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label>Perihal</label>
                  <textarea class="form-control" name="perihal" id="perihal" cols="30" rows="3"></textarea>
                </div>
              </div>
            </div>
          </div>
    
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  {{-- MODAL UBAH --}}
  <div class="modal" id="modal-ubah">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Ubah Surat</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form type="POST" id="update"  autocomplete="off">
          <!-- Modal body -->
          <div class="modal-body">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                <label>No. Surat</label>
                <input type="text" class="form-control" name="no-surat">
                <input type="text" name="id-surat" hidden readonly>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Tanggal</label>
                  <div class="input-group">
                    <input class="form-control" data-inputmask-inputformat="yyyy/mm/dd" type="text" name="tgl" id="tgl">
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label>Perihal</label>
                  <textarea class="form-control" name="perihal" id="perihal" cols="30" rows="3"></textarea>
                </div>
              </div>
            </div>
          </div>
    
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@push('javascript')
  <script src="<?= base_url('assets/vendor/input-mask')?>/jquery.inputmask.bundle.js"></script>
  <script src="<?= base_url('assets/vendor/datepicker')?>/js/gijgo.min.js" type="text/javascript"></script>
  <script>
    $(document).ready(function () {
      //clear field 
      $("#myModal").on('hidden.bs.modal', function(){
        $("input").val("");
        $("textarea").val("");
      });

      // datatable
      $('#example').dataTable( {
        "columnDefs": [
          { "width": "20%", "targets": 0 },
          { "width": "20%", "targets": 1 },
          { "width": "10%", "targets": 3 },
          { "className": "text-center", "targets": 3},
        ],
        "order": [[ 0, "desc" ]],
      } );

      // input mask no surat
      $('#no-surat').inputmask('99',{ "placeholder": "00" });
      $("#prepend").html(getBulanTahun());
      
      //generate no surat
      $("#no-surat").keyup(function() { 
        var append = $("#append").html();
        var no = $("#no-surat").val();
        var prepend = $("#prepend").html();
        $("input[name=no-surat]").val(append + no + prepend);
      });

      // submit form tambah
      $("#tambah").submit(function (e) { 
        e.preventDefault();
        $.ajax({
          type: "POST",
          url: "<?= base_url('biasa/create')?>",
          data: $(this).serialize(),
          beforeSend: function(){
            $.LoadingOverlay("show");
          },
          complete: function(){
            $.LoadingOverlay("hide");
          },
          success: function (response) {
            $('#myModal').modal('hide');

            table = $('#example').DataTable();
            table.destroy();
            table = $('#example').DataTable({
              columnDefs: [
                {"targets": [0,1], "width": "20%"},
                {"targets": [3], "width": "10%", "className": 'text-center'}
              ],
              order: [[ 0, "desc" ]]
            });
            populateTable(response);  

            //SWAL Berhasil
            swal({
              position: 'center',
              type: 'success',
              title: 'Data berhasil disimpan',
              showConfirmButton: false,
              timer: 1000
            })

          },
          error: function () { 
            //SWALL Koneksi Error
            swal({
              position: 'center',
              type: 'error',
              title: 'Terjadi Kesalahan Koneksi.',
              showConfirmButton: false,
              timer: 1000
            })
          }
        });

      });

      $("#update").submit(function (e) { 
        e.preventDefault();
        $.ajax({
          type: "POST",
          url: "<?= base_url('biasa/update')?>",
          data: $(this).serialize(),
          beforeSend: function(){
            $.LoadingOverlay("show");
          },
          complete: function(){
            $.LoadingOverlay("hide");
          },
          success: function (response) {
            $('#myModal').modal('hide');

            table = $('#example').DataTable();
            table.destroy();
            table = $('#example').DataTable({
              columnDefs: [
                {"targets": [0,1], "width": "20%"},
                {"targets": [3], "width": "10%", "className": 'text-center'}
              ],
              order: [[ 0, "desc" ]]
            });
            populateTable(response);  

            $("#modal-ubah").modal("hide");

            //SWAL Berhasil
            swal({
              position: 'center',
              type: 'success',
              title: 'Data berhasil disimpan',
              showConfirmButton: false,
              timer: 1000
            })

          },
          error: function () { 
            //SWALL Koneksi Error
            swal({
              position: 'center',
              type: 'error',
              title: 'Terjadi Kesalahan Koneksi.',
              showConfirmButton: false,
              timer: 1000
            })
          }
        });
      });

      //input mask tanggal
      $('#tgl').inputmask('9999-99-99',{ "placeholder": "yyyy-mm-dd" });
      
      //datepicker
      $('#tgl').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd'
      });

      //fitur filter
      $('select[name=tahun]').change(function (e) { 
        e.preventDefault();
        if ($('select[name=tahun]').val() != "" ) {
          $('select[name=bulan]').removeAttr('disabled');
        } else {
          $("select[name=bulan]").prop('disabled', true);
        }
      });
      
    });

    //get bulan dan tahun
    function getBulanTahun() {  
      var tgl = new Date();
      var bulan = tgl.getMonth();
      var tahun = tgl.getFullYear();
      var romawi = romanize(bulan + 1);
      return "/" + romawi + "/" + tahun;
    }
    
    // convert latin ke romawi
    function romanize (num) {
      if (isNaN(num))
          return NaN;
      var digits = String(+num).split(""),
          key = ["","C","CC","CCC","CD","D","DC","DCC","DCCC","CM",
                "","X","XX","XXX","XL","L","LX","LXX","LXXX","XC",
                "","I","II","III","IV","V","VI","VII","VIII","IX"],
          roman = "",
          i = 3;
      while (i--)
          roman = (key[+digits.pop() + (i * 10)] || "") + roman;
      return Array(+digits.join("") + 1).join("M") + roman;
    }
    
    // Function edit
    function Edit(id) {  
      $.ajax({
        url:'<?php echo base_url('biasa/readBy')?>',
        type:'POST',
        data: {id_surat: id},
        success : function(response){
          // console.log(response)
          var data = response.surat[0]
          $('input[name=id-surat]').val(data.id_surat);
          $('input[name=no-surat]').val(data.no_surat);
          $('input[name=tgl]').val(data.tanggal);
          $('textarea[name=perihal]').val(data.perihal);
         
          $('#modal-ubah').modal('show');
        }
      });
    }

    // function hapus
    function Hapus(id) {
      //SWAL Question
      swal({
        title: 'Yakin dihapus?',
        text: "Setelah dihapus data tidak bisa dikembalikan",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!'
      }).then((result) => {
        if (result.value) {
          //AJAX
          $.ajax({
            url:'<?php echo base_url('biasa/delete')?>',
            type:'POST',
            data: {id_surat: id},
            beforeSend: function(){
                $.LoadingOverlay("show");
            },
            complete: function(){
                $.LoadingOverlay("hide");
            },
            success : function(response){
              // console.log(response)
              table = $('#example').DataTable();
              table.destroy();
              table = $('#example').DataTable({
                columnDefs: [
                  {"targets": [0,1], "width": "20%"},
                  {"targets": [3], "width": "10%", "className": 'text-center'}
                ],
                order: [[ 0, "desc" ]]
              });
              populateTable(response);
              
              //SWALL Berhasil
              swal({
                position: 'center',
                type: 'success',
                title: 'Berhasil dihapus.',
                showConfirmButton: false,
                timer: 1000
              })  
            },
            error : function(){
              //SWALL Koneksi Error
              swal({
                position: 'center',
                type: 'error',
                title: 'Terjadi Kesalahan Koneksi.',
                showConfirmButton: false,
                timer: 1000
              }) 
            }
          });
          
        }
      })
    }

    //populate datatable
    function populateTable(json) {
      // clear the table before populating it with more data
      $("#example").DataTable().clear();
      var length = Object.keys(json.surat).length;
      for(var i = 0; i < length; i++) {
        var surat = json.surat[i];

        // You could also use an ajax property on the data table initialization
        $('#example').dataTable().fnAddData( [
            surat.no_surat,
            surat.tanggal,
            surat.perihal,
            "<button class='btn btn-sm btn-primary' data-toggle='tooltip' data-placement='top' title='Edit' onclick='Edit(" + surat.id_surat + ")'><i class='fas fa-edit'></i></button> <button class='btn btn-sm btn-danger' data-toggle='tooltip' data-placement='top' title='Hapus' onclick='Hapus(" + surat.id_surat +")'><i class='fas fa-trash-alt'></i></button>"
        ]);
      }        
    }

    

  </script>
  {{-- <script src="/example.js"></script> --}}
@endpush

@push('css')
  <link href="<?= base_url('assets/vendor/datepicker')?>/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    {{-- <link rel="stylesheet" href="style.css"> --}}
@endpush