<?

class Content_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_content($slug = FALSE)
	{
		if ($slug === FALSE)
		{
			$query = $this->db->get('content_tbl');
			return $query->result_array();
		}
		
		$query = $this->db->get_where('content_tbl',array('content_id' => $slug));
		return $query->row_array();
		
	}

    public function set_content()
    {
        $this->load->helper('url');

        $data = array(
            'content_title' => $this->input->post('title'),
            'content_text' => $this->input->post('text')
        );

        return $this->db->insert('content_tbl', $data);
    }
}
?>