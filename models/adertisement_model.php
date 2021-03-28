<?php //An

class advertisement_model{

    public static function get_B_post_details_byId($B_post_id,$connection)
    {
        $query="SELECT * FROM boarding_post WHERE B_post_id = $B_post_id ";
        return mysqli_query($connection,$query);
    }


    public static function get_B_post_owner_byId($BOid,$connection)
    {
        $query="SELECT BOid,email,first_name,level,last_name FROM boardings_owner WHERE BOid = $BOid ";
        return mysqli_query($connection,$query);
    }


    public static function get_post_details($B_post_id,$connection)
    {
        $query="SELECT * FROM image WHERE postid = $B_post_id ";
        return mysqli_query($connection,$query);
    }


}
?>