@extends('admindansuperadmin.layouts.main')
@section('content')

<div class="content-wrapper" style="min-height: 536.4px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{  $commentCount }}</h3>

                <p>Data Comments</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{  $resepCount }}</h3>

                <p>Data Resep</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{  $articleCount  }}</h3>

                <p>Data Article</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{   $nutrisiCount  }}</h3>

                <p>Data Nutrisi</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable ui-sortable">
            <!-- Custom tabs (Charts with tabs)-->
          
            <!-- /.card -->

            <!-- DIRECT CHAT -->
            <!-- Data Comments -->
            <div class="card direct-chat direct-chat-primary">
              <div class="card-header ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">Data Comments Pengunjung</h3>

                <div class="card-tools">
                  <span title=" New Messages" class="badge badge-primary">{{  $commentCount }}</span>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
                    <i class="fas fa-comments"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages " style="margin-bottom: 1.5rem">
                  <!-- Message. Default to the left -->
                  <div class="direct-chat-msg">
                    @foreach($commentsData as $key => $comment)
                        <div class="direct-chat-msg @if($key % 2 == 0) right @endif">
                            <div class="direct-chat-infos clearfix">
                                {{-- @if($comment->user) --}}
                                    <span class="direct-chat-name @if($key % 2 == 0) float-right @else float-left @endif">
                                        {{ $comment->user_name }}
                                    </span>
                                {{-- @endif --}}
                                <span class="direct-chat-timestamp @if($key % 2 == 0) float-left @else float-right @endif">
                                    {{ $comment->created_at->format('d M Y ') }}
                                </span>
                            </div>
                
                            <img src="{{ $comment->user_image ? asset('storage/photo-user/' . $comment->user_image) : asset('assets/image/default-profile.jpg') }}" class="direct-chat-img" alt="User Image">
                            <div class="direct-chat-text">
                                {!! $comment->comment !!}
                            </div>
                        </div>
                    @endforeach
                </div>
                
                
                </div>
                <!--/.direct-chat-messages-->

                
                <!-- /.direct-chat-pane -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                {{-- <form action="#" method="post">
                  <div class="input-group">
                    <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                    <span class="input-group-append">
                      <button type="button" class="btn btn-primary">Send</button>
                    </span>
                  </div>
                </form> --}}
              </div>
              <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->

           
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable ui-sortable">

            <!-- Calendar -->
            <div class="card bg-gradient-success">
              <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Calendar
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <!-- button with a dropdown -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                      <i class="fas fa-bars"></i>
                    </button>
                    <div class="dropdown-menu" role="menu">
                      <a href="#" class="dropdown-item">Add new event</a>
                      <a href="#" class="dropdown-item">Clear events</a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">View calendar</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
             
              <div class="card-body pt-0" style="margin-left: 100px">
                <!-- Kalender -->
                <div id="calendar-content" style="width: 100%">
                    <div class="bootstrap-datetimepicker-widget usetwentyfour">
                        <ul class="list-unstyled">
                            <li class="show">
                                <!-- Isi kalender di sini -->
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection


@section('scripts')

      <script>
            // Inisialisasi datepicker dengan bulan dan tahun saat ini
        $(document).ready(function () {
            $('#calendar-content').datepicker({
                autoclose: true,
                todayHighlight: true,
                startView: 'months', // Mulai kalender dengan tampilan bulan
                minViewMode: 'months', // Set mode tampilan minimum menjadi bulan
                format: 'mm/yyyy', // Tampilkan bulan dan tahun
            });

            // Dapatkan tanggal saat ini
            var currentDate = new Date();
            var currentMonth = currentDate.getMonth() + 1; // Perhatikan: bulan dimulai dari 0
            var currentYear = currentDate.getFullYear();

            // Tetapkan tanggal awal pada datepicker
            $('#calendar-content').datepicker('setDate', new Date(currentYear, currentMonth - 1, 1));
        });
      </script>

@endsection
