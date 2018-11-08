<?

session_start();

class Controller 
{
	public function model($model)
	{
		require_once 'app/models/' . $model . '.php';
		return new $model();
	}

	public function view($view, $data = [])
	{
		require 'app/views/' . $view . '.php';
	}

	public function header()
	{
		$this->view('header',
			['login_type' => $_SESSION['login_type'],
			 'acc_toggle' => $_SESSION['acc_toggle']]);
	}

	public function checkIsLoggedIn()
	{
		if(!isset($_SESSION['login_id']))
			header("Location:/login");
	}
}

?>