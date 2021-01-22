<?php
    require_once('database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter data from mySQL with PHP, AJAX</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
    <h1 style="text-align:center">Test</h1>
        <div class="row">
            <div class="col-md-3">
                <h4>Brand</h4>
                <div class="list-group">
                    <?php
                        $brand = DB::getBrand();
                        foreach($brand as $key => $value){
                    ?>
                    <div class="list-group-item">
                        <input type="checkbox" name="" id="" class="common_selector brand" value="<?php echo $value['product_brand']?>"> <?php echo $value['product_brand']?>
                    </div>
                    <?php
                    }
                    ?>
                </div>

                <h4>Ram</h4>
                <div class="list-group">
                    <?php
                        $ram = DB::getRam();
                        foreach($ram as $key => $value){
                    ?>
                    <div class="list-group-item">
                        <input type="checkbox" name="" id="" class="common_selector ram" value="<?php echo $value['product_ram']?>"> <?php echo $value['product_ram']?> GB
                    </div>
                    <?php
                    }
                    ?>
                </div>

                <h4>Storage</h4>
                <div class="list-group">
                    <?php
                        $storage = DB::getStorage();
                        foreach($storage as $key => $value){
                    ?>
                    <div class="list-group-item">
                        <input type="checkbox" name="" id="" class="common_selector storage" value="<?php echo $value['product_storage']?>"> <?php echo $value['product_storage']?> GB
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-9">
                <h4 style="text-align:center">Ket Qua</h4>
                <div class="row filter_data"></div>
            </div>
        </div>
    </div>


<script>
    $(document).ready(function(){
        filter_data();

        function filter_data(){
            var action = 'get_data'
            var brand = getFilter('.brand');
            var ram = getFilter('.ram');
            var storage = getFilter('.storage');

            $.ajax({
                url: 'get_data.php',
                method: 'POST',
                data: {
                    action: action,
                    brand:brand,
                    ram:ram,
                    storage:storage
                    },
                success: function(data){
                    $('.filter_data').html(data);
                }
            })
        }

        function getFilter(class_name){
            var filter = [];
            $(class_name+':checked').each(function(){
                filter.push($(this).val());
            });
            return filter;
        }
        $('.common_selector').click(function(){
            filter_data();
        });

    })
</script>
</body>
</html>