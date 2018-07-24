<?


class Feedback extends Model
{
    public function InsertFeedback($messages,$datecreate,$id_user)
    {
        $sql = "INSERT INTO feedback(messages,datecreate,id_user)
               VALUES ('$messages','$datecreate','$id_user');";

        $result = Database::connect($sql);
        return $result;
    }

    public function GetListFeedbacks()
    {
        $sql = "SELECT datecreate, firstname, lastname, messages
        FROM user INNER JOIN feedback ON user.id=feedback.id_user";
        $result = Database::connect($sql);
        $data = [];

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data;
    }
}