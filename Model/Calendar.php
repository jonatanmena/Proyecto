<?php
    namespace Model;

    use Model\Event as Event;
    use Model\Place_Event as Place_Event;
    use Model\Square_Event as Square_Event;
    use Model\Artist as Artist;

    class Calendar
    {
        private $date;
        private $ID;
        private $Artist;
        private $Square_Event;
        private $Event;
        private $Place_Event;

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
            $this->Artist = $Artist;

            return $this;
        }

        public function getArtist()
        {
            return $this->Artist;
        }

        public function setSquareEvent(Square_Event $Square_Event)
        {
            $this->Square_Event = $Square_Event;

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
    }
