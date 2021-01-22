<?php
    require_once('database.php');
    if(isset($_POST['action'])){
        $query = "SELECT * FROM product WHERE product_status=1";
        if(isset($_POST['brand'])){
            $filter = implode("','", $_POST['brand']);
            $query .= " AND product_brand IN('$filter')";
        }

        if(isset($_POST['ram'])){
            $filter = implode("','", $_POST['ram']);
            $query .= " AND product_ram IN('$filter')";
        }

        if(isset($_POST['storage'])){
            $filter = implode("','", $_POST['storage']);
            $query .= " AND product_storage IN('$filter')";
        }

        $db = DB::connection();
        $stmt = $db -> prepare($query);
        $stmt -> execute();
        $result = $stmt -> fetchAll();
        $count = $stmt -> rowCount();
        $output = '';

        if($count > 0){
            foreach( $result as $key => $value){
                $output .='
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="card" style="width: 90%;">
                            <img src="image/'.$value['product_image'].'" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">'.$value['product_name'].'</h5>
                                <p class="card-text">
                                    Brand: '.$value['product_brand'].'<br>
                                    RAM: '.$value['product_ram'].'<br>
                                    Storage: '.$value['product_storage'].'<br>
                                </p>
                                <p class="text-danger">'.$value['product_price'].'</p>

                            </div>
                        </div>
                    </div>
                ';
            }
        }else{
            $output = '<h3>null</h3>';
        }

        echo $output;
    }
?>