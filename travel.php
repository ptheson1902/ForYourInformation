<?php
  include_once('conn.php');
  include_once('config.php');
  $sql = " SELECT * FROM groupf_travel";

  $result = mysqli_query( $conn , $sql );

  $work = mysqli_fetch_all($result,MYSQLI_ASSOC);
  // $row = mysqli_fetch_assoc($result);
?>
      
<div class="card-body" style="padding: 2% 10%">
  <div class="tab-content row" id="myTabContent" style="justify-content: space-around;">
    <div class="col-md-9">
<!-- Travel Item Data -->

      <?php
          foreach($work as $key => $works){
      ?>
      <div class="row mb-5" style="box-shadow:0 5px 13px rgba(0,0,0,0.16);padding:10px;">
        <div class="col-md-4">
          <img src="image/<?php echo $works['image'] ?>" class="card-img" alt="...">
        </div>
        <div class="col-md-8">
          <div class="card-body text-left">
            <h5 class="card-title"><?php echo $works['name'] ?></h5>
            <p class="card-text"><?php echo $lang['address'] ?> : <?php echo $works['position'] ?></p>
            <p class="card-text"><?php echo $works['description'] ?>。。。</p>
            <p class="card-text"><small class="text-muted"><?php echo $lang['updated'] ?></small></p>
            <button type="button" class="btn btn-primary" style="font-size:10px;width:80px;margin-top:-10px;" onclick="layid(<?php echo $works['id'] ?>, '<?php echo $works['tablename']?>')"><?php echo $lang['details'] ?></button>
          </div>
        </div>
      </div>
      <hr>
      <?php } ?>

<!-- End Travel Item Data -->

    </div>
    <!-- Banner Data -->
    <?php include_once('banner.html') ?>
  </div>

</div>