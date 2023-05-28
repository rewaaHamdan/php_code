<?php
    include "conn.php";

    // التحقق من وجود معرف السجل المطلوب للحذف
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        // استعلام SQL لحذف السجل من جدول المستخدمين
        $sql = "DELETE FROM `users` WHERE id = $id";

        // تنفيذ استعلام الحذف
        $conn->query($sql);
    }

    // إعادة توجيه المستخدم إلى صفحة العرض بعد الحذف
    header('location: display.php');
    exit;
?>
