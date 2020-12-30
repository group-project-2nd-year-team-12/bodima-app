<?php 

class orderModel{

    public static function food_request($Fpid,$email,$address,$first_name,$last_name,$product_name,$quantity,$order_id,$order_type,$term,$total,$phone,$method,$time,$expireTime,$name,$connection)
    {
        $query="INSERT INTO food_request (F_post_id,email,address,first_name,last_name,is_accepted,product_name,quantity,total,phone,method,time,expireTime,restaurant,order_id,order_type,term) 
        VALUES('{$Fpid}','{$email}','{$address}','{$first_name}','{$last_name}',0,'{$product_name}','{$quantity}','{$total}','{$phone}','{$method}','{$time}','{$expireTime}','{$name}','{$order_id}','{$order_type}','{$term}') LIMIT 1";
         $result=mysqli_query($connection,$query);
    }
    public static function accept($order_id,$is_accepted,$connection)
    {
       $query="UPDATE food_request SET is_accepted=$is_accepted WHERE order_id=$order_id ";
       $result_set=mysqli_query($connection,$query);
       return $result_set;
    }
    public static function remove($order_id,$connection)
    {
       $query="UPDATE food_request SET is_accepted=5 WHERE order_id=$order_id ";
       $result_set=mysqli_query($connection,$query);
       return $result_set;
    }

    public static function requestOrderDelete($connection,$order_id){
        $query="Update food_request SET is_accepted=2 WHERE order_id='{$order_id}'";
        $result=mysqli_query($connection,$query);
        return $result;
    }
   
    public static function paymentOrder($connection,$order_id){
        $query="Update food_request SET is_accepted=3 WHERE order_id='{$order_id}'";
        $result=mysqli_query($connection,$query);
        return $result;
    }
    public static function requestOrderConfirm($connection,$time,$order_id){
        $query="Update food_request SET is_accepted=4, deliveredTime='{$time}' WHERE order_id='{$order_id}'";
        $result=mysqli_query($connection,$query);
        return $result;
    }
    public static function getPostFoodSupplier($connection,$FSid){
        $query="SELECT F_post_id FROM food_post WHERE FSid=$FSid ";
        $result=mysqli_query($connection,$query);
        return $result;
    }
    public static function getOrderIDFoodSupplier($connection,$F_post_id,$is_accepted){
        $query="SELECT DISTINCT order_id,order_type FROM food_request WHERE F_post_id=$F_post_id AND is_accepted=$is_accepted ORDER BY order_id DESC";
        $result=mysqli_query($connection,$query);
        return $result;
    }

    public static function getOrderFoodSupplier($connection,$order_id,$is_accepted){
        $query="SELECT * FROM food_request WHERE order_id=$order_id AND is_accepted=$is_accepted ORDER BY order_id DESC";
        $result=mysqli_query($connection,$query);
        return $result;
    }
   
    public static function unavailableDate($FSid,$date,$connection)
    {
    $query="INSERT INTO available_order(FSid,unavailable_date) 
    VALUE($FSid,'{$date}')";
    $result=mysqli_query($connection,$query);
        return $result;
    }

    public static function getUnavailableDate($FSid,$connection)
    {
        $query="SELECT unavailable_date FROM available_order WHERE FSid=$FSid";
        $result=mysqli_query($connection,$query);
        return $result;
    }

    public static function checkUnavailableDate($date,$connection)
    {
        $query="SELECT * FROM available_order WHERE unavailable_date='{$date}'";
        $result=mysqli_query($connection,$query);
        return $result;
    }
    public static function deleteUnavailableDate($date,$connection)
    {
        $query="DELETE FROM available_order WHERE unavailable_date='{$date}'";
        $result=mysqli_query($connection,$query);
        return $result;
    }
    public static function checkAvailable($fsid,$connection){
        $query="SELECT available FROM food_supplier WHERE FSid=$fsid";
        $result=mysqli_query($connection,$query);
        return $result;
    }
    public static function available($fsid,$state,$connection)
    {
        $query="UPDATE food_supplier SET  available=$state  WHERE FSid=$fsid";
        $result=mysqli_query($connection,$query);
        return $result;
    }
    public static function deleteRequest($id,$connection)
    {
        $query="DELETE FROM food_request WHERE request_id='{$id}'";
        $result=mysqli_query($connection,$query);
        return $result;
    }

    public static function getCountDown($connection,$order_id){
        $query="SELECT * FROM food_request WHERE order_id=$order_id LIMIT 1";
        $result=mysqli_query($connection,$query);
        return $result;
    }
    public static function OrderCount($connection,$email,$state){
        $query="SELECT DISTINCT order_id,order_type FROM food_request WHERE email='{$email}' AND is_accepted=$state";
        $result=mysqli_query($connection,$query);
        return $result;
    }
    public static function addLongTerm($connection,$day,$order_id){
        $query="INSERT INTO longterm(day,order_id) VALUES ('{$day}','{$order_id}')";
        $result=mysqli_query($connection,$query);
        return $result;
    }
    public static function getLongTerm($connection,$email){
        $query="SELECT * FROM food_request RIGHT JOIN longterm ON longterm.order_id=1609334827 AND food_request.email='{$email}' LIMIT 'SELECT COUNT(ltID) FROM longterm WHERE order_id=1609334827)'";
        $result=mysqli_query($connection,$query);
        return $result;
    }
}