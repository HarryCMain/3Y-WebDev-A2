<?php
require_once("db.php");
class MenuCRUD {
    private static $db;
    private $sql, $stmt;
    
    public function __construct() {
        self::$db = db::getInstance();
    }
    
    public function getMenu($MenuLevelAssessment, $style=MYSQL_ASSOC) {
        $sql = "select pagename,url from MenuPage join MenuLevel on MenuPage.pageid = MenuLevel.pageid where minul<=? and maxul>=? order by menuorder,pagename;";
        $this->stmt = self::$db->prepare($sql);
        $this->stmt->bind_param("ii",$MenuLevelAssessment,$MenuLevelAssessment);
        $this->stmt->execute();
        $result = $this->stmt->get_result();
        $resultset=$result->fetch_all($style);
        return $resultset;
    }
}
?>