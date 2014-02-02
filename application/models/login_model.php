<?

class Login_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	/**
	*
	* Login process for default accounts
	*
	**/

	public function get_login($username)
	{
		//build the query to be checked against
		$query = $this->db->get_where('users_tbl', array('username' => $username));
		return $query->row_array();
	}

	/**
	*
	* Insert user into database
	*
	**/

	public function register_user()
	{

        //create an activation code to be sent by email
        $activation = hash('sha256',$this->input->post('email') . time());

       //hash password
        $hash = hash('sha256', $this->input->post('password'));

        //create the salt leave as function in case want to move all functions out
        $text = md5(uniqid(rand(), true));
            
		//select some of the string to be used as salt
        $salt = substr($text, 0, 3);

        //create a hash from salt and password using sha256 at this point but change to slower method if more security required
        $password = hash('sha256', $salt . $hash);

        $insert = array(
        	'username' => $this->input->post('username'),
        	'first_name' => $this->input->post('first_name'),
        	'last_name' => $this->input->post('last_name'),
        	'email' => $this->input->post('email'),
        	'password' => $password,
        	'salt' => $salt,
        	'activation' => $activation,
        	);

		//insert the data into the database
		$this->db->insert('users_tbl', $insert);
	}
}
?>