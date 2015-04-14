<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
	}

	//redirect if needed, otherwise display the user list
	function index()
	{

		if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			//redirect(base_url().'auth/login', 'refresh');
			redirect(base_url().'auth/main', 'refresh');
		}
		elseif($this->ion_auth->in_group('cliente'))
		{

			redirect(base_url().'auth/main');
			return show_error('You are an Cliente.');
		}		
		elseif (!$this->ion_auth->is_admin()) //remove this elseif if you want to enable this for non-admins
		{
			//redirect them to the home page because they must be an administrator to view this
			redirect(base_url().'auth/logout');
			return show_error('You must be an administrator to view this page.');			
		}		
		else
		{
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			//list the users
			$this->data['users'] = $this->ion_auth->users()->result();
			foreach ($this->data['users'] as $k => $user)
			{
				$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}

			$this->_render_page('auth/index', $this->data);
		}
	}

	function main()
	{
		$this->data['user'] = $this->ion_auth->user()->row();
		$this->load->view('principal_view', $this->data);
	}

	function addProd()
	{				
		$producto = $this->input->post('data');				
		$this->cart->insert($producto);
	}

	function compra()
	{
		$this->data['user'] = $this->ion_auth->user()->row();
		$this->load->view('pedido_compra_view', $this->data);
	}

	function addArchivo()
	{		
		$config['upload_path'] = './files_images/';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);		
		if (!$this->upload->do_upload()) 
		{
			$arr;
			foreach ($this->cart->contents() as $items):
				foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value):					
						$arr[$option_name] = $option_value;
				endforeach;
					$arr['archivo'] = "No Disponible";
				$data = array(
								'rowid'   => $items['rowid'],
								'options' => $arr,
							);
				$this->cart->update($data);
			endforeach;
			$this->data['error'] = $this->upload->display_errors();
			$this->data['user'] = $this->ion_auth->user()->row();
			$this->load->view('pedido_compra_view', $this->data);
		}else
		{
			$success = $this->upload->data();
			$arr;
			foreach ($this->cart->contents() as $items):
				foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value):					
						$arr[$option_name] = $option_value;
				endforeach;
					$arr['archivo'] = $success['full_path'];
				$data = array(
								'rowid'   => $items['rowid'],
								'options' => $arr,
							);
				$this->cart->update($data);
			endforeach;
		}

	}

	function envio()
	{

		$this->data['user'] = $this->ion_auth->user()->row();
		$this->load->view('pedido_envio_view', $this->data);
	}

	function addMetEnvio()
	{
		$arr;
		foreach ($this->cart->contents() as $items):
			foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value):
				$arr[$option_name] = $option_value;
			endforeach;
			$arr['envio'] = $this->input->post('envio');
			$data = array(
							'rowid'   => $items['rowid'],
							'options' => $arr,
						);
			$this->cart->update($data);
		endforeach;		
	}

	function addMetPago()
	{
		$arr;
		foreach ($this->cart->contents() as $items):
			foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value):
				$arr[$option_name] = $option_value;
			endforeach;
			$arr['pago'] = $this->input->post('pago');
			$data = array(
							'rowid'   => $items['rowid'],
							'options' => $arr,
						);
			$this->cart->update($data);
		endforeach;		
	}

	function pagar()
	{
		$this->data['envio'] = $this->input->post('envio');		
		$this->data['user'] = $this->ion_auth->user()->row();
		$this->_render_page('pedido_pago_view', $this->data);
	}


	function realizado()
	{		
		$arr = array(); $data = array();
		foreach ($this->cart->contents() as $items):
			$arr['id'] 		= $items['id'];
			$arr['qty'] 	= $items['qty'];
			$arr['price'] 	= $items['price'];
			$arr['name'] 	= $items['name'];
			foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value):
				$arr[$option_name] = $option_value;
			endforeach;
			array_push($data, $arr);
		endforeach;	
		$this->data['user'] = $this->ion_auth->user()->row();
		$this->data['folio'] = $this->ion_auth->setPedido($this->data['user']->id, $data);
		$this->data['cliente'] = $this->ion_auth->getCliente($this->data['user']->id);
		$this->cart->destroy();
		$this->data['query'] = $this->ion_auth->getPedido($this->data['user']->id, $this->data['folio']);
		$this->load->view('pedido_realizado_view', $this->data);	
	}	

	function verPedidoSelec()
	{		
		$this->data['user'] = $this->ion_auth->user()->row();
		$this->data['folio'] = $this->input->post('folio');
		$this->data['cliente'] = $this->ion_auth->getCliente($this->data['user']->id);
		$this->data['query'] = $this->ion_auth->getPedido($this->data['user']->id, $this->data['folio']);
		$this->load->view('perfPedVer_cli_view', $this->data);	
	}	

	function vaciarCesta()
	{
		$this->cart->destroy();
		$this->load->view('pedido_compra_view');		
	}

	function eliminarItem()
	{		
		$data = array(
						'rowid'   => $this->input->post('data'),
						'qty'     => 0
					);
		$this->cart->update($data);
	}		

	function actCantidad()
	{		
		$data = array(
						'rowid'   => $this->input->post('id'),
						'qty'     => $this->input->post('num')
					);
		$this->cart->update($data);
	}	
	
	function dCuenta()
	{
		$user = $this->ion_auth->user()->row();
		$query = $this->ion_auth->getCliente($user->id);		
		$this->load->view('perfCuenta_cli_view', array('query' => $query, 'user' => $user, 'message' => $this->ion_auth->errors()));			
	}

		function dAcceso()
	{
		$user = $this->ion_auth->user()->row();
		$query = $this->ion_auth->getCliente($user->id);		
		$this->load->view('perfAcceso_cli_view', array('query' => $query, 'user' => $user, 'message' => $this->ion_auth->errors()));			
	}

	function edit_acceso()
	{
		$user = $this->ion_auth->user()->row();
		$query = $this->ion_auth->getCliente($user->id);
		//validate form input
		$this->form_validation->set_rules('username', $this->lang->line('create_user_validation_fusername_label'), 'required');
		$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'));


		if (!empty($_POST) && $this->form_validation->run() === TRUE) 
		{
			//update the password if it was posted
			if ($this->input->post('password'))
			{				
				$data_u = array(
					'username'		=>	$this->input->post('username'),
					'password' 		=>	$this->input->post('password')
				);
				$this->ion_auth->setCuenta($user->id, $data_u, true);
			}else
			{
				$data_u = array(
					'username'		=>	$this->input->post('username')
				);
				$this->ion_auth->setCuenta($user->id, $data_u, false);
			}
			
			redirect(base_url().'auth/dAcceso', 'refresh');
		}
		else
		{					
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			//pass the user to the view
			$this->data['user'] = $user;
			$this->data['query'] = $query;

			$this->data['username'] = array(
				'name'  => 'username',
				'id'    => 'username',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('username', $user->first_name)
			);

			$this->_render_page('perfAcceso_cli_view', $this->data);
		}
	}

	function dPersonal()
	{
		$user = $this->ion_auth->user()->row();
		$query = $this->ion_auth->getCliente($user->id);
		$this->load->view('perfPersonal_cli_view', array('query' => $query, 'user' => $user, 'message' => $this->ion_auth->errors()));			
	}

	function edit_personal()
	{
		$user = $this->ion_auth->user()->row();
		$query = $this->ion_auth->getCliente($user->id);
		//validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'required');
		$this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'required');
		$this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label'), 'required');
		$this->form_validation->set_rules('rfc', $this->lang->line('edit_user_validation_frfc_label'), 'required');
		$this->form_validation->set_rules('direccion', $this->lang->line('edit_user_validation_faddres_label'), 'required');
		$this->form_validation->set_rules('cp', $this->lang->line('edit_user_validation_fcp_label'), 'required');
		$this->form_validation->set_rules('colonia', $this->lang->line('edit_user_validation_fcolonia_label'), 'required');
		$this->form_validation->set_rules('ciudad', $this->lang->line('edit_user_validation_fcity_label'), 'required');
		$this->form_validation->set_rules('estado', $this->lang->line('edit_user_validation_fstate_label'), 'required');


		if (!empty($_POST) && $this->form_validation->run() === TRUE) 
		{
			$aP = strtok($this->input->post('last_name')," ");
			$aM = strtok(" ");
			if ($aM == "") {
				$aM = " ";
			}

			$data_c = array(
				'rfc'		=>	$this->input->post('rfc'),
				'nombre'	=>	$this->input->post('first_name'),
				'aPaterno'	=>	$aP,
				'aMaterno'	=>	$aM,								
			);	

			$calle = strtok($this->input->post('direccion')," ");
			$numero = strtok(" ");
			if ($numero == "" && $calle == '0') {
				$numero = 0;
				$calle = "Desconocido";
			}

			$data_d = array(
				'calle'		=>	$calle,				
				'ciudad'	=>	$this->input->post('ciudad'),
				'numero'	=>	$numero,
				'cp'		=>	$this->input->post('cp'),
				'municipio'	=>	$this->input->post('municipio'),
				'colonia'	=>	$this->input->post('colonia'),
				'estado'	=>	$this->input->post('estado')
			);

			$data_u = array(
				'phone'		=>	$this->input->post('phone'),
			);	

			$this->ion_auth->setPers($user->id, $data_u, $data_c, $data_d);

			redirect(base_url().'auth/dPersonal', 'refresh');
		}
		else
		{					
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			//pass the user to the view
			$this->data['user'] = $user;
			$this->data['query'] = $query;

			$this->data['first_name'] = array(
				'name'  => 'first_name',
				'id'    => 'first_name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('first_name', $user->first_name),
			);
			$this->data['last_name'] = array(
				'name'  => 'last_name',
				'id'    => 'last_name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('last_name', $user->last_name),
			);			
			$this->data['phone'] = array(
				'name'  => 'phone',
				'id'    => 'phone',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('phone', $user->phone),
			);			

			$this->_render_page('perfPersonal_cli_view', $this->data);
		}
	}

	function dPedido()
	{
		$user = $this->ion_auth->user()->row();
		$query = $this->ion_auth->getCliente($user->id);
		$ped = $this->ion_auth->getPedido($user->id);		
		$this->load->view('perfPedido_cli_view', array('query' => $query, 'user' => $user, 'ped' => $ped));
	}

	function guardaPedido()
	{
		$this->ion_auth->setPedido();
	}

	function eliPedido()
	{
		$folio = $this->input->post('data');
		$this->ion_auth->eliPedido($folio);
	}

	function mujer_playera()
	{
		$tipo = "Playera";
		$genero = "mujer";
		$query = $this->ion_auth->getProducto($tipo, $genero);
		$this->_render_page('gal_mujer_playera', array('query' => $query, 'user' => $this->ion_auth->user()->row()));
	}

	function mujer_sudadera()
	{
		$tipo = "Sudadera";
		$genero = "mujer";
		$query = $this->ion_auth->getProducto($tipo, $genero);
		$this->_render_page('gal_mujer_sudadera', array('query' => $query, 'user' => $this->ion_auth->user()->row()));
	}

	function mujer_gorra()
	{
		$tipo = "Gorra";
		$genero = "mujer";
		$query = $this->ion_auth->getProducto($tipo, $genero);
		$this->_render_page('gal_mujer_gorra', array('query' => $query, 'user' => $this->ion_auth->user()->row()));
	}

	function hombre_playera()
	{
		$tipo = "Playera";
		$genero = "hombre";
		$query = $this->ion_auth->getProducto($tipo, $genero);
		$this->_render_page('gal_hombre_playera', array('query' => $query, 'user' => $this->ion_auth->user()->row()));
	}

	function hombre_sudadera()
	{
		$tipo = "Sudadera";
		$genero = "hombre";
		$query = $this->ion_auth->getProducto($tipo, $genero);
		$this->_render_page('gal_hombre_sudadera', array('query' => $query, 'user' => $this->ion_auth->user()->row()));
	}

	function hombre_gorra()
	{
		$tipo = "Gorra";
		$genero = "hombre";
		$query = $this->ion_auth->getProducto($tipo, $genero);
		$this->_render_page('gal_hombre_gorra', array('query' => $query, 'user' => $this->ion_auth->user()->row()));
	}

	function info_guiacompra()
	{
		$this->data['user'] = $this->ion_auth->user()->row();
		$this->load->view('guiacompra_view', $this->data);
	}

	function info_empresa()
	{
		$this->data['user'] = $this->ion_auth->user()->row();
		$this->load->view('empresa_view', $this->data);
	}

	function info_politicas()
	{
		$this->data['user'] = $this->ion_auth->user()->row();
		$this->load->view('politicas_view', $this->data);
	}

	function info_servicios()
	{
		$this->data['user'] = $this->ion_auth->user()->row();
		$this->load->view('servicios_view', $this->data);
	}

	function info_tiendas()
	{
		$this->data['user'] = $this->ion_auth->user()->row();
		$this->load->view('tiendas_view', $this->data);
	}

	function info_contacto()
	{
		$this->data['user'] = $this->ion_auth->user()->row();
		$this->load->view('contacto_view', $this->data);
	}

	//log the user in
	function login()
	{
		$this->data['title'] = "Login";

		//validate form input
		$this->form_validation->set_rules('identity', 'Email/Usuario', 'required');
		$this->form_validation->set_rules('password', 'Contraseña', 'required');

		if ($this->form_validation->run() == true)
		{
			//check to see if the user is logging in
			//check for "remember me"
			$remember = (bool) $this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
			{
				//if the login is successful
				//redirect them back to the home page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect(base_url(), 'refresh');
			}
			else
			{
				//if the login was un-successful
				//redirect them back to the login page
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect(base_url().'auth/login', 'refresh'); //use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
		else
		{
			//the user is not logging in so display the login page
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['identity'] = array('name' => 'identity',
				'id' => 'identity',
				'type' => 'text',
				'value' => $this->form_validation->set_value('identity'),
			);
			$this->data['password'] = array('name' => 'password',
				'id' => 'password',
				'type' => 'password',
			);

			redirect('auth', 'refresh');
		}
	}

	//log the user out
	function logout()
	{
		$this->data['title'] = "Logout";
		$this->cart->destroy();
		//log the user out
		$logout = $this->ion_auth->logout();

		//redirect them to the login page
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect(base_url().'auth/main', 'refresh');
		
		//$this->load->view('principal_view');
	}

	//change password
	function change_password()
	{
		$this->form_validation->set_rules('old', $this->lang->line('change_password_validation_old_password_label'), 'required');
		$this->form_validation->set_rules('new', $this->lang->line('change_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
		$this->form_validation->set_rules('new_confirm', $this->lang->line('change_password_validation_new_password_confirm_label'), 'required');

		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login', 'refresh');
		}

		$user = $this->ion_auth->user()->row();

		if ($this->form_validation->run() == false)
		{
			//display the form
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
			$this->data['old_password'] = array(
				'name' => 'old',
				'id'   => 'old',
				'type' => 'password',
			);
			$this->data['new_password'] = array(
				'name' => 'new',
				'id'   => 'new',
				'type' => 'password',
				'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
			);
			$this->data['new_password_confirm'] = array(
				'name' => 'new_confirm',
				'id'   => 'new_confirm',
				'type' => 'password',
				'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
			);
			$this->data['user_id'] = array(
				'name'  => 'user_id',
				'id'    => 'user_id',
				'type'  => 'hidden',
				'value' => $user->id,
			);

			//render
			$this->_render_page('auth/change_password', $this->data);
		}
		else
		{
			$identity = $this->session->userdata('identity');

			$change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

			if ($change)
			{
				//if the password was successfully changed
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				$this->logout();
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('auth/change_password', 'refresh');
			}
		}
	}

	//forgot password
	function forgot_password()
	{
		//setting validation rules by checking wheather identity is username or email
		if($this->config->item('identity', 'ion_auth') == 'username' )
		{
		   $this->form_validation->set_rules('email', $this->lang->line('forgot_password_username_identity_label'), 'required');
		}
		else
		{
		   $this->form_validation->set_rules('email', $this->lang->line('forgot_password_validation_email_label'), 'required|valid_email');
		}


		if ($this->form_validation->run() == false)
		{
			//setup the input
			$this->data['email'] = array('name' => 'email',
				'id' => 'email',
			);

			if ( $this->config->item('identity', 'ion_auth') == 'username' ){
				$this->data['identity_label'] = $this->lang->line('forgot_password_username_identity_label');
			}
			else
			{
				$this->data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
			}

			//set any errors and display the form
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->_render_page('auth/forgot_password', $this->data);
		}
		else
		{
			// get identity from username or email
			if ( $this->config->item('identity', 'ion_auth') == 'username' )
			{
				$identity = $this->ion_auth->where('username', strtolower($this->input->post('email')))->users()->row();
			}
			else
			{
				$identity = $this->ion_auth->where('email', strtolower($this->input->post('email')))->users()->row();
			}
	        if(empty($identity)) 
	        {

        		if($this->config->item('identity', 'ion_auth') == 'username')
            	{
                           $this->ion_auth->set_message('forgot_password_username_not_found');
            	}
            	else
            	{
            	   $this->ion_auth->set_message('forgot_password_email_not_found');
            	}

                $this->session->set_flashdata('message', $this->ion_auth->messages());
        		redirect(base_url()."auth/forgot_password", 'refresh');
    		}

			//run the forgotten password method to email an activation code to the user
			$forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

			if ($forgotten)
			{
				//if there were no errors
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect(base_url()."auth/login", 'refresh'); //we should display a confirmation page here instead of the login page
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect("auth/forgot_password", 'refresh');
			}
		}
	}

	//reset password - final step for forgotten password
	public function reset_password($code = NULL)
	{
		if (!$code)
		{
			show_404();
		}

		$user = $this->ion_auth->forgotten_password_check($code);

		if ($user)
		{
			//if the code is valid then display the password reset form

			$this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
			$this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');

			if ($this->form_validation->run() == false)
			{
				//display the form

				//set the flash data error message if there is one
				$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

				$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
				$this->data['new_password'] = array(
					'name' => 'new',
					'id'   => 'new',
				'type' => 'password',
					'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
				);
				$this->data['new_password_confirm'] = array(
					'name' => 'new_confirm',
					'id'   => 'new_confirm',
					'type' => 'password',
					'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
				);
				$this->data['user_id'] = array(
					'name'  => 'user_id',
					'id'    => 'user_id',
					'type'  => 'hidden',
					'value' => $user->id,
				);
				$this->data['csrf'] = $this->_get_csrf_nonce();
				$this->data['code'] = $code;

				//render
				$this->_render_page('auth/reset_password', $this->data);
			}
			else
			{
				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id'))
				{

					//something fishy might be up
					$this->ion_auth->clear_forgotten_password_code($code);

					show_error($this->lang->line('error_csrf'));

				}
				else
				{
					// finally change the password
					$identity = $user->{$this->config->item('identity', 'ion_auth')};

					$change = $this->ion_auth->reset_password($identity, $this->input->post('new'));

					if ($change)
					{
						//if the password was successfully changed
						$this->session->set_flashdata('message', $this->ion_auth->messages());
						redirect("auth/login", 'refresh');
					}
					else
					{
						$this->session->set_flashdata('message', $this->ion_auth->errors());
						redirect('auth/reset_password/' . $code, 'refresh');
					}
				}
			}
		}
		else
		{
			//if the code is invalid then send them back to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("auth/forgot_password", 'refresh');
		}
	}


	//activate the user
	function activate($id, $code=false)
	{
		if ($code !== false)
		{
			$activation = $this->ion_auth->activate($id, $code);
		}
		else if ($this->ion_auth->is_admin())
		{
			$activation = $this->ion_auth->activate($id);
		}

		if ($activation)
		{
			//redirect them to the auth page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("auth", 'refresh');
		}
		else
		{
			//redirect them to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("auth/forgot_password", 'refresh');
		}
	}

	//deactivate the user
	function deactivate($id = NULL)
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			//redirect them to the home page because they must be an administrator to view this
			return show_error('You must be an administrator to view this page.');
		}

		$id = (int) $id;

		$this->load->library('form_validation');
		$this->form_validation->set_rules('confirm', $this->lang->line('deactivate_validation_confirm_label'), 'required');
		$this->form_validation->set_rules('id', $this->lang->line('deactivate_validation_user_id_label'), 'required|alpha_numeric');

		if ($this->form_validation->run() == FALSE)
		{
			// insert csrf check
			$this->data['csrf'] = $this->_get_csrf_nonce();
			$this->data['user'] = $this->ion_auth->user($id)->row();

			$this->_render_page('auth/deactivate_user', $this->data);
		}
		else
		{
			// do we really want to deactivate?
			if ($this->input->post('confirm') == 'yes')
			{
				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
				{
					show_error($this->lang->line('error_csrf'));
				}

				// do we have the right userlevel?
				if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin())
				{
					$this->ion_auth->deactivate($id);
				}
			}

			//redirect them back to the auth page
			redirect('auth', 'refresh');
		}
	}

	//create a new user
	function create_user()
	{
		$this->data['title'] = "Create User";

		/*if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{			
			redirect('auth', 'refresh');
		}*/

		$tables = $this->config->item('tables','ion_auth');
		//validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required');
		$this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'required');
		$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique['.$tables['users'].'.email]');
		$this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'required');
		//$this->form_validation->set_rules('company', $this->lang->line('create_user_validation_company_label'), 'required');
		$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');
		$this->form_validation->set_rules('birthday', $this->lang->line('create_user_validation_birthday_label'), 'required');

		if ($this->form_validation->run() == true)
		{
			$username = strtolower($this->input->post('first_name')) . ' ' . strtolower($this->input->post('last_name'));
			$email    = strtolower($this->input->post('email'));
			$password = $this->input->post('password');

			$additional_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name'  => $this->input->post('last_name'),
				//'company'    => $this->input->post('company'),
				'company'    => "",
				'phone'      => $this->input->post('phone'),
			);

			$aP = strtok($this->input->post('last_name'), " ");
			$aM = strtok(" ");
			if ($aM == 0)
			{
				$aM = " ";
			}

			$client_data	= array(
				'rfc'		=> " ",
				'nombre'	=> $this->input->post('first_name'),
				'aPaterno'	=> $aP,
				'aMaterno'	=> $aM,
				'fecha_nac'	=> $this->input->post('birthday'),
			);
		}

		if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data, $client_data))
		{
			//check to see if we are creating the user
			//redirect them back to the admin page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("auth", 'refresh');
		}
		else
		{
			//display the create user form
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['first_name'] = array(
				'name'  => 'first_name',
				'id'    => 'first_name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('first_name'),
			);
			$this->data['last_name'] = array(
				'name'  => 'last_name',
				'id'    => 'last_name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('last_name'),
			);
			$this->data['email'] = array(
				'name'  => 'email',
				'id'    => 'email',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('email'),
			);
			/*$this->data['company'] = array(
				'name'  => 'company',
				'id'    => 'company',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('company'),
			);*/
			$this->data['phone'] = array(
				'name'  => 'phone',
				'id'    => 'phone',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('phone'),
			);
			$this->data['password'] = array(
				'name'  => 'password',
				'id'    => 'password',
				'type'  => 'password',
				'value' => $this->form_validation->set_value('password'),
			);
			$this->data['password_confirm'] = array(
				'name'  => 'password_confirm',
				'id'    => 'password_confirm',
				'type'  => 'password',
				'value' => $this->form_validation->set_value('password_confirm'),
			);

			$this->_render_page('auth/create_user', $this->data);
		}
	}

	//edit a user
	function edit_user($id)
	{
		$this->data['title'] = "Edit User";

		if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id)))
		{
			redirect('auth', 'refresh');
		}

		$user = $this->ion_auth->user($id)->row();
		$groups=$this->ion_auth->groups()->result_array();
		$currentGroups = $this->ion_auth->get_users_groups($id)->result();

		//validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'required');
		$this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'required');
		$this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label'), 'required');
		$this->form_validation->set_rules('company', $this->lang->line('edit_user_validation_company_label'), 'required');

		if (isset($_POST) && !empty($_POST))
		{
			// do we have a valid request?
			if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
			{
				show_error($this->lang->line('error_csrf'));
			}

			//update the password if it was posted
			if ($this->input->post('password'))
			{
				$this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
				$this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');
			}

			if ($this->form_validation->run() === TRUE)
			{
				$data = array(
					'first_name' => $this->input->post('first_name'),
					'last_name'  => $this->input->post('last_name'),
					'company'    => $this->input->post('company'),
					'phone'      => $this->input->post('phone'),
				);

				//update the password if it was posted
				if ($this->input->post('password'))
				{
					$data['password'] = $this->input->post('password');
				}



				// Only allow updating groups if user is admin
				if ($this->ion_auth->is_admin())
				{
					//Update the groups user belongs to
					$groupData = $this->input->post('groups');

					if (isset($groupData) && !empty($groupData)) {

						$this->ion_auth->remove_from_group('', $id);

						foreach ($groupData as $grp) {
							$this->ion_auth->add_to_group($grp, $id);
						}

					}
				}

			//check to see if we are updating the user
			   if($this->ion_auth->update($user->id, $data))
			    {
			    	//redirect them back to the admin page if admin, or to the base url if non admin
				    $this->session->set_flashdata('message', $this->ion_auth->messages() );
				    if ($this->ion_auth->is_admin())
					{
						redirect('auth', 'refresh');
					}
					else
					{
						redirect('/', 'refresh');
					}

			    }
			    else
			    {
			    	//redirect them back to the admin page if admin, or to the base url if non admin
				    $this->session->set_flashdata('message', $this->ion_auth->errors() );
				    if ($this->ion_auth->is_admin())
					{
						redirect('auth', 'refresh');
					}
					else
					{
						redirect('/', 'refresh');
					}

			    }

			}
		}

		//display the edit user form
		$this->data['csrf'] = $this->_get_csrf_nonce();

		//set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		//pass the user to the view
		$this->data['user'] = $user;
		$this->data['groups'] = $groups;
		$this->data['currentGroups'] = $currentGroups;

		$this->data['first_name'] = array(
			'name'  => 'first_name',
			'id'    => 'first_name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('first_name', $user->first_name),
		);
		$this->data['last_name'] = array(
			'name'  => 'last_name',
			'id'    => 'last_name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('last_name', $user->last_name),
		);
		$this->data['company'] = array(
			'name'  => 'company',
			'id'    => 'company',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('company', $user->company),
		);
		$this->data['phone'] = array(
			'name'  => 'phone',
			'id'    => 'phone',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('phone', $user->phone),
		);
		$this->data['password'] = array(
			'name' => 'password',
			'id'   => 'password',
			'type' => 'password'
		);
		$this->data['password_confirm'] = array(
			'name' => 'password_confirm',
			'id'   => 'password_confirm',
			'type' => 'password'
		);

		$this->_render_page('auth/edit_user', $this->data);
	}

	//Delete the user
	function delete_user($id = NULL)
	{		

		if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id)))
		{
			//redirect them to the home page because they must be an administrator to view this
			return show_error('You must be an administrator to view this page.');
		}
				
		$this->load->library('form_validation');
		$this->form_validation->set_rules('confirm', $this->lang->line('delete_validation_confirm_label'), 'required');
		$this->form_validation->set_rules('id', $this->lang->line('delete_validation_user_id_label'), 'required|alpha_numeric');

		if ($this->form_validation->run() == FALSE)
		{
			// insert csrf check
			$this->data['csrf'] = $this->_get_csrf_nonce();
			$this->data['user'] = $this->ion_auth->user($id)->row();

			$this->_render_page('auth/delete_user', $this->data);
		}
		else
		{
			// do we really want to deactivate?
			if ($this->input->post('confirm') == 'yes')
			{
				// do we have a valid request?
				if ($this->_valid_csrf_nonce() == FALSE)
				{
					show_error($this->lang->line('error_csrf'));
				}

				// do we have the right userlevel?
				if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin())
				{									
					$this->ion_auth->delete_user($this->input->post('id'));
				}
			}
			//redirect them back to the auth page
			redirect('auth', 'refresh');
		}
	}	

	

	// create a new group
	function create_group()
	{
		$this->data['title'] = $this->lang->line('create_group_title');

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}

		//validate form input
		$this->form_validation->set_rules('group_name', $this->lang->line('create_group_validation_name_label'), 'required|alpha_dash');

		if ($this->form_validation->run() == TRUE)
		{
			$new_group_id = $this->ion_auth->create_group($this->input->post('group_name'), $this->input->post('description'));
			if($new_group_id)
			{
				// check to see if we are creating the group
				// redirect them back to the admin page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("auth", 'refresh');
			}
		}
		else
		{
			//display the create group form
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['group_name'] = array(
				'name'  => 'group_name',
				'id'    => 'group_name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('group_name'),
			);
			$this->data['description'] = array(
				'name'  => 'description',
				'id'    => 'description',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('description'),
			);

			$this->_render_page('auth/create_group', $this->data);
		}
	}

	//edit a group
	function edit_group($id)
	{
		// bail if no group id given
		if(!$id || empty($id))
		{
			redirect('auth', 'refresh');
		}

		$this->data['title'] = $this->lang->line('edit_group_title');

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}

		$group = $this->ion_auth->group($id)->row();

		//validate form input
		$this->form_validation->set_rules('group_name', $this->lang->line('edit_group_validation_name_label'), 'required|alpha_dash');

		if (isset($_POST) && !empty($_POST))
		{
			if ($this->form_validation->run() === TRUE)
			{
				$group_update = $this->ion_auth->update_group($id, $_POST['group_name'], $_POST['group_description']);

				if($group_update)
				{
					$this->session->set_flashdata('message', $this->lang->line('edit_group_saved'));
				}
				else
				{
					$this->session->set_flashdata('message', $this->ion_auth->errors());
				}
				redirect("auth", 'refresh');
			}
		}

		//set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		//pass the user to the view
		$this->data['group'] = $group;

		$readonly = $this->config->item('admin_group', 'ion_auth') === $group->name ? 'readonly' : '';

		$this->data['group_name'] = array(
			'name'  => 'group_name',
			'id'    => 'group_name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('group_name', $group->name),
			$readonly => $readonly,
		);
		$this->data['group_description'] = array(
			'name'  => 'group_description',
			'id'    => 'group_description',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('group_description', $group->description),
		);

		$this->_render_page('auth/edit_group', $this->data);
	}


	function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key   = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array($key => $value);
	}

	function _valid_csrf_nonce()
	{
		if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE &&
			$this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	function _render_page($view, $data=null, $render=false)
	{

		$this->viewdata = (empty($data)) ? $this->data: $data;

		$view_html = $this->load->view($view, $this->viewdata, $render);

		if (!$render) return $view_html;
	}	
}
