<?php 
    require_once('header.php');

    

    // Errors

    // check get input
    $errorID = $_GET['error'];
    $errorID = check_post($errorID);
    $errorID = filter_var($errorID, FILTER_SANITIZE_NUMBER_INT);

    $errorMessages = [
        'The item name is required!',
        'The item is already exists!',
        'Error: add new item faild!',
        'Error: select item faild!',
        'Error: unselect item faild!'
    ];




    // POST

    if($_SERVER['REQUEST_METHOD'] === 'POST'){


        // Add new item

        if(isset($_POST['addNewItemSubmit'])){

            // check form input
            $newItem = $_POST['itemName'];
            $newItem = check_post($newItem);
            $newItem = filter_var($newItem, FILTER_SANITIZE_STRING);

            // if item name is empty
            if(empty($newItem)){
                header("Location:" . htmlspecialchars($_SERVER['PHP_SELF']) . "?error=0");
                exit;
            }

            // if item name already exists
            $sql = "SELECT `item` FROM `items` where `item` LIKE ?";
            $stmt = mysqli_stmt_init($link);
            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_bind_param($stmt, "s", $newItem);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);
            
            if($result->num_rows <> 0){
                header("Location:" . htmlspecialchars($_SERVER['PHP_SELF']) . "?error=1");
                exit;
            }

            // insert new item
            $sql = "INSERT INTO `items`(`item`, `last_update`, `time`) VALUES (?, ?, ?)";
            $stmt = mysqli_stmt_init($link);
            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_bind_param($stmt, "sii", $newItem, $time, $time);
            mysqli_stmt_execute($stmt);

            // check if insert done
            if($stmt->affected_rows <> 1){
                header("Location:" . htmlspecialchars($_SERVER['PHP_SELF']) . "?error=2");
                exit;
            }
            mysqli_stmt_close($stmt);
        }



        // select item

        if(isset($_POST['unselectedItems'])){
            // check get input
            $itemID = $_POST['unselectedItems'];
            $itemID = check_post($itemID);
            $itemID = filter_var($itemID, FILTER_SANITIZE_NUMBER_INT);

            // update items
            $sql = "UPDATE `items` SET `selected` = 1 WHERE id = ? ";
            $stmt = mysqli_stmt_init($link);
            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_bind_param($stmt, "i", $itemID);
            mysqli_stmt_execute($stmt);

            // check if update done
            if($stmt->affected_rows <> 1){
                header("Location:" . htmlspecialchars($_SERVER['PHP_SELF']) . "?error=3");
                exit;
            }
            mysqli_stmt_close($stmt);
        }



        // unselect item

        if(isset($_POST['selectedItems'])){
            // check get input
            $itemID = $_POST['selectedItems'];
            $itemID = check_post($itemID);
            $itemID = filter_var($itemID, FILTER_SANITIZE_NUMBER_INT);

            // update items
            $sql = "UPDATE `items` SET `selected` = 0 WHERE id = ? ";
            $stmt = mysqli_stmt_init($link);
            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_bind_param($stmt, "i", $itemID);
            mysqli_stmt_execute($stmt);

            // check if update done
            if($stmt->affected_rows <> 1){
                header("Location:" . htmlspecialchars($_SERVER['PHP_SELF']) . "?error=4");
                exit;
            }
            mysqli_stmt_close($stmt);
        }
    }
?>

    <!-- display errors -->
    <?php 
    if($errorMessages[$errorID] != ''){
    ?>
        <section id="errors">
            <div class="alert alert-danger" role="alert">
                <?=$errorMessages[$errorID]?>
            </div>
        </section>
    <?php
    }
    ?>

    <section id="items">

        <!-- section title -->
        <h1>Item Management Page</h1>


        <!-- add new items -->
        <form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" class="add-item" id="addNewItemForm" onsubmit="return validateAddNewItem()">
            <div class="form-row">
                <div class="col-lg-10 col-md-10 col-sm-12">
                    <input type="text" name="itemName" class="form-control" placeholder="Item Name">
                    <p id="helpBlockItemName" class="text-danger"></p>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-12">
                    <button type="submit" name="addNewItemSubmit" class="btn btn-primary mb-4">Add</button>
                </div>
            </div>
        </form>


        <!-- select items -->
        <h2>Select Items:</h2>
        <div class="row align-items-center">

            <!-- left list -->
            <div id="itemsLeftList" class="col">
                <h3>Items List:</h3>
                <div class="list-box">
                    <form action= "<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" id="leftForm">
                        <div class="form-group">
                            <!-- <label for="exampleFormControlSelect2">Example multiple select</label> -->
                            <div class="radio-box">
                                <?php 
                                $sql = "SELECT `id`,`item` FROM `items` WHERE `selected` = 0 ORDER BY `item`";
                                $items_q = mysqli_query($link, $sql);
                                while($items_r = mysqli_fetch_array($items_q, MYSQLI_ASSOC)){
                                    $id = $items_r['id'];
                                    $item = $items_r['item'];
                                ?>
                                <input type="radio" id="leftItem_<?=$id?>" name="unselectedItems" value="<?=$id?>" onclick="leftRadioClicked()">
                                <label for="leftItem_<?=$id?>"><?=$item?></label>
                                <?php 
                                }
                                ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Left & Right Buttons -->
            <div id="itemsMoveButtons" class="col-lg-1 col-md-1">
                <button type="button" id="rightButton" class="btn btn-outline-primary" onclick="addItem()">
                    <i class="fas fa-chevron-right"></i>
                </button>
                <button type="button" id="leftButton" class="btn btn-outline-primary"  onclick="removeItem()">
                    <i class="fas fa-chevron-left"></i>
                </button>
            </div>

            <!-- right list -->
            <div id="itemsRightList" class="col">
                <h3>Selected Items:</h3>
                <div class="list-box">
                    <form action= "<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" id="rightForm">
                        <div class="form-group">
                            <!-- <label for="exampleFormControlSelect2">Example multiple select</label> -->
                            <div class="radio-box">
                                <?php 
                                $sql = "SELECT `id`,`item` FROM `items` WHERE `selected` = 1 ORDER BY `item`";
                                $items_q = mysqli_query($link, $sql);
                                while($items_r = mysqli_fetch_array($items_q, MYSQLI_ASSOC)){
                                    $id = $items_r['id'];
                                    $item = $items_r['item'];
                                ?>
                                <input type="radio" id="rightItem_<?=$id?>" name="selectedItems" value="<?=$id?>" onclick="rightRadioClicked()">
                                <label for="rightItem_<?=$id?>"><?=$item?></label>
                                <?php 
                                }
                                ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>





<?php 
    require_once('footer.php');
?>
