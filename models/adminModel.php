<?php

class adminModel{
    // get all user details separetely
    public static function userDetails($level,$connection){
        $query="SELECT * FROM $level";
        $result=mysqli_query($connection,$query);
        return $result;
    }
    // get all user details count
    public static function userDetailsAll($connection){
        $query="SELECT email,reg_date FROM student
        UNION SELECT email,reg_date FROM boarder
        UNION SELECT email,reg_date FROM boardings_owner
        UNION SELECT email,reg_date FROM food_supplier
        ";
        $result=mysqli_query($connection,$query);
        return $result;
    }

    public static function searchStudent($id,$word,$connection){
    $query="SELECT * FROM student WHERE email LIKE '{$word}' 
            OR   first_name LIKE '{$word}'  
            OR  last_name LIKE '{$word}'
            OR   address LIKE '{$word}'
            OR   NIC  LIKE '{$word}'
            OR   Reg_id LIKE $id";
        $result=mysqli_query($connection,$query);
        return $result;
    }
    public static function searchBoarder($id,$word,$connection){
        $query="SELECT * FROM boarder WHERE email LIKE '{$word}' 
                OR   first_name LIKE '{$word}'
                OR  last_name LIKE '{$word}'
                OR   address LIKE '{$word}'
                OR   NIC  LIKE '{$word}'
                OR   Bid LIKE $id";
            $result=mysqli_query($connection,$query);
            return $result;
        }
        public static function searchFood($id,$word,$connection){
            $query="SELECT * FROM food_supplier WHERE email LIKE '{$word}' 
                    OR   first_name LIKE '{$word}'
                    OR  last_name LIKE '{$word}'
                    OR   address LIKE '{$word}'
                    OR   NIC  LIKE '{$word}'
                    OR   FSid LIKE $id";
                $result=mysqli_query($connection,$query);
                return $result;
            }
            public static function searchBoarding($id,$word,$connection){
                $query="SELECT * FROM boardings_owner WHERE email LIKE '{$word}' 
                        OR   first_name LIKE '{$word}'
                        OR  last_name LIKE '{$word}'
                        OR   address LIKE '{$word}'
                        OR   NIC  LIKE '{$word}'
                        OR   BOid LIKE $id";
                    $result=mysqli_query($connection,$query);
                    return $result;
                }

     // get all food post details
    public static function foodPost($connection)
    {
        $query="SELECT * FROM food_post ";
        $result=mysqli_query($connection,$query);
        return $result;
    }
    // get all food request details
    public static function foodRequest($connection)
    {
        $query="SELECT * FROM food_request ";
        $result=mysqli_query($connection,$query);
        return $result;
    }

    // get boarding request details
    public static function boardingRequest($connection)
    {
        $query="SELECT * FROM request ";
        $result=mysqli_query($connection,$query);
        return $result;
    }

    public static function searchFoodPost($id,$word,$connection)
    {
        $query="SELECT * FROM food_post WHERE ad_title LIKE '{$word}' 
        OR type LIKE '{$word}'
        OR lifespan LIKE $id
        OR post_amount LIKE $id
        ";                
        $result=mysqli_query($connection,$query);
        return $result;
    }

    public static function boardingPost($connection)
    {
        $query="SELECT * FROM boarding_post ";
        $result=mysqli_query($connection,$query);
        return $result;
    }

    // search boarding post
    public static function searchBoardingPost($id,$word,$connection)
    {
        $query="SELECT * FROM boarding_post WHERE location LIKE '{$word}'
        OR girlsBoys LIKE '{$word}'
        OR category LIKE '{$word}'
        OR city LIKE '{$word}'
        OR district LIKE '{$word}'
        OR keymoney LIKE $id
        OR post_amount LIKE $id
        OR cost_per_person LIKE $id
         ";
                        
        $result=mysqli_query($connection,$query);
        return $result;
    }
    
    // block user profile
    public static function blockUser($level,$email,$connection)
    {
    $query="UPDATE $level SET user_accepted=2 WHERE email='{$email}'";
        $result=mysqli_query($connection,$query);
        return $result;
    }

    // unblock user
    public static function unblockUser($level,$email,$connection)
    {
    $query="UPDATE $level SET user_accepted=1 WHERE email='{$email}'";
        $result=mysqli_query($connection,$query);
        return $result;
    }

    public static function BpostCount($connection)
    {
        $query="SELECT * FROM boarding_post";
        $result=mysqli_query($connection,$query);
        return $result;
    }
    
    public static function FpostCount($connection)
    {
        $query="SELECT * FROM food_post";
        $result=mysqli_query($connection,$query);
        return $result;
    }
}


?>