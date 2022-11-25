<?php
include "../php/db__connection.php";
if(isset($_POST['edit'])) {
    $nft_id = $_GET['id'];
    $nft__name = $_POST['nft__name'];
    $nft__price = $_POST['nft__price'];
    $nft__collection__name = $_POST['nft__collection__name'];
    $nft__img__name = $_POST['nft__img'];
    $nft__img__file = $_FILES['nft__img'];
    $nft__img__location = $_FILES['nft__img']['tmp_name'];
    $nft__img__name = $_FILES['nft__img']['name'];
    $nft__img = 'db_img/' . $nft__img__name;
    $re = mysqli_query($connection, "SELECT ID from nft__collcetion WHERE collection__name = $nft__collection__name");
    $collection_id = mysqli_fetch_column($re);
    $sql = "UPDATE nft SET NFT__name = '$nft__name', price = '$nft__price', Collection__ID = '$collection_id',
    NFT_IMG = '$nft__img' ";
    if (mysqli_query($connection, $sql)) {
        header("Location: ../user/your_nft.php");
        exit();
    }

}

?>
