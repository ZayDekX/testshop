<?php

class ReviewData
{
    public string $Username;

    public string $Text;

    public DateTime $Date;

    public function __construct(string $username, DateTime $date, string $text)
    {
        $this->Username = $username;
        $this->Date = $date;
        $this->Text = $text;
    }
}