<?php

namespace Cofixer\Api;
use WP_REST_Controller;

class Settings_Route extends WP_REST_Controller{

	protected $namespace;
	protected $rest_base;

	public function __construct(){
		$this->namespace = "cofixer/v1";
		$this->rest_base = "settings";
	}

	/**
	 * Register Routers
	 */
	public function register_routes(){
		register_rest_route(
			$this->namespace,
			'/'.$this->rest_base,
			[
				[
					'methods'   => \WP_REST_Server::READABLE,
					'callback'  => [ $this, 'get_item' ],
					'permission_callback' =>[ $this, 'get_item_permissions_check' ],
					'args'      => $this->get_collection_params()
				],
				[
					'methods'   => \WP_REST_Server::CREATABLE,
					'callback'  => [ $this, 'create_item' ],
					'permission_callback' =>[ $this, 'create_items_permission_check' ],
					'args'      => $this->get_endpoint_args_for_item_schema(true),
				]
			]
		);
	}

	/**
	 * Get items response
	 */
	public function get_item($request): \WP_Error|\WP_REST_Response|\WP_HTTP_Response{
		$response = [
			'firstname' => get_option( 'cf_settings_firstname', true ),
			'lastname'  => get_option( 'cf_settings_lastname', true ),
			'email'     => get_option( 'cf_settings_email', true ),
		];

		return rest_ensure_response( $response );
	}

	/**
	 * Get items permission check
	 */
	public function get_item_permissions_check( $request ){
		if ( current_user_can('administrator') ){
			return true;
		}
	}

	/**
	 * Create item response
	 */
	public function create_item($request): \WP_Error|\WP_REST_Response|\WP_HTTP_Response{

		// Data validation
		$firstname  = isset( $$request['firstname'] ) ? sanitize_text_field( $request['firstname'] ): '';
		$lastname   = isset( $$request['lastname'] ) ? sanitize_text_field( $request['lastname'] ): '';
		$email      = isset( $$request['email'] ) && is_email( $request[ 'email' ] ) ? sanitize_text_field( $request['email'] ): '';

		// Save option data into Wordpress
		update_option('cf_settings_firstname', $firstname);
		update_option('cf_settings_lastname', $lastname);
		update_option('cf_settings_email', $email);

		$response  = [
			'firstname' => $firstname,
			'lastname'  => $lastname,
			'email'     => $email,
		];

		return rest_ensure_response( $response );
	}

	/**
	 * Create item permission check
	 */
	public function create_items_permission_check( $request ): bool{
		return true;
	}

	/**
	 * Retrives the query parameters for the items collection
	 */
	public function get_collection_params(): array{
		return [];
	}
}