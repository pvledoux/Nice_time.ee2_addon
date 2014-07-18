<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$plugin_info = array(
	'pi_name' => 'Nice Time',
	'pi_version' => '0.2',
	'pi_author' =>'Pierre-Vincent Ledoux',
	'pi_author_email' =>'ee-addons@pvledoux.be',
	'pi_author_url' => 'http://twitter.com/pvledoux/',
	'pi_author_url' => 'http://www.twitter.com/pvledoux',
	'pi_description' => 'Display a date in relative time format',
	'pi_usage' => Nice_time::usage()
  );

/**
 * Copyright (c) 2013, Pv Ledoux
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *	* Redistributions of source code must retain the above copyright
 *	   notice, this list of conditions and the following disclaimer.
 *	* Redistributions in binary form must reproduce the above copyright
 *	   notice, this list of conditions and the following disclaimer in the
 *	   documentation and/or other materials provided with the distribution.
 *	* Neither the name of the <organization> nor the
 *	   names of its contributors may be used to endorse or promote products
 *	   derived from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL <COPYRIGHT HOLDER> BE LIABLE FOR ANY
 * DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
 * ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 */

/**
 * Nice_time
 *
 * @copyright	Pv Ledoux 2013
 * @since		20 Dec 2011
 * @author		Pierre-Vincent Ledoux <ee-addons@pvledoux.be>
 * @author		EpicVoyage <nospam@epicvoyage.org>
 * @link		http://www.twitter.com/pvledoux/
 *
 */
class Nice_time
{
	/**
 	 * Data returned from the plugin.
	 *
	 * @access	public
	 * @var		array
	 */
	public $return_data	= null;

	private $_ee		= NULL;
	private $_date		= NULL;
	private $_format	= NULL;
	private $_relative	= NULL;

	/**
	* Constructor.
	*
	* @access	public
	* @return	void
	*/
	public function __construct()
	{
		$this->_ee			=& get_instance();

		$this->_date		= $this->_ee->TMPL->fetch_param('date', time());
		$this->_format		= $this->_ee->TMPL->fetch_param('format', '%d-%m-%Y %H:%i');
		$this->_relative	= $this->_ee->TMPL->fetch_param('relative', 'yes');
		$this->_prefix		= $this->_ee->TMPL->fetch_param('prefix', 'on ');

		$this->return_data = $this->_run();
	}

	/**
	* Annoyingly, the supposedly PHP5-only EE2 still requires this PHP4
	* constructor in order to function.
	*
	* @access public
	* @return void
	* method first seen used by Stephen Lewis (https://github.com/experience/you_are_here.ee2_addon)
	*/
	function Nice_time()
	{
		$this->__construct();
	}


	private function _plural($num) {
		if ($num != 1)
			return "s";
	}

	private function _run() {
		if (! $this->_is_timestamp($this->_date))
			$this->_date = strtotime($this->_date);

		$diff = time() - $this->_date;

		if ($this->_relative !== 'no') {
			if ($diff >= 0 && $diff < 5)
				return "now";

			$frame = ($diff < 0) ? ' from now' : ' ago';
			$diff *= ($diff < 0) ? -1 : 1;

			if ($diff<60)
				return $diff . " second" . $this->_plural($diff) . $frame;

			$diff = round($diff/60);

			if ($diff<60)
				return $diff . " minute" . $this->_plural($diff) . $frame;

			$diff = round($diff/60);

			if ($diff<24)
				return $diff . " hour" . $this->_plural($diff) . $frame;

			$diff = round($diff/24);

			if ($diff<7)
				return $diff . " day" . $this->_plural($diff) . $frame;

			$diff = round($diff/7);

			if ($diff<4)
				return $diff . " week" . $this->_plural($diff) . $frame;

			return $this->_prefix . $this->_ee->localize->format_date($this->_format, $this->_date);
		}

		return $this->_ee->localize->format_date($this->_format, $this->_date);
	}

	private function _is_timestamp( $string ) {
		return ( 1 === preg_match( '~^-?[1-9][0-9]*$~', $string ) );
	}


	/**
	 * Usage
	 *
	 * @return string
	 */
	function usage()
	{
			ob_start();

	?>


	This plugin converts a date in relative time.
	It will output **'now'** if the date given is less then 5 seconds ago, **'xx unit ago'** will be outputted for longer intervals (where unit will be seconds, minutes, hours, days or weeks).
	If the date is greater than 4 weeks, it will return the full date formatted with the parameter _format_.

	Syntax
	------------------------------------------------------------------

	    {exp:nice_time date="{entry_date}" format="%d-%m-%Y %H:%i"}
	    {exp:nice_time date="2012-09-{segment_3}" format="%D, %M %j, %Y" relative="no"}
	    {exp:nice_time date="+3 days" format="<strong>%l</strong> %m/%d/%Y" relative="no"}

	Parameter
	------------------------------------------------------------------

		date 	  is required. Can be a string date or a unix timestamp.
		format 	  optional. (default: %d-%m-%Y %H:%i)
		relative  optional. Set to "no" to always use format.
		prefix    optional. Default: 'on '.

		For more information on the format parameter, see the EE documentation:
			http://expressionengine.com/user_guide/templates/date_variable_formatting.html


	 <?php

			$buffer = ob_get_contents();
			ob_end_clean();
			return $buffer;
	}
	// --------------------------------------------------------------------

}
/* End of file pi.nice_time.php */
/* Location: ./system/expressionengine/third_party/nice_time/pi.nice_time.php */
