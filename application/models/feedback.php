<?

class Feedback extends Model
{
    public function verifyCaptcha()
    {
        if ($_POST["g-recaptcha-response"]) {
            $resp = $this->verifyResponse(
                $_SERVER["REMOTE_ADDR"],
                $_POST["g-recaptcha-response"]
            );
            return $resp;
        }
    }

    
}