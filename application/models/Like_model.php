<?php
class Like_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_weekly_likes_data($userId)
    {
        $likes_table = 'likes';
        $articles_table = 'articles';

        // Prepare the data array
        $data = [
            'submitted_by' => 18 // Replace this with the actual user ID
        ];

        // Fetch the data as usual
        $sql = "SELECT YEARWEEK(" . $likes_table . ".liked_at) AS week_number, COUNT(*) AS total_likes FROM " . $likes_table . "
        JOIN " . $articles_table . " ON " . $likes_table . ".article_id = " . $articles_table . ".articles_id
        WHERE " . $articles_table . ".submitted_by =?
        GROUP BY week_number
        ORDER BY week_number ASC";

        // Prepare the statement
        $query = $this->db->query($sql, [$data['submitted_by']]);

        // Fetch the result
        $result = $query->result_array();

        // Separate week_number and total_likes into two different arrays
        $weekNumbers = array_column($result, 'week_number');
        $totalLikes = array_column($result, 'total_likes');

        return array('week_numbers' => $weekNumbers, 'total_likes' => $totalLikes);
    }

    public function week_number_to_datetime($weekNumber, $year)
    {
        // Calculate the day of the year assuming each week starts on Sunday
        $dayOfYear = ($weekNumber - 1) * 7 + 1;

        // Create a DateTime object for the first day of the provided year
        // Corrected to concatenate year, month, and day without hyphens
        $firstDayOfYear = new DateTime("$year-01-01");

        // Clone the first day of the year to avoid modifying the original DateTime object
        $dateOfWeek = clone $firstDayOfYear;

        // Modify the cloned date to match the calculated day of the year
        $dateOfWeek->modify("+" . ($dayOfYear - 1) . " days");

        // Return the date in 'M d, yy' format
        return $dateOfWeek->format('M d');
    }

    public function get_top_5_articles_by_likes($user_id)
    {
        $query = $this->db->query("
        SELECT 
            a.*,
            COUNT(l.like_id) AS total_likes
        FROM 
            articles a
        LEFT JOIN 
            likes l ON a.articles_id = l.article_id
        WHERE 
            a.submitted_by =?
        GROUP BY 
            a.articles_id, a.title
        ORDER BY 
            total_likes DESC
        LIMIT 5
    ", array($user_id));

        return $query->result_array();
    }






}
?>