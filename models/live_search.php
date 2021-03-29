<?php //An

class live_search{


  	public static function multiple_word_match_b_post($connection,$qry)
	{
		  	$query = "SELECT * FROM `boarding_post` WHERE   CURRENT_TIMESTAMP BETWEEN create_time and create_time +INTERVAL boarding_post.lifespan DAY AND MATCH(`category`, `girlsBoys`,`image`, `house_num`, `lane`, `city`, `district`, `description`) against('{$qry}');";
			$result = mysqli_query($connection, $query);
				return $result;
  	}


	public static function single_word_find_b_post($connection,$qry)
	{
			$search = mysqli_real_escape_string($connection,$qry);
			$query = "SELECT * FROM boarding_post 
					WHERE
                    (CURRENT_TIMESTAMP BETWEEN create_time and create_time +INTERVAL boarding_post.lifespan DAY)
                    AND (category LIKE '%".$search."%'
					OR girlsBoys LIKE '%".$search."%' 
					OR person_count LIKE '%".$search."%' 
					OR cost_per_person LIKE '%".$search."%' 
					OR lane LIKE '%".$search."%'
					OR city LIKE '%".$search."%'
					OR district LIKE '%".$search."%'
					OR description LIKE '%".$search."%')";
			$result = mysqli_query($connection, $query);
				return $result;
	}


	public static function all_b_posts($connection)
	{
			$query = "SELECT * FROM boarding_post WHERE  CURRENT_TIMESTAMP BETWEEN create_time AND create_time +INTERVAL boarding_post.lifespan DAY ORDER BY B_post_id";
			$result = mysqli_query($connection, $query);
				return $result;
	}

	public static function all_f_posts($connection)
	{
		$query = "SELECT * FROM food_post ORDER BY F_post_id";
		$result = mysqli_query($connection, $query);
			return $result;
	}



}

  ?>