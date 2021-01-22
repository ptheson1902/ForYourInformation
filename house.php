<?php
  include_once('conn.php');
  include_once('config.php');
  $sql = " SELECT * FROM groupf_house";

  $result = mysqli_query( $conn , $sql );

  $work = mysqli_fetch_all($result,MYSQLI_ASSOC);
  // $row = mysqli_fetch_assoc($result);

?>

<div class="card-body" style="padding: 2% 10%">
  <div class="tab-content row" id="myTabContent" style="justify-content: space-around;">
    <div class="col-md-9">
<!-- House Item Data -->
    <?php
        foreach($work as $key => $works){
    ?>
      <div class="row mb-5" style="box-shadow:0 5px 13px rgba(0,0,0,0.16);padding:10px;">
        <div class="col-md-4" style="display:flex;justify-content:center;align-item:center;">
          <img src="image/<?php echo $works['image'] ?>" class="img-fluid" alt="..." height="180">
        </div>
        <div class="col-md-8 text-left">
          <h6><?php echo $works['name'] ?></h6>
          <table class="table" style="font-size:12px;">
            <thead>
            <tbody>
              <tr>
                <th scope="row" class="col-md-2"><?php echo $lang['address'] ?></th>
                <td><?php echo $works['position'] ?></td>
              </tr>
              <tr>
                <th scope="row"><?php echo $lang['traffic'] ?></th>
                <td><?php echo $works['traffic'] ?></td>
              </tr>
              <tr>
                <th scope="row"><?php echo $lang['construction'] ?></th>
                <td><?php echo $works['construction'] ?></td>
              </tr>
              <tr>
                <td colspan="2">
                  <span class="col-md-3"><?php echo $works['floors'] ?><?php echo $lang['floor'] ?></span>
                  <span class="col-md-3"><?php echo $works['rent'] ?><?php echo $lang['yen'] ?> (<?php echo $works['precedent'] ?>)</span>
                  <span class="col-md-3"><?php echo $works['type'] ?> / <?php echo $works['acreage'] ?>.00㎡</span>
                  <span class="col-md-3"><?php echo $works['status'] ?></span>
                </td>
              </tr>
            </tbody>
          </table>
          <button type="button" class="btn btn-primary" style="font-size:10px;width:80px;margin-top:-10px;" onclick="layid(<?php echo $works['id'] ?>, '<?php echo $works['tablename']?>')"><?php echo $lang['details'] ?></button>
        </div>
      </div>
      <hr>
    <?php }?>
<!-- End House Item Data -->

      </div>
    <!-- Banner Data -->
    <?php include_once('banner.html') ?>
  </div>

</div>