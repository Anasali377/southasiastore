<?php

namespace WeDevs\PM\Core\Validator;

use WeDevs\PM\Core\Validator\Validator;
use WP_REST_Request;

abstract class Abstract_Validator implements Validator {
    /**
     * Current WP_REST_Request object to the application.
     *
     * @var WP_REST_Request
     */
    public $request;

    /**
     * Array of errors generated against wrong data input.
     *
     * @var array
     */
    protected $errors = [];

    public function __construct( WP_REST_Request $request = null ) {
        if ( $request ) {
            $this->request = $request;
        }
    }

    /**
     * Perform validation tasks i.e this will check whether all the rules
     * that are applied to a specific data key are satisfied or not.
     *
     * @param WP_REST_Request $request (Current request to the application.)
     *
     * @param string $key (Data key under validation.)
     *
     * @return boolean (If all the rules are satified, this method will
     * return true; otherwise false.)
     */
    public function validate( WP_REST_Request $request, $key ) {
        $this->request = $request;
        $rules         = $this->rules();
        $messages      = $this->messages();

        $validation_fns = $rules[$key];
        $fns            = $this->get_validation_fns( $validation_fns );
        $value          = $this->request->get_param( $key );
        
        foreach ( $fns as $fn ) {
            if ( !$this->call_validation_fn( $value, $fn ) ) {
                $fname = explode( ':', $fn );
                $this->errors[$key][] = $messages[$key . '.' . $fname[0]];
            }
        }

        if ( $this->has_error( $key ) ) {
            return false;
        }

        return true;
    }

    /**
     * Check whether the data passed to the application under a specific
     * key contain error or not if the key is supplied; otherwise it
     * will check for errors under all keys in the request object.
     *
     * @param string $key (Key of data field in the request object.)
     *
     * @return boolean (If data contains error, this will return true;
     * otherwise false.)
     */
    public function has_error( $key = null ) {
        if ( !$key ) {
            return count( $this->errors );
        }

        if ( empty( $this->errors[$key] ) ) {
            return 0;
        }

        return count( $this->errors[$key] );
    }

    /**
     * Array of errors under a key generated by the validate method will
     * be returned if a data key is supplied; otherwise it will return
     * errors under all data keys.
     *
     * @param string $key (Key of data field in the request object.)
     *
     * @return array (Associative array of error where keys are data key
     * and corresponding values are error messages. Values can be an
     * array in the case of multiple errors for the same data value.)
     */
    public function get_errors( $key = null ) {
        if ( !$key ) {
            return $this->errors;
        }

        return $this->errors[$key];
    }

    /**
     * Separation of validation functions from the piple line
     * separated string.
     *
     * @param  string $fns (Piple line separated string of validation
     * rules.)
     *
     * @return array (Array of function names that will called when
     * validating a data key)
     */
    protected function get_validation_fns( $fns ) {
        return explode( '|', $fns );
    }

    /**
     * Making of validation functions and call them with appropriate
     * parameters.
     *
     * @param  mixed $value (Value of a data field.)
     *
     * @param  string $fn (Name of function. If a function has any parameter
     * other than data field value will be look like 'fn:param1,param2'.These
     * parameters will be passed to that function as an array that will retain
     * the sequence and data field value will be passed as first parameter.)
     *
     * @return boolean (True if data field value passes the validation
     * otherwise false.)
     */
    protected function call_validation_fn( $value, $fn ) {
        $fn_parts = explode( ':', $fn );

        $fn_name = trim( $fn_parts[0] );

        if ( count( $fn_parts ) > 1 ) {
            $fn_params = trim( $fn_parts[1] );
            $fn_params = explode( ',', $fn_params );

            return $fn_name( $value, $fn_params );
        }

        return $fn_name( $value );
    }

    /**
     * Generation of messages for wrong data passed to the application.
     *
     * @return array (Associative array of error messages where keys are
     * data keys and corresponding values are error messages. Values can
     * be array of error messages.)
     */
    abstract public function messages();

    /**
     * Rules for validating data passed to the application will be
     * defined and returned as an associative array.
     *
     * @return array (Associative array where keys are data keys and
     * values are rules. Multiple rules will be separated by piple line.)
     */
    abstract public function rules();
}
