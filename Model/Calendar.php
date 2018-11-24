<?php
    namespace Model;

    use Model\Event as Event;
    use Model\Place_Event as Place_Event;
    use Model\Square_Event as Square_Event;
    use Model\Artist as Artist;

    class Calendar
    {
        private $date;
        private $Event;
        private $Place_Event;
        private $Artists = array();
        private $Square_Event = array();
        private $ID;
        private $Status;

        public function __construct($date, $Event, $Place_Event,$Status = NULL)
        {
            $this->date = $date;
            $this->Event = $Event;
            $this->Place_Event = $Place_Event;
            if(NULL === $Status){
              $Status = "Activo";
            }
            $this->Status = $Status;
        }

        public function setDate($date)
        {
            $this->date = $date;

            return $this;
        }

        public function getDate()
        {
            return $this->date;
        }

        public function setID($ID)
        {
            $this->ID = $ID;

            return $this;
        }
        public function getID()
        {
            return $this->ID;
        }


        public function setArtist(Artist $Artist)
        {

            array_push($this->Artists,$Artist);

            return $this;
        }

        public function getArtist()
        {
            return $this->Artists;
        }

        public function setSquareEvent(Square_Event $Square_Event)
        {
            array_push($this->Square_Event,$Square_Event);

            return $this;
        }

        public function getSquareEvent()
        {
            return $this->Square_Event;
        }

        public function setEvent(Event $Event)
        {
            $this->Event = $Event;

            return $this;
        }

        public function getEvent()
        {
            return $this->Event;
        }

        public function setPlaceEvent(Place_Event $Place_Event)
        {
            $this->Place_Event = $Place_Event;

            return $this;
        }

        public function getPlaceEvent()
        {
            return $this->Place_Event;
        }

        public function getArtists()
        {
            return $this->Artists;
        }

        public function setArtists($Artists)
        {
            $this->Artists = $Artists;

            return $this;
        }

        public function getStatus()
        {
            return $this->Status;
        }

        public function setStatus($Status)
        {
            $this->Status = $Status;

            return $this;
        }

}
