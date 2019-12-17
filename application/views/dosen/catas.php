        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-book"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Masuk</span>
                <span class="info-box-number">
                <?php foreach ($data['masuk'] as $d){
                 $j=$d['jum'];
                 if($j>0){ 
                    echo $d['jum'];
                  }else {
                     echo "0";
                  }}
                  ?> Judul               
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-book"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Diterima</span>
                <span class="info-box-number">
                  <?php foreach ($data['setuju'] as $d){
                 $j=$d['jum'];
                 if($j>0){ 
                    echo $d['jum'];
                  }else {
                     echo "0";
                  }}
                  ?> Judul  
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-book"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Diambil</span>
                <span class="info-box-number">
                <?php foreach ($data['ambil'] as $d){
                 $j=$d['jum'];
                 if($j>0){ 
                    echo $d['jum'];
                  }else {
                     echo "0";
                  }}
                  ?> Judul
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-book"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Ditolak</span>
                <span class="info-box-number">
                <?php foreach ($data['tolak'] as $d){
                 $j=$d['jum'];
                 if($j>0){ 
                    echo $d['jum'];
                  }else {
                     echo "0";
                  }}
                  ?> Judul
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->