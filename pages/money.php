<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    /*$check_money = mysqli_query($connect, "SELECT sum(Score) as `Score` FROM `Operation` ".$money_condition);
    $money = $_POST['money'];
    $team = $_POST['team'];
    $teams = $_SESSION['user']['id'];
    $money_condition = "WHERE `Team` = ".$TeamsId;
    $getdate = mysqli_query($connect, "SELECT GETDATE();");
    $sending = mysqli_query($connect, "INSERT INTO `Operation` (`Period`, `Comment`, `Score`, `Team`) VALUES ($getdate,'Перевод денег',$check_money,$team) ".$money_condition);
    $losing = mysqli_query($connect, "INSERT INTO `Operation` (`Period`, `Comment`, `Score`, `Team`) VALUES ($getdate,'Перевод денег',$check_money*-1,$teams) ".$money_condition);
   
    if ($check_money >= $money){
        query($sending);
        query($losing);
    }
    elseif($check_money < 0){
        $check_money = $check_money*-1;
        query($sending);
        query($losing);
    }
    else {
        $check_money = $money;
        query($sending);
        query($losing);
    }*/

?>
<div>
    <button class="btn btn-primary" type="submit">Отправить деньги</button>
</div>