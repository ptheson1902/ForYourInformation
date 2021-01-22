<?php
  include_once('conn.php');
  include_once('config.php');
  $sql = "SELECT * FROM groupf_work";
  
  $result = mysqli_query( $conn , $sql );
  
  $work = mysqli_fetch_all($result,MYSQLI_ASSOC);
  // $row = mysqli_fetch_assoc($result);
  
?>
<div class="card-header">
  <ul class="nav nav-tabs card-header-tabs justify-content-around" id="myTab" role="tablist">
    <li class="nav-item" style="width: 300px;">
      <a class="nav-link active" id="partimes-tab" data-toggle="tab" href="#partimes" role="tab" aria-controls="partimes" aria-selected="true"><?php echo $lang['partime'] ?></a>
    </li>
    <li class="nav-item" style="width: 300px;">
      <a class="nav-link" id="work-tab" data-toggle="tab" href="#work" role="tab" aria-controls="work" aria-selected="false"><?php echo $lang['employment'] ?></a>
    </li>
    <li class="nav-item" style="width: 300px;">
      <a class="nav-link" id="tokutei-tab" data-toggle="tab" href="#tokutei" role="tab" aria-controls="tokutei" aria-selected="false"><?php echo $lang['specific'] ?></a>
    </li>
  </ul>
</div>
<div class="card-body p-5">
  <div class="tab-content row" id="myTabContent" style="justify-content: space-around;">
    <div class="col-md-9 tab-pane fade show active" id="partimes" role="tabpanel" aria-labelledby="partimes-tab">
      <div class="row">
        <!-- Partimes-data -->
        <?php
          foreach($work as $key => $works){
            if($works['type']==='partime'){
        ?>
          <div class="col-md-6">
            <div class="card mb-3" style="max-width: 100%; padding: 0;max-height: 200px; border:none;">
              <div class="row">
                <div class="col-md-7">
                  <img src="image/<?php echo $works['image'] ?>" class="card-img" alt="..." height="180">
                </div>
                <div class="col-md-5 text-left">
                  <div class="card-body pt-0">
                    <h5 class="card-title"><?php echo $works['workname']?></h5>
                    <p class="card-text"><?php echo $lang['hourly_wage'] ?> : <?php echo $works['salary'] ?></p>
                    <p class="card-text"><?php echo $lang['position'] ?> : <?php echo $works['position'] ?></p>
                    <button type="button" class="btn btn-outline-warning dangki" onclick="layid(<?php echo $works['id']?>, '<?php echo $works['tablename']?>')"><?php echo $lang['apply'] ?></button>
                    <button type="button" class="btn btn-outline-warning"><?php echo $lang['details'] ?></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php }}?>
      </div>
    </div>

    <div class="col-md-9 tab-pane fade" id="work" role="tabpanel" aria-labelledby="work-tab">
      <div class="row">
        <!-- Work-datas -->
        <?php
          foreach($work as $key => $works){
            if($works['type']==='work'){
        ?>
          <div class="col-md-6">
            <div class="card mb-3" style="max-width: 100%; padding: 0;max-height: 200px; border:none;">
              <div class="row">
                <div class="col-md-7">
                  <img src="image/<?php echo $works['image'] ?>" class="card-img" alt="..." height="180">
                </div>
                <div class="col-md-5 text-left">
                  <div class="card-body pt-0">
                    <h5 class="card-title"><?php echo $lang['company_name'] ?> : <?php echo $works['workname']?></h5>
                    <p class="card-text"><?php echo $lang['salary'] ?> : <?php echo $works['salary'] ?></p>
                    <p class="card-text"><?php echo $lang['industry'] ?> : <?php echo $works['industry'] ?></p>
                    <button type="button" class="btn btn-outline-warning dangki" onclick="layid(<?php echo $works['id']?>, '<?php echo $works['tablename']?>')"><?php echo $lang['entry'] ?></button>
                    <button type="button" class="btn btn-outline-warning"><?php echo $lang['explanatory_meeting'] ?></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php }} ?>
      </div>
    </div>

    <div class="col-md-9 tab-pane fade" id="tokutei" role="tabpanel" aria-labelledby="tokutei-tab">
      <div class="row">
        <!-- Tokutei-datas -->
        <?php
          foreach($work as $key => $works){
            if($works['type']==='tokutei'){
        ?>
          <div class="col-md-6">
            <div class="card mb-3" style="max-width: 100%; padding: 0;max-height: 200px; border:none;">
              <div class="row">
                <div class="col-md-7">
                  <img src="image/<?php echo $works['image'] ?>" class="card-img" alt="..." height="180">
                </div>
                <div class="col-md-5 text-left">
                  <div class="card-body pt-0">
                    <h5 class="card-title"><?php echo $lang['company_name'] ?> : <?php echo $works['workname']?></h5>
                    <p class="card-text"><?php echo $lang['office'] ?> : <?php echo $works['office'] ?></p>
                    <p class="card-text"><?php echo $lang['industry'] ?> : <?php echo $works['industry'] ?></p>
                    <button type="button" class="btn btn-outline-warning dangki" onclick="layid(<?php echo $works['id']?>, '<?php echo $works['tablename']?>')"><?php echo $lang['entry'] ?></button>
                    <button type="button" class="btn btn-outline-warning"><?php echo $lang['explanatory_meeting'] ?></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php }} ?>
      </div>
    </div>
    
    <!-- Banner data -->
    <?php include_once('banner.html') ?>
      
  </div>

</div>
