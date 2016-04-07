<?php

class Message
{

  private $senderName;
  private $senderEmail;
  private $subject;
  private $body;
  private $recipients = array();


  /**
   * Mutators
   */
  public function addRecipient($recipient)
  {
    $this->recipients[] = $recipient;
    return $this;
  }
  public function setSender($email, $name = NULL)
  {
    $this->senderEmail = $email;
    if(isset($name))
    {
      $this->senderName = $name;
    }
    return $this;
  }
  public function setSubject($subject)
  {
    $this->subject = $subject;
    return $this;
  }
  public function setBody($body)
  {
    $this->body = $body;
    return $this;
  }
  
  /**
   * Protects against header injection
   * 
   * @link http://www.gerd-riesselmann.net/archives/2005/09/sending-spam-through-contact-forms/
   * @param string $value - The field to be cleaned
   * @return string       - The sanitized output
   */
  protected function sanitizeHeader($value)
  {
    //Remove line feeds
    $ret = str_replace("\r", "", $value);
    $ret = str_replace("\n", "", $ret);

    // Remove injected headers
    $find = array("/bcc\:/i", 
                  "/Content\-Type\:/i", 
                  "/Mime\-Type\:/i", 
                  "/cc\:/i", 
                  "/to\:/i");
    $ret = preg_replace($find, 
                        "**bogus header removed**",
                        $ret);

    return $ret;
  }

  /**
   * Sends the message via email
   */
  public function send()
  {
    $senderName  = $this->sanitizeHeader($this->senderName);
    $senderEmail = $this->sanitizeHeader($this->senderEmail);

    $header = "From: $senderName <$senderEmail>";
    $recipients = implode(', ', $this->recipients);
    mail($recipients,$this->subject,$this->body,$header);

    //    $header = "From: $this->senderName $this->senderEmail";
    //    echo "Message sent successfully! <br />",  
    //         "Sent to: $recipients <br />",
    //         "$header <br />",
    //         "Subject: $this->subject <br />",
    //         "Body: $this->body";

  }

}