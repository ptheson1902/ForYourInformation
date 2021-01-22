<?php
    include_once('conn.php');
    include_once('config.php');

    if(isset($_GET['search']) && $_GET['search'] !== ''){
    
        $sql = "(SELECT id, tablename FROM groupf_work WHERE workname REGEXP '".$_GET['search']."'
        OR type REGEXP '".$_GET['search']."'
        OR position REGEXP '".$_GET['search']."'
        OR industry REGEXP '".$_GET['search']."'
        OR office REGEXP '".$_GET['search']."')
        UNION
        (SELECT id, tablename FROM groupf_travel WHERE name REGEXP '".$_GET['search']."'
        OR position REGEXP '".$_GET['search']."'
        OR description REGEXP '".$_GET['search']."')
        UNION
        (SELECT id, tablename FROM groupf_school WHERE name REGEXP '".$_GET['search']."'
        OR position REGEXP '".$_GET['search']."'
        OR type REGEXP '".$_GET['search']."')
        UNION
        (SELECT id, tablename FROM groupf_house WHERE name REGEXP '".$_GET['search']."'
        OR position REGEXP '".$_GET['search']."'
        OR type REGEXP '".$_GET['search']."'
        OR traffic REGEXP '".$_GET['search']."'
        OR construction REGEXP '".$_GET['search']."'
        OR floors REGEXP '".$_GET['search']."'
        OR rent REGEXP '".$_GET['search']."'
        OR precedent REGEXP '".$_GET['search']."'
        OR acreage REGEXP '".$_GET['search']."'
        OR status REGEXP '".$_GET['search']."')";
        $run = mysqli_query($conn, $sql);
        $workData = '';
        $schoolData = '';
        $houseData = '';
        $travelData = '';
        $studyData = '';
        if(mysqli_num_rows($run) == 0){
            echo "<script>alert('No Data')</script>";
        }else
        if(mysqli_num_rows($run) > 0){
            $data = mysqli_fetch_all($run,MYSQLI_ASSOC);
            foreach($data as $key => $datas){
                if( $datas['tablename']=='work'){
                    $sql = "SELECT * FROM groupf_work WHERE id= '".$datas['id']."'";
                    $run = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($run) > 0){
                        $data = mysqli_fetch_all($run,MYSQLI_ASSOC);
                        
                        foreach($data as $key => $datas){
                            if($datas['type']==='work'){
                                $workData .= '
                                <div class="col-md-6">
                                    <div class="card mb-3" style="max-width: 100%; padding: 0;max-height: 200px; border:none;">
                                    <div class="row">
                                        <div class="col-md-7">
                                        <img src="image/'.$datas['image'].'" class="card-img" alt="..." height="180">
                                        </div>
                                        <div class="col-md-5 text-left">
                                        <div class="card-body pt-0">
                                            <h5 class="card-title">'.$datas['workname'].'</h5>
                                            <p class="card-text">'.$lang['salary'].':'.$datas['salary'].'</p>
                                            <p class="card-text">'.$lang['industry'].':'.$datas['industry'].'</p>
                                            <button type="button" class="btn btn-outline-warning dangki" onclick="layid('.$datas['id'].','."'work'".')">'.$lang['entry'].'</button>
                                            <button type="button" class="btn btn-outline-warning">'.$lang['explanatory_meeting'].'</button>
                                            <p class="card-text"><small class="text-muted">'.$lang['updated'].'</small></p>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                ';
                            };

                            if($datas['type']==='partime'){
                                $workData .='
                                <div class="col-md-6">
                                    <div class="card mb-3" style="max-width: 100%; padding: 0;max-height: 200px; border:none;">
                                        <div class="row">
                                        <div class="col-md-7">
                                            <img src="image/'.$datas['image'].'" class="card-img" alt="..." height="180">
                                        </div>
                                        <div class="col-md-5 text-left">
                                            <div class="card-body pt-0">
                                            <h5 class="card-title">'.$datas['workname'].'</h5>
                                            <p class="card-text">'.$lang['hourly_wage'].':'.$datas['salary'].'</p>
                                            <p class="card-text">'.$lang['position'].':'.$datas['position'].'</p>
                                            <button type="button" class="btn btn-outline-warning dangki" onclick="layid('.$datas['id'].','."'work'".')">'.$lang['apply'].'</button>
                                            <button type="button" class="btn btn-outline-warning">'.$lang['details'].'</button>
                                            <p class="card-text"><small class="text-muted">'.$lang['updated'].'</small></p>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                ';
                            };

                            if($datas['type'] === 'tokutei'){
                                $workData .= '
                                <div class="col-md-6">
                                    <div class="card mb-3" style="max-width: 100%; padding: 0;max-height: 200px; border:none;">
                                    <div class="row">
                                        <div class="col-md-7">
                                        <img src="image/'.$datas['image'].'" class="card-img" alt="..." height="180">
                                        </div>
                                        <div class="col-md-5 text-left">
                                        <div class="card-body pt-0">
                                            <h5 class="card-title">'.$lang['company_name'].':'.$datas['workname'].'</h5>
                                            <p class="card-text">'.$lang['office'].':'.$datas['office'].'</p>
                                            <p class="card-text">'.$lang['industry'].':'.$datas['industry'].'</p>
                                            <button type="button" class="btn btn-outline-warning dangki" onclick="layid('.$datas['id'].','."'work'".')">'.$lang['entry'].'</button>
                                            <button type="button" class="btn btn-outline-warning">'.$lang['explanatory_meeting'].'</button>
                                            <p class="card-text"><small class="text-muted">'.$lang['updated'].'</small></p>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                ';
                            };
                        };
                    };
                };

                if( $datas['tablename']=='school'){
                    $sql = "SELECT * FROM groupf_school WHERE id= '".$datas['id']."'";
                    $run = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($run) > 0){
                        $data = mysqli_fetch_all($run,MYSQLI_ASSOC);
                        
                        foreach($data as $key => $datas){
                            $schoolData .= '
                            <div class="col-md-6">
                                <div class="card mb-3" style="max-width: 100%; padding: 0;max-height: 200px; border:none;">
                                <div class="row">
                                    <div class="col-md-7">
                                    <img src="image/'.$datas['image'].'" class="card-img" alt="..." height="180">
                                    </div>
                                    <div class="col-md-5 text-left">
                                    <div class="card-body pt-0">
                                        <h6 class="card-title">'.$lang['school_name'].': '.$datas['name'].'</h6>
                                        <p class="card-text">'.$lang['address'].': '.$datas['position'].'</p>
                                        <p class="card-text">'.$lang['tel'].': '.$datas['tel'].'</p>
                                        <button type="button" class="btn btn-outline-warning dangki" onclick="layid('.$datas['id'].','."'school'".')">'.$lang['document'].'</button>
                                        <button type="button" class="btn btn-outline-warning">'.$lang['details'].'</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            ';
                        }
                    };
                };

                if( $datas['tablename']=='house'){
                    $sql = "SELECT * FROM groupf_house WHERE id= '".$datas['id']."'";
                    $run = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($run) > 0){
                        $data = mysqli_fetch_all($run,MYSQLI_ASSOC);
                        
                        foreach($data as $key => $datas){
                            $houseData .= '
                                <div class="row mb-5" style="box-shadow:0 5px 13px rgba(0,0,0,0.16);padding:10px;">
                                    <div class="col-md-4" style="display:flex;justify-content:center;align-item:center;">
                                    <img src="image/'.$datas['image'].'" class="img-fluid" alt="..." height="180">
                                    </div>
                                    <div class="col-md-8 text-left">
                                    <h6>'.$datas['name'].'</h6>
                                    <table class="table" style="font-size:12px;">
                                        <thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row" class="col-md-2">'.$lang['address'].'</th>
                                            <td>'.$datas['position'].'</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">'.$lang['traffic'].'</th>
                                            <td>'.$datas['traffic'].'</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">'.$lang['construction'].'</th>
                                            <td>'.$datas['construction'].'</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                            <span class="col-md-3">'.$datas['floors'].''.$lang['floor'].'</span>
                                            <span class="col-md-3">'.$datas['rent'].''.$lang['yen'].' ('.$datas['precedent'].')</span>
                                            <span class="col-md-3">'.$datas['type'].' / '.$datas['acreage'].'.00㎡</span>
                                            <span class="col-md-3">'.$datas['status'].'</span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-primary" style="font-size:10px;width:80px;margin-top:-10px;" onclick="layid('.$datas['id'].','."'house'".')">'.$lang['details'].'</button>
                                    </div>
                                </div>
                                <hr>
                            ';
                        }
                    };
                };

                if( $datas['tablename']=='travel'){
                    $sql = "SELECT * FROM groupf_travel WHERE id= '".$datas['id']."'";
                    $run = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($run) > 0){
                        $data = mysqli_fetch_all($run,MYSQLI_ASSOC);
                        
                        foreach($data as $key => $datas){
                            $travelData .= '
                                <div class="row mb-5" style="box-shadow:0 5px 13px rgba(0,0,0,0.16);padding:10px;">
                                    <div class="col-md-4">
                                        <img src="image/'.$datas['image'].'" class="card-img" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body text-left">
                                        <h5 class="card-title">'.$datas['name'].'</h5>
                                        <p class="card-text">'.$lang['address'].': '.$datas['position'].'</p>
                                        <p class="card-text">'.$datas['description'].'。。。</p>
                                        <p class="card-text"><small class="text-muted">'.$lang['updated'].'</small></p>
                                        <button type="button" class="btn btn-primary" style="font-size:10px;width:80px;margin-top:-10px;" onclick="layid('.$datas['id'].','."'travel'".')">'.$lang['details'].'</button>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            ';
                        }
                    };
                };
            };
        };
    }
?>
<?php if(isset($workData) && $workData !== ''){ ?>
<div class="card-body p-5">
    <div class="tab-content row" id="myTabContent" style="justify-content: space-around;">
        <div class="col-md-9 tab-pane fade show active" id="partimes" role="tabpanel" aria-labelledby="partimes-tab">
            <div class="row">
                <?php echo $workData ?>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<?php if(isset($schoolData) && $schoolData !== ''){ ?>
<div class="card-body p-5">
    <div class="tab-content row" id="myTabContent" style="justify-content: space-around;">
        <div class="col-md-9 tab-pane fade show active" id="japanese-school" role="tabpanel" aria-labelledby="japanese-school-tab">
            <div class="row">
                <?php echo $schoolData ?>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<?php if(isset($travelData) && $travelData !== ''){ ?>
<div class="card-body" style="padding: 2% 10%">
    <div class="tab-content row" id="myTabContent" style="justify-content: space-around;">
        <div class="col-md-9">
            <?php echo $travelData ?>
        </div>
    </div>
</div>
<?php } ?>
<?php if(isset($houseData) && $houseData !== ''){ ?>
<div class="card-body" style="padding: 2% 10%">
    <div class="tab-content row" id="myTabContent" style="justify-content: space-around;">
        <div class="col-md-9">
            <?php echo $houseData ?>
        </div>
    </div>
</div>
<?php } ?>