<?php
	
	class Database
	{
		public $host = "localhost";
		public $user = "root";
		public $database = "airline_reservation";
		public $password = "";

		public function airport()
		{
			return "airport";
		}
		public function customer()
		{
			return "customer";
		}
		public function flight()
		{
			return "flight";
		}
		public function reservation()
		{
			return "reservation";
		}
		public function schedule()
		{
			return "schedule";
		}
		public function waiting()
		{
			return "waiting";
		}

	}


?>