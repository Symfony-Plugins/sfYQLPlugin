<?php

/**
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU Lesser General Public License as published by
 *  the Free Software Foundation.

 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU Lesser General Public License for more details.

 *  You should have received a copy of the GNU Lesser General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * This action retrieves the results from search.web table in YQL
 */
class SearchWebAction extends sfAction
{
	public function execute($request)
	{
		// We obtain all the parameters
		$this->search_word = $request->getParameter("q");
		$this->start = $request->getParameter("start", 0);
		$this->num_results = $request->getParameter("num", 10);
		$this->language = $request->getParameter("hl", "en");

		// And query the YQL data table 'search.web'
		$yql_data_table = new YQLDataTable("search.web");
		$this->results = $yql_data_table->select(array("*"), " query='".$this->search_word."' AND lang='".$this->language."'");
		
	}
}
?>