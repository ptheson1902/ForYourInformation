<?php
  include_once('conn.php');
  include_once('config.php');
  $sql = " SELECT * FROM groupf_school";

  $result = mysqli_query( $conn , $sql );

  $work = mysqli_fetch_all($result,MYSQLI_ASSOC);
  // $row = mysqli_fetch_assoc($result);
?>
<div class="card-header">
  <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist" style="justify-content: space-around;">
    <li class="nav-item" style="width: 300px;">
      <a class="nav-link active" id="japanese-school-tab" data-toggle="tab" href="#japanese-school" role="tab" aria-controls="japanese-school" aria-selected="true"><?php echo $lang['japanese-school'] ?></a>
    </li>
    <li class="nav-item" style="width: 300px;">
      <a class="nav-link" id="university-tab" data-toggle="tab" href="#university" role="tab" aria-controls="university" aria-selected="false"><?php echo $lang['university'] ?></a>
    </li>
    <li class="nav-item" style="width: 300px;">
      <a class="nav-link" id="junior-college-tab" data-toggle="tab" href="#junior-college" role="tab" aria-controls="junior-college" aria-selected="false"><?php echo $lang['junior-school'] ?></a>
    </li>
    <li class="nav-item" style="width: 300px;">
      <a class="nav-link" id="vocational-tab" data-toggle="tab" href="#vocational" role="tab" aria-controls="vocational" aria-selected="false"><?php echo $lang['vocational'] ?></a>
    </li>
  </ul>
</div>
<div class="card-body p-5">
  <div class="tab-content row" id="myTabContent" style="justify-content: space-around;">
    <div class="col-md-9 tab-pane fade show active" id="japanese-school" role="tabpanel" aria-labelledby="japanese-school-tab">
      <div class="row japanese-school-datas">
<!-- japanese-school-datas -->
      <?php

        foreach($work as $key => $works){
          if($works['type']==='japanese'){
      ?>
        <div class="col-md-6">
          <div class="card mb-3" style="max-width: 100%; padding: 0;max-height: 200px; border:none;">
            <div class="row">
              <div class="col-md-7">
                <img src="image/<?php echo $works['image'] ?>" class="card-img" alt="..." height="180">
              </div>
              <div class="col-md-5 text-left">
                <div class="card-body pt-0">
                  <h6 class="card-title"><?php echo $lang['school_name'] ?> : <?php echo $works['name']?></h6>
                  <p class="card-text"><?php echo $lang['address'] ?> : <?php echo $works['position'] ?></p>
                  <p class="card-text"><?php echo $lang['tel'] ?>: <?php echo $works['tel'] ?></p>
                  <button type="button" class="btn btn-outline-warning dangki" onclick="layid(<?php echo $works['id']?>, '<?php echo $works['tablename']?>')"><?php echo $lang['document'] ?></button>
                  <button type="button" class="btn btn-outline-warning"><?php echo $lang['details'] ?></button>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php }}?>
<!-- end japanese-school-datas -->                
      </div>
    </div>

    <div class="col-md-9 tab-pane fade" id="university" role="tabpanel" aria-labelledby="university-tab">
      <div class="row">
<!-- university-datas -->                    
      <?php
        foreach($work as $key => $works){
          if($works['type']==='university'){
      ?>
        <div class="col-md-6">
          <div class="card mb-3" style="max-width: 100%; padding: 0;max-height: 200px; border:none;">
            <div class="row">
              <div class="col-md-7">
                <img src="image/<?php echo $works['image'] ?>" class="card-img" alt="..." height="180">
              </div>
              <div class="col-md-5 text-left">
                <div class="card-body pt-0">
                  <h6 class="card-title"><?php echo $lang['school_name'] ?> : <?php echo $works['name']?></h6>
                  <p class="card-text"><?php echo $lang['address'] ?> : <?php echo $works['position'] ?></p>
                  <p class="card-text"><?php echo $lang['tel'] ?> : <?php echo $works['tel'] ?></p>
                  <button type="button" class="btn btn-outline-warning dangki" onclick="layid(<?php echo $works['id']?>, '<?php echo $works['tablename']?>')"><?php echo $lang['document'] ?></button>
                  <button type="button" class="btn btn-outline-warning"><?php echo $lang['details'] ?></button>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php }}?>
<!-- end university-datas -->                    
      </div>
    </div>

    <div class="col-md-9 tab-pane fade" id="junior-college" role="tabpanel" aria-labelledby="junior-college-tab">
      <div class="row">
<!-- junior-college-datas -->                    
      <?php
        foreach($work as $key => $works){
          if($works['type']==='junior'){
      ?>
        <div class="col-md-6">
          <div class="card mb-3" style="max-width: 100%; padding: 0;max-height: 200px; border:none;">
            <div class="row">
              <div class="col-md-7">
                <img src="image/<?php echo $works['image'] ?>" class="card-img" alt="..." height="180">
              </div>
              <div class="col-md-5 text-left">
                <div class="card-body pt-0">
                  <h6 class="card-title"><?php echo $lang['school_name'] ?> : <?php echo $works['name']?></h6>
                  <p class="card-text"><?php echo $lang['address'] ?> : <?php echo $works['position'] ?></p>
                  <p class="card-text"><?php echo $lang['tel'] ?>: <?php echo $works['tel'] ?></p>
                  <button type="button" class="btn btn-outline-warning dangki" onclick="layid(<?php echo $works['id']?>, '<?php echo $works['tablename']?>')"><?php echo $lang['document'] ?></button>
                  <button type="button" class="btn btn-outline-warning"><?php echo $lang['details'] ?></button>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php }}?>
<!-- end junior-college-datas -->                    
      </div>
    </div>

    <div class="col-md-9 tab-pane fade" id="vocational" role="tabpanel" aria-labelledby="vocational-tab">
      <div class="row">
<!-- vocational-datas -->                    
      <?php
        foreach($work as $key => $works){
          if($works['type']==='vocational'){
      ?>
        <div class="col-md-6">
          <div class="card mb-3" style="max-width: 100%; padding: 0;max-height: 200px; border:none;">
            <div class="row">
              <div class="col-md-7">
                <img src="image/<?php echo $works['image'] ?>" class="card-img" alt="..." height="180">
              </div>
              <div class="col-md-5 text-left">
                <div class="card-body pt-0">
                  <h6 class="card-title"><?php echo $lang['school_name'] ?> : <?php echo $works['name']?></h6>
                  <p class="card-text"><?php echo $lang['address'] ?> : <?php echo $works['position'] ?></p>
                  <p class="card-text"><?php echo $lang['tel'] ?> : <?php echo $works['tel'] ?></p>
                  <button type="button" class="btn btn-outline-warning dangki" onclick="layid(<?php echo $works['id']?>, '<?php echo $works['tablename']?>')"><?php echo $lang['document'] ?></button>
                  <button type="button" class="btn btn-outline-warning"><?php echo $lang['details'] ?></button>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php }}?>
<!-- end vocational-datas -->                    
      </div>
    </div>

    <!-- Banner Data -->
    <?php include_once('banner.html') ?>
  </div>

</div>