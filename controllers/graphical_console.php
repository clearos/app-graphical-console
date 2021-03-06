<?php

/**
 * Graphical console controller.
 *
 * @category   apps
 * @package    graphical-console
 * @subpackage controllers
 * @author     ClearFoundation <developer@clearfoundation.com>
 * @copyright  2008-2011 ClearFoundation
 * @license    http://www.gnu.org/copyleft/lgpl.html GNU Lesser General Public License version 3 or later
 * @link       http://www.clearfoundation.com/docs/developer/apps/graphical_console/
 */

///////////////////////////////////////////////////////////////////////////////
//
// This program is free software: you can redistribute it and/or modify
// it under the terms of the GNU Lesser General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU Lesser General Public License for more details.
//
// You should have received a copy of the GNU Lesser General Public License
// along with this program.  If not, see <http://www.gnu.org/licenses/>.
//
///////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////
// C L A S S
///////////////////////////////////////////////////////////////////////////////

/**
 * Graphical console controller.
 *
 * @category   apps
 * @package    graphical-console
 * @subpackage controllers
 * @author     ClearFoundation <developer@clearfoundation.com>
 * @copyright  2008-2011 ClearFoundation
 * @license    http://www.gnu.org/copyleft/lgpl.html GNU Lesser General Public License version 3 or later
 * @link       http://www.clearfoundation.com/docs/developer/apps/graphical_console/
 */

class Graphical_Console extends ClearOS_Controller
{
    /**
     * Default controller.
     *
     * @return view
     */

    function index()
    {
        // Bail if this is not the console (but leave on in devel mode)
        //-------------------------------------------------------------

        if (! (clearos_console() || ($_SERVER['SERVER_PORT'] == 1501)))
            redirect('/base/session/login');

        // TODO: use API instead
        if (file_exists('/var/clearos/registration/registered'))
            redirect('/network');

        // Load libraries
        //---------------

        $this->lang->load('graphical_console');
        $this->load->library('network/Iface_Manager');
        $this->load->library('base/OS');

        // Grab network info
        //------------------

        try {
            $data['lan_ips'] = $this->iface_manager->get_most_trusted_ips();
            $data['os_name'] = $this->os->get_name();
            $data['os_version'] = preg_replace('/\s*\(Final\)/', '', $this->os->get_version());
        } catch (Engine_Exception $e) {
            $this->page->view_exception($e);
            return;
        }

        // Load views
        //-----------

        $page['type'] = MY_Page::TYPE_CONSOLE;

        $this->page->view_form('summary', $data, lang('graphical_console_network_console'), $page);
    }

    /**
     * Kill console.
     *
     * @return void
     */

    function shutdown()
    {
        // TODO: IPv6 cleanup
        if (!(($_SERVER["REMOTE_ADDR"] === '127.0.0.1') || ($_SERVER["REMOTE_ADDR"] === '::1')))
            return;

        // Load libraries
        //---------------

        $this->load->library('graphical_console/Graphical_Console');

        // Handle shutdown
        //----------------

        try {
            $this->graphical_console->shutdown();
        } catch (Exception $e) {
            $this->page->view_exception($e);
            return;
        }

        // Load views
        //-----------

        $page['type'] = MY_Page::TYPE_SPLASH;

        $this->page->view_form('shutdown', array(), lang('base_shutdown'), $page);
    }
}
