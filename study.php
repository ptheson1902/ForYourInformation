<?php
  include_once('conn.php');
  include_once('config.php');
?>

<div class="card-header">
  <ul class="nav nav-tabs justify-content-around card-header-tabs" id="study" role="tablist">
      <li class="nav-item" style="width: 300px;">
        <a class="nav-link active" id="vocabulary-tab" data-toggle="tab" href="#vocabulary" role="tab" aria-controls="vocabulary" aria-selected="true"><?php echo $lang['vocabulary'] ?></a>
      </li>
      <li class="nav-item" style="width: 300px;">
        <a class="nav-link" id="grammar-tab" data-toggle="tab" href="#grammar" role="tab" aria-controls="grammar" aria-selected="false"><?php echo $lang['grammar'] ?></a>
      </li>
      <li class="nav-item" style="width: 300px;">
        <a class="nav-link" id="kanji-tab" data-toggle="tab" href="#kanji" role="tab" aria-controls="kanji" aria-selected="false"><?php echo $lang['kanji'] ?></a>
      </li>
  </ul>
</div>
<div class="card-body p-5">
  <div class="tab-content row" id="studyContent">
      <div class="col-md-9 tab-pane fade show active" id="vocabulary" role="tabpanel" aria-labelledby="vocabulary-tab">
        <div class="row justify-content-between">
          <?php
          // Select vocabulary data
            $sql = "SELECT * FROM groupf_study_vocabulary";
            $result = mysqli_query( $conn , $sql );
            $vocabulary = mysqli_fetch_all($result,MYSQLI_ASSOC);
            foreach($vocabulary as $key => $vocabularys){
          ?>
        
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center">
                  <h3 class="text-danger mr-5"><?php echo $vocabularys['vocabulary'] ?></h3>
                  <span class="mr-2"><?php echo $vocabularys['lang_vn'] ?></span>|<span class="ml-2"><?php echo $vocabularys['speak'] ?></span>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><?php echo $lang['example'] ?>1 : <?php echo $vocabularys['ex1'] ?></li>
                  <li class="list-group-item"><?php echo $lang['example'] ?>2 : <?php echo $vocabularys['ex2'] ?></li>
                </ul>
            </div>
            <?php } ?>
        </div>   
      </div>
      <div class="col-md-9 tab-pane fade" id="grammar" role="tabpanel" aria-labelledby="grammar-tab">
        <div class="row justify-content-between">
          <?php 
            // Select vocabulary data
            $sql = "SELECT * FROM groupf_study_grammar";
            $result = mysqli_query( $conn , $sql );
            $grammar = mysqli_fetch_all($result,MYSQLI_ASSOC);
            foreach($grammar as $key => $grammars){
          ?>
            <div class="card mb-3">
                <div class="card-body">
                    <h3 class="text-danger mr-5"><?php echo $grammars['grammar'] ?> => <?php echo $grammars['translate'] ?></h3>
                    <p><?php echo $grammars['description'] ?></p>
                    <hr>
                </div>
            </div>
          <?php } ?>
        </div>
      </div>
      <div class="col-md-9 tab-pane fade" id="kanji" role="tabpanel" aria-labelledby="kanji-tab">
        <div class="row justify-content-between">
          <?php
            // Select vocabulary data
            $sql = "SELECT * FROM groupf_study_kanji";
            $result = mysqli_query( $conn , $sql );
            $kanji = mysqli_fetch_all($result,MYSQLI_ASSOC);
            foreach($kanji as $key => $kanjis){
          ?>
          <div class="card mb-4">
            <div class="card-body p-4">
              <div class="card-title d-flex justify-content-between align-items-center">
                <h3 class="text-danger"><?php echo $kanjis['kanji'] ?></h3>
                <p class="card-text"><?php echo $kanjis['han_viet'] ?></p>
                <div class="vertical"></div>
                <div class="onKun">
                  <p class="card-text">
                  <?php echo $lang['kun'] ?>: <?php echo $kanjis['am_kun'] ?>
                  </p>
                  <p class="card-text">
                  <?php echo $lang['on'] ?>: <?php echo $kanjis['am_on'] ?>
                  </p>
                </div>
              </div>
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <td><?php echo $kanjis['ex1_kanji'] ?></td>
                    <td><?php echo $kanjis['ex1_hiragana'] ?></td>
                    <td><?php echo $kanjis['ex1_translate'] ?></td>
                  </tr>
                  <tr>
                    <td><?php echo $kanjis['ex2_kanji'] ?></td>
                    <td><?php echo $kanjis['ex2_hiragana'] ?></td>
                    <td><?php echo $kanjis['ex2_translate'] ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
            <?php } ?>
        </div>
      </div>
      <!-- Banner Data -->
      <?php include_once('banner.html') ?>
  </div>
</div>
